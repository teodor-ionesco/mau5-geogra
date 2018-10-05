<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Theory as MTheory;
use App\Http\Controllers\Controller;

class Theory extends Controller
{
    public function read($code, $id)
    {
    	return view('admin.theory', [
    		'THEORY' => MTheory::where('id', $id) -> first(),
    	]);
    }
}
