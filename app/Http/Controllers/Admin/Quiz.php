<?php

namespace App\Http\Controllers\Admin;

use App\Quiz as MQuiz;
use App\Theory as MTheory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Quiz extends Controller
{
    public function read($code, $id)
    {
    	$quiz = MQuiz::where('theory', $id) -> get();
    	$count = 0;
    	$out = [];

    	foreach($quiz as $object)
    	{
    		$out[$count]['question'] = $object -> question;
    		$out[$count]['answers'] = json_decode($object -> answers, true);
    		$out[$count]['correct'] = $object -> correct;
    		
    		$count++;
    	}

    	return view('admin.quiz', [
    		'THEORY' => MTheory::where('id', $id) -> first(),
    		'QUIZ' => $out,
    	]);
    }
}
