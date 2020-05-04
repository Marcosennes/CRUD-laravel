<?php

use Illuminate\Support\Facades\Route;

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


Route::get('contacts','Contacts@index');

Route::group(['middleware' => 'web'], function() {
    
    Route::get('/', 'ClientesController@index')->name('main');
    
    Route::auth();
    
    Route::get('home', 'HomeController@index')->name('home');

    Route::get('/clientes/novo', 'ClientesController@novo');
    Route::get('clientes/{idCliente}/editar', 'ClientesController@editar');
    Route::post('/clientes/salvar', 'ClientesController@salvar');
    Route::patch('/clientes/{cliente}', 'ClientesController@atualizar');
    Route::delete('/clientes/{cliente}/deletar', 'ClientesController@deletar');
    
    Route::get('/loginPlataforma', 'loginController@index');
    Route::post('/loginPlataforma/salvar', 'loginController@salvar');



});


