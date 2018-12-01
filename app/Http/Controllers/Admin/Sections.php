<?php

namespace App\Http\Controllers\Admin;

use App\Countries as MCountries;
use App\Theory as MTheory;
use App\Sections as MSections;
use App\Generalities as MGeneralities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Sections extends Controller
{
	public function index($code)
	{
		return view('admin.sections', [
			'COUNTRY' => MCountries::where('code', $code) -> first(),
			'DATA' => MSections::where('country', $code) -> orderBy('name', 'asc') -> get(),
			'SCOPE' => 'index',
            'SECTION' => 0,
		]);
	}

    public function read($code, $id)
    {
    	return view('admin.sections', [
    		'COUNTRY' => MCountries::where('code', $code) -> first(),
    		'DATA' => MTheory::where('section', $id) -> orderBy('title', 'asc') -> get(),
            'GENERALITIES' => MGeneralities::where('section', $id) -> orderBy('name', 'asc') -> get(),            
    		'SCOPE' => 'read',
    		'SECTION' => MSections::where('id', $id) -> first(),
            'SECTIONS' => MSections::where('section', $id) -> orderBy('name', 'asc') -> get(),
            'SECTIONS_CH' => MSections::where([
                ['section', '!=', $id],
                ['id', '!=', $id],
            ]) -> select(['id', 'name']) -> orderBy('name', 'asc') -> get(),
    	]);
    }

    public function create($code)
    {
    	$this -> validate(request(), [
    		'title' => 'required',
            'section' => 'required|numeric',
    	]);

    	MSections::insert([
    		'country' => $code,
    		'name' => request('title'),
            'section' => request('section'),
    	]);

    	return redirect('/admin/countries/' . $code);
    }

    public function delete($code, $id)
    {
    	MSections::where('id', $id) -> delete();
        MSections::where('section', $id) -> delete();
    	MTheory::where('section', $id) -> delete();
        MGeneralities::where('section', $id) -> delete();

    	return redirect(request() -> url() . '/../../');
    }

    public function update($code, $id)
    {
        $this -> validate(request(), [
            'name' => 'required',
            'section' => 'required|numeric',
        ]);

        MSections::where('id', $id) -> update([
            'name' => request('name'),
            'section' => request('section'),
        ]);

        return $this -> read($code, $id);
    }
}
