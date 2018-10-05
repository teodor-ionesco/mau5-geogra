<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Countries as MCountries;
use App\Generalities as MGeneralities;
use App\Theory as MTheory;

class Countries extends Controller
{
    public function read($code)
    {
    	return view('admin.country', [
    		'COUNTRY' => MCountries::where('code', $code) -> first(),
    		'GEN' => MGeneralities::where('country', $code) -> select(['name', 'url']) -> get(),
    		'THEORY' => MTheory::where('country', $code) -> select(['id', 'title']) -> get(),
    	]);
    }
}
