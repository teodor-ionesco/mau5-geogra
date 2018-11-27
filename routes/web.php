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


/*
*  Main site
*/
Route::get('/', 'Index@index');

Route::get('/countries/{code}', 'Countries@read');
Route::get('/countries/{code}/sections/{id}', 'Sections@read');
Route::get('/countries/{code}/theory/{id}', 'Theory@read');
Route::get('/countries/{code}/theory/{id}/quiz', 'Quiz@read');

Route::get('/search', 'Search@index');
Route::post('/search', 'Search@perform');

Route::get('/bac/{year}', 'BacSubjects@index');
Route::get('/bac/{year}/{file}', 'BacSubjects@download');
Route::post('/bac/{year}/search', 'BacSubjects@search');

/*
*  Auth
*/
Auth::routes();
Route::prefix('/register') ->group(function()
{
	Route::get('/', function(){return response('404', 404);});
	Route::post('/', function(){return response('404', 404);});
	Route::patch('/', function(){return response('404', 404);});
	Route::delete('/', function(){return response('404', 404);});
	//Route::head('/', function(){return response('404', 404);});
});

/*
*  Admin stuff.
*/
Route::prefix('/admin') -> middleware('auth') -> group(function()
{
	Route::get('/', 'Admin\Index@index');

	// Search
	Route::prefix('search') -> group(function(){
		Route::get('/', 'Admin\Search@index');
		Route::post('/', 'Admin\Search@perform');
	});

	// Countries
	Route::prefix('/countries') -> group(function()
	{
		Route::get('/', function(){return redirect('/admin');});
		Route::post('/', 'Admin\Countries@create');

		Route::get('/{code}', 'Admin\Countries@read');
		Route::get('/{code}/delete', 'Admin\Countries@delete');
	});

	// Sections
	Route::prefix('/countries/{code}/sections') -> group(function()
	{
		Route::get('/', 'Admin\Sections@index');
		Route::post('/', 'Admin\Sections@create');

		Route::prefix('/{id}') -> group(function()
		{
			Route::get('/', 'Admin\Sections@read');
			Route::patch('/', 'Admin\Sections@update');
			Route::get('/delete', 'Admin\Sections@delete');
			Route::post('/theory', 'Admin\Theory@create');
		});
	});

	// Theory
	Route::prefix('/countries/{code}/theory') -> group(function()
	{
		Route::get('/', function(&$code){return redirect('/admin/countries/'. $code);});
		Route::post('/', 'Admin\Theory@create');

		Route::prefix('/{id}') -> group(function()
		{
			Route::get('/', 'Admin\Theory@read');
			Route::patch('/', 'Admin\Theory@update');
			Route::get('/delete', 'Admin\Theory@delete');
		});
		
	});

	// Generalities
	Route::prefix('/countries/{code}/generalities') -> group(function()
	{
		Route::get('/', function(){return redirect(url() -> current() . '/../');});	
		Route::post('/', 'Admin\Generalities@create');
		Route::get('/{id}/delete', 'Admin\Generalities@delete');
	});

	// Quiz
	Route::prefix('/countries/{code}/theory/{id}/quiz') -> group(function()
	{
		Route::get('/', 'Admin\Quiz@read');
		Route::patch('/', 'Admin\Quiz@update');
		Route::get('/delete', 'Admin\Quiz@delete');

		Route::get('/make', 'Admin\Quiz@create');
		Route::post('/make', 'Admin\Quiz@create');
		Route::patch('/make', function () {return redirect(url() -> current() . '/../');});
	});

	// Power off website
	Route::get('/poweroff', function(){
		return Artisan::call('down');
	});
});
