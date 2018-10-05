<?php

namespace App\Http\Controllers;

use App\Quiz as MQuiz;
use App\Theory as MTheory;
use Illuminate\Http\Request;

class Quiz extends Controller
{
    public function read($code, $id) // country code, theory page id
    {
    	$quiz = MQuiz::where('theory', $id) -> get();

    	$count = 0;
    	$out = [];

    	foreach($quiz as $object)
    	{
    		$out[$count] = [
    			'question' => $object -> question,
    			'answers' => json_decode($object -> answers, true),
    			'correct' => $object -> correct,
    		];

    		$count++;
    	}

    	return view('quiz', [
            'THEORY' => MTheory::where('id', $id) -> first(),
    		'QUIZ' => $out,
    	]);
    }
}
