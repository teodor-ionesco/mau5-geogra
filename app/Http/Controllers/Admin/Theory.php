<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Theory as MTheory;
use App\Quiz as MQuiz;
use App\Http\Controllers\Controller;

class Theory extends Controller
{
    public function read($code, $id)
    {
        $theory = MTheory::where('id', $id) -> first();
        $quiz = MQuiz::select('id') -> where('theory', $theory -> id) -> first();

    	return view('admin.theory', [
    		'THEORY' => $theory,
            'QUIZ' => $quiz,
    	]);
    }

    public function create($code)
    {
    	$this -> validate(request(), [
    		'title' => 'required',
    	]);

    	MTheory::insert([
    		'country' => $code,
    		'title' => request('title'),
    		'theory' => '',
    	]);

    	return redirect(url() -> current());
    }

    public function delete($code, $id)
    {
    	MQuiz::where('theory', $id) -> delete();
    	MTheory::where('id', $id) -> delete();

    	return redirect(url() -> current() . '/../../');
    }

    public function update($code, $id)
    {
        $this -> validate(request(), [
            'title' => 'required',
            'theory' => 'required',
        ]);

        MTheory::where('id', $id) -> update(request(['theory', 'title']));

        return redirect(url() -> current());
    }
}
