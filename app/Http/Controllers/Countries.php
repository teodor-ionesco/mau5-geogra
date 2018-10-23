<?php

namespace App\Http\Controllers;

use App\Theory as MTheory;
use App\Countries as MCountries;
use App\Sections as MSections;
use App\Generalities as MGEN;
use Illuminate\Http\Request;

class Countries extends Controller
{
    public function read($code)
    {
    	return view('country', [
    		'COUNTRY' => MCountries::where('code', $code) -> first(),
    		'GEN' => MGEN::where('country', $code) -> select(['url', 'name']) -> orderBy('name', 'asc') -> get(),
    		'SECTIONS' => MSections::where('country', $code) -> select(['id', 'name']) -> orderBy('name', 'asc') -> get(),
    		'THEORY' => MTheory::where([
    			['country', '=', $code],
    			['section', '=', '0'],
    		]) -> select(['id', 'title']) -> orderBy('title', 'asc') -> get(),
    	]);
    }
}
