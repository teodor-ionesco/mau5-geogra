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
    		$out[$object -> id]['question'] = $object -> question;
    		$out[$object -> id]['answers'] = json_decode($object -> answers, true);
    		$out[$object -> id]['correct'] = $object -> correct;
    		
    		$count++;
    	}

    	return view('admin.quiz', [
    		'THEORY' => MTheory::where('id', $id) -> first(),
    		'QUIZ' => $out,
    	]);
    }

    public function create($code, $id)
    {
        if(count(request() -> post()))
        {
            foreach(request('quiz') as $array)
            {
                MQuiz::insert([
                    'country' => $code,
                    'theory' => $id,
                    'question' => $array['question'],
                    'answers' => json_encode([
                        0 => $array[0],
                        1 => $array[1],
                        2 => $array[2],
                        3 => $array[3],
                    ]),
                    'correct' => 0,
                ]);
            }

            return redirect(url() -> current() . '/../');
            //return $this -> read($code, $id);
        }
        else
        {
            return view('admin.quiz_make', []);
        }
    }

    public function update($code, $id)
    {
        if(count(request() -> post('quiz')))
        {
            $quizes = MQuiz::where('theory', $id) -> get();            

            // Delete which question does not exist in PATCH form
            foreach($quizes as $object)
            {
                $found = false;

                foreach(request('quiz') as $key => $array)
                {
                    if($key === $object -> id)
                    {
                        $found = true;
                        break;
                    }
                }

                if($found === false)
                    MQuiz::where('id', $object -> id) -> delete();
            }

            // Update records
            foreach(request('quiz') as $key => $array)
            {
                if($key < 0)
                {
                    MQuiz::insert([
                        'country' => $code,
                        'theory' => $id,
                        'question' => $array['question'],
                        'answers' => json_encode([
                            0 => $array[0],
                            1 => $array[1],
                            2 => $array[2],
                            3 => $array[3],
                        ]),
                        'correct' => 0,
                    ]);
                }
                else
                {
                    MQuiz::where('id', $key) -> update([
                        'question' => $array['question'],
                        'answers' => json_encode([
                            0 => $array[0],
                            1 => $array[1],
                            2 => $array[2],
                            3 => $array[3],
                        ]),
                    ]);
                }
            }
        }

        return $this -> read($code, $id);
    }

    public function delete($code, $id)
    {
        MQuiz::where('theory', $id) -> delete();

        return redirect(url() -> current() . '/../../');
    }
}
