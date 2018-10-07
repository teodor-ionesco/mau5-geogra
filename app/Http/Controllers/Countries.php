<?php

namespace App\Http\Controllers;

use App\Countries as MCountries;
use App\Theory as MTheory;
use App\Generalities as MGEN;
use Illuminate\Http\Request;

class Countries extends Controller
{
    public function read($code)
    {
    	return view('country', [
    		'COUNTRY' => MCountries::where('code', $code) -> first(),
    		'GEN' => MGEN::where('country', $code) -> select(['url', 'name']) -> orderBy('name', 'asc') -> get(),
    		'THEORY' => MTheory::where('country', $code) -> select(['title', 'id']) -> orderBy('title', 'asc') -> get(),
    	]);
    }
}
