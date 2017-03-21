<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/home', 'HomeController@dtVencida');

//PRODUTOS=======================================================================================

Route::get('produtos/', 'ProdutoController@index')->name('produto.index');
Route::get('produtos/create', 'ProdutoController@create')->name('produto.create');
Route::post('produtos/store', 'ProdutoController@store')->name('produto.store');
Route::get('produtos/show/{id}', 'ProdutoController@show')->name('produto.show');
Route::get('produtos/edit/{id}', 'ProdutoController@edit')->name('produto.edit');
Route::patch('produtos/update/{up}', 'ProdutoController@update')->name('produto.update');
Route::delete('produtos/del/{id}','ProdutoController@destroy')->name('produto.destroy');
Route::get('busca','ProdutoController@search')->name('produto.search');

//Itens=========================================================================================

Route::get('itens/', 'ItemController@index')->name('item.index');
Route::get('itens/create', 'ItemController@create')->name('item.create');
Route::post('itens/store', 'ItemController@store')->name('item.store');
Route::get('itens/show/{id}', 'ItemController@show')->name('item.show');
Route::get('itens/edit/{id}', 'ItemController@edit')->name('item.edit');
Route::patch('itens/update/{up}', 'ItemController@update')->name('item.update');
Route::delete('itens/del/{id}','ItemController@destroy')->name('item.destroy');
Route::get('itens/busca','ItemController@search')->name('item.search');
Route::get('itens/busca','ItemController@searchProduto')->name('item.search');
