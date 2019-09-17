<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
  public function index() {
    return response()->json(Produto::all());
  }

  public function store(Request $request) {
    $produto = Produto::create($request->all());

    return response()->json($produto, 200);
  }

  public function show(Produto $produto) {
    return response()->json($produto, 200);
  }

  public function update(Request $request, Produto $produto) {
    $produto->update($request->all());

    return response()->json($produto, 200);
  }

  public function destroy(Produto $produto) {
    $produto->delete();

    return response('', 204);
  }
}
