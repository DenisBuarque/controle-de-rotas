<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DestinyController;
use App\Http\Controllers\MapController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*
* Routes users
*/
//Route::get('/usuarios',UserIndex::class)->name('users.index');
Route::get('/usuarios','UserController@index')->middleware(['auth:sanctum','can:access-users'])->name('users.index');
Route::get('/usuario/detalhe/{id}','UserController@show')->name('users.show');
Route::get('/usuario/novo','UserController@create')->name('users.create');
Route::post('/usuario/novo','UserController@store')->name('users.store');
Route::get('/usuario/alterar/{id}','UserController@edit')->name('users.edit');
Route::put('/usuario/update/{id}','UserController@update')->name('users.update');
Route::delete('/usuario/delete/{id}','UserController@destroy')->name('users.delete');

/*
* Route serviços
*/
Route::get('/servicos','ServiceController@index')->middleware(['can:access-services','auth:sanctum'])->name('services.index');
Route::get('/servico/detalhe/{id}','ServiceController@show')->name('services.show');
Route::get('/servico/novo','ServiceController@create')->name('services.create');
Route::post('/servico/novo','ServiceController@store')->name('services.store');
Route::get('/servico/alterar/{id}','ServiceController@edit')->name('services.edit');
Route::put('/servico/update/{id}','ServiceController@update')->name('services.update');
Route::delete('/servico/delete/{id}','ServiceController@destroy')->name('services.delete');

/*
* Route clientes
*/
Route::get('/clientes','ClientController@index')->middleware(['can:access-clients','auth:sanctum'])->name('clients.index');
Route::get('/cliente/detalhe/{id}','ClientController@show')->name('clients.show');
Route::get('/cliente/novo','ClientController@create')->name('clients.create');
Route::post('/cliente/novo','ClientController@store')->name('clients.store');
Route::get('/cliente/alterar/{id}','ClientController@edit')->name('clients.edit');
Route::put('/cliente/update/{id}','ClientController@update')->name('clients.update');
Route::delete('/cliente/delete/{id}','ClientController@destroy')->name('clients.delete');

/*
* Route destinos
*/
Route::get('/destinos','DestinyController@index')->middleware(['can:access-destinies','auth:sanctum'])->name('destinies.index');
Route::get('/destino/detalhe/{id}','DestinyController@show')->name('destinies.show');
Route::get('/destino/novo','DestinyController@create')->name('destinies.create');
Route::post('/destino/novo','DestinyController@store')->name('destinies.store');
Route::get('/destino/alterar/{id}','DestinyController@edit')->name('destinies.edit');
Route::put('/destino/update/{id}','DestinyController@update')->name('destinies.update');
Route::delete('/destino/delete/{id}','DestinyController@destroy')->name('destinies.delete');

/*
* Route map
*/

Route::get('/rotas','MapController@index')->middleware(['can:access-routes','auth:sanctum'])->name('map.index');