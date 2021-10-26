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

Route::get('/', 'App\Http\Controllers\PagesController@home');
// Route::get('/new', function(){
//     return view('shoppinglist.create');
// });
Route::get('/shopping', 'App\Http\Controllers\ShoppingController@index');
Route::get('/shopping/create', 'App\Http\Controllers\ShoppingController@create');
Route::get('/shopping/{id}', 'App\Http\Controllers\ShoppingController@show');
Route::post('/shopping', 'App\Http\Controllers\ShoppingController@store');
Route::delete('/shopping/{daftarbelanja}','App\Http\Controllers\ShoppingController@destroy'); 
Route::get('shopping/{daftarbelanja}/edit','App\Http\Controllers\ShoppingController@edit');
Route::patch('shopping/{daftarbelanja}','App\Http\Controllers\ShoppingController@update');
