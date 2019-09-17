<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ Produto, Venda, VendaProduto };

class VendaProdutoController extends Controller
{
    public function index(Venda $venda) {
        return response()->json(VendaProduto::where('venda_id', $venda->id)->get());
    }

    public function store(Request $request, Venda $venda) {
        if ($venda->status == 1) {
            return response('Essa venda já foi realizada e não pode mais ser alterada');
        }

        $produtos = $request->get('produtos');

        foreach ($produtos as $produto) {
            if (!Produto::find($produto['id'])) continue;

            $vendaProduto = new VendaProduto([
                'quantidade' => $produto['quantidade'] ?? 1,
            ]);

            $vendaProduto->venda()->associate($venda);
            $vendaProduto->produto()->associate($produto['id']);

            $vendaProduto->save();
        }

        return response()->json(VendaProduto::where('venda_id', $venda->id)->get(), 200);
    }

    public function show(Venda $venda, Produto $produto) {
        return VendaProduto::where([
            ['venda_id', $venda->id],
            ['produto_id', $produto->id]
        ])->get();
    }

    public function update(Request $request, Venda $venda, Produto $produto) {
        if ($venda->status == 1) {
            return response('Essa venda já foi realizada e não pode mais ser alterada');
        }

        $vendaProduto = VendaProduto::where([
            ['venda_id', $venda->id],
            ['produto_id', $produto->id]
        ])->first();

        $vendaProduto->quantidade = $request->get('quantidade');
        $vendaProduto->save();

        return response()->json($vendaProduto, 200);
    }

    public function destroy(Request $request, Venda $venda, Produto $produto) {
        if ($venda->status == 1) {
            return response('Essa venda já foi realizada e não pode mais ser alterada');
        }

        $vendaProduto = VendaProduto::where([
            ['venda_id', $venda->id],
            ['produto_id', $produto->id]
        ])->first();

        $vendaProduto->delete();

        return response()->json(VendaProduto::where('venda_id', $venda->id)->get(), 200);
    }

    public function realizar(Venda $venda) {
        if ($venda->status == 1) {
            return response('Essa venda já foi realizada', 200);
        }
        
        foreach ($venda->produtos as $vendaProduto) {
            $produto = $vendaProduto->produto;
            
            if ($vendaProduto->quantidade > $produto->estoque) {   
                return response("Quantidade de {$produto->nome} insuficiente em estoque para realizar essa venda.");
            }
        }

        $precoTotal = 0;
        foreach ($venda->produtos as $vendaProduto) {
            $produto = $vendaProduto->produto;
            $produto->estoque -= $vendaProduto->quantidade;
            $produto->save();

            $precoTotal += $produto->preco;
        }
        
        $venda->status = 1;
        $venda->save();
        return response("Venda realizada com sucesso, valor total de: {$precoTotal}!", 200);
    }
}
