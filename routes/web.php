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

Route::get('/', 'Index@index');

Route::get('/countries/{code}', 'Countries@read');
Route::get('/countries/{code}/theory/{id}', 'Theory@read');
Route::get('/countries/{code}/theory/{id}/quiz', 'Quiz@read');


Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');