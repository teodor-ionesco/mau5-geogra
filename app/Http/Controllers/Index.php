<?php

namespace App\Http\Controllers;

use App\Countries;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index()
    {
    	return view('index', [
    		'COUNTRIES' => Countries::select('*') -> orderBy('name', 'asc') -> get(),
    	]);
    }
}
