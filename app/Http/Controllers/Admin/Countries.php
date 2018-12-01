<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Countries as MCountries;
use App\Generalities as MGeneralities;
use App\Theory as MTheory;
use App\Quiz as MQuiz;
use App\Sections as MSections;

class Countries extends Controller
{
    public function read($code)
    {
    	return view('admin.country', [
    		'COUNTRY' => MCountries::where('code', $code) -> first(),
            'GEN' => MGeneralities::where([
                ['country', '=', $code],
                ['section', '=', '0'],
            ]) -> select(['url', 'name']) -> orderBy('name', 'asc') -> get(),

            'SECTIONS' => MSections::where([
                ['country', '=', $code],
                ['section', '=', '0'],
            ]) -> select(['id', 'name']) -> orderBy('name', 'asc') -> get(),

            'THEORY' => MTheory::where([
                ['section', '=', '0'],
                ['country', '=', $code]
            ]) -> select(['id', 'title']) -> orderBy('title', 'asc') -> get(),
        ]);
    }

    public function create()
    {
    	$this -> validate(request(), [
    		'name' => 'required',
    		'code' => 'required',
    	]);

    	MCountries::insert(request(['name', 'code']));

    	return redirect('/admin', 301);
    }

    public function delete($code)
    {
    	MQuiz::where('country', $code) -> delete();
    	MTheory::where('country', $code) -> delete();
    	MGeneralities::where('country', $code) -> delete();
    	MCountries::where('code', $code) -> delete();

    	return redirect('/admin', 301);
    }
}
