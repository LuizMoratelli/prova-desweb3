<?php

Route::apiResource('produtos', 'ProdutoController');
Route::apiResource('vendas', 'VendaController');

//VendaProduto
Route::get('/vendas/{venda}/produtos', 'VendaProdutoController@index');
Route::get('/vendas/{venda}/produtos/{produto}', 'VendaProdutoController@show');
Route::post('/vendas/{venda}/produtos', 'VendaProdutoController@store');
Route::patch('/vendas/{venda}/produtos/{produto}', 'VendaProdutoController@update');
Route::delete('/vendas/{venda}/produtos/{produto}', 'VendaProdutoController@destroy');
Route::post('/vendas/{venda}/realizar', 'VendaProdutoController@realizar');
