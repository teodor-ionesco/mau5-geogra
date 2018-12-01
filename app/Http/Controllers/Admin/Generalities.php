<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Generalities as MGeneralities;

class Generalities extends Controller
{
    public function create($code)
    {
    	$this -> validate(request(), [
    		'title' => 'required',
    		'url' => 'required|url',
    	]);

    	MGeneralities::insert([
    		'country' => $code,
    		'name' => request('title'),
    		'url' => request('url'),
            'section' => empty(request('section')) ? 0 : request('section'),
    	]);

    	return redirect(url() -> current() . '/../');
    }

    public function delete($code, $id)
    {
    	MGeneralities::where('id', $id) -> delete();

    	return redirect(url() -> current() . '/../../');
    }
}
