<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Formatting\Format;
use App\Theory as MTheory;
use App\Quiz as MQuiz;
use App\Sections as MSections;

class Theory extends Controller
{
    public function read($code, $id)
    {
        $theory = MTheory::where('id', $id) -> first();
        $theory -> theory = Format::unparse($theory -> theory);
        $quiz = MQuiz::select('id') -> where('theory', $theory -> id) -> first();
        $sections = MSections::where('country', $code) -> get();

    	return view('admin.theory', [
    		'THEORY' => $theory,
            'QUIZ' => $quiz,
            'SECTIONS' => $sections,
    	]);
    }

    public function create($code)
    {
    	$this -> validate(request(), [
    		'title' => 'required',
            'section' => 'required',
    	]);

    	MTheory::insert([
    		'country' => $code,
    		'title' => request('title'),
    		'theory' => '',
            'section' => request('section'),
    	]);

    	return redirect(url() -> current() . '/../');
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
            'section' => 'required',
        ]);

        MTheory::where('id', $id) -> update([
            'title' => request('title'),
            'theory' => Format::parse(request('theory')),
            'section' => request('section'),
        ]);

        return redirect(url() -> current());
    }
}
