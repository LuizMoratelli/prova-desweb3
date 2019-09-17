<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;

class VendaController extends Controller
{
    public function index() {
        return response()->json(Venda::all());
    }

    public function store(Request $request) {
        $venda = Venda::create($request->all());

        return response()->json($venda, 200);
    }

    public function show(Venda $venda) {
        return response()->json($venda, 200);
    }

    public function update(Request $request, Venda $venda) {
        $venda->update($request->all());

        return response()->json($venda, 200);
    }

    public function destroy(Venda $venda) {
        $venda->delete();

        return response('', 204);
    }
}
