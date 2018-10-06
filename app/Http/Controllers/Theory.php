<?php

namespace App\Http\Controllers;

use App\Theory as MTheory;
use App\Quiz as MQuiz;
use Illuminate\Http\Request;

class Theory extends Controller
{
    public function read($code, $id)
    {
    	return view('theory', [
    		'THEORY' => MTheory::where('id', $id) -> first(),
    		'QUIZ' => MQuiz::where('theory', $id) -> first(),
    	]);
    }
}
