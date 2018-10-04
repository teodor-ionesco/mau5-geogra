<?php

namespace App\Http\Controllers;

use App\Theory as MTheory;
use Illuminate\Http\Request;

class Theory extends Controller
{
    public function read($code, $id)
    {
    	return view('theory', [
    		'THEORY' => MTheory::where('id', $id) -> first(),
    	]);
    }
}
