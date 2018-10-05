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
Route::prefix('/register') ->group(function()
{
	Route::get('/', function(){return response('404', 404);});
	Route::post('/', function(){return response('404', 404);});
	Route::patch('/', function(){return response('404', 404);});
	Route::delete('/', function(){return response('404', 404);});
});

Route::prefix('/admin') -> middleware('auth') -> group(function()
{
	Route::get('/', 'Admin\Index@index');
	Route::get('/countries/{code}', 'Admin\Countries@read');
	Route::get('/countries/{code}/theory/{id}', 'Admin\Theory@read');
	Route::get('/countries/{code}/theory/{id}/quiz', 'Admin\Quiz@read');
});
