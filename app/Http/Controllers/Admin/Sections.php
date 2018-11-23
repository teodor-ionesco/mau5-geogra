<?php

namespace App\Http\Controllers\Admin;

use App\Countries as MCountries;
use App\Theory as MTheory;
use App\Sections as MSections;

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
    		'SCOPE' => 'read',
    		'SECTION' => MSections::where('id', $id) -> first(),
<<<<<<< HEAD
            'SECTIONS' => MSections::where('section', $id) -> get(),
=======
            'SECTIONS' => MSections::where('section', $id) -> orderBy('name', 'asc') -> get(),
>>>>>>> 095a712676dee8e026abc405badf61beb84fdc52

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
