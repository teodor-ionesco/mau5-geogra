<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Countries as MCountries;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index()
    {
    	return view('admin.admin', [
    		'COUNTRIES' => MCountries::all(),
    	]);
    }
}
