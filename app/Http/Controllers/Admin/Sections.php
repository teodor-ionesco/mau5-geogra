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
		]);
	}

    public function read($code, $id)
    {
    	return view('admin.sections', [
    		'COUNTRY' => MCountries::where('code', $code) -> first(),
    		'DATA' => MTheory::where('section', $id) -> orderBy('title', 'asc') -> get(),
    		'SCOPE' => 'read',
    		'SECTION' => $id,
    	]);
    }

    public function create($code)
    {
    	$this -> validate(request(), [
    		'title' => 'required',
    	]);

    	MSections::insert([
    		'country' => $code,
    		'name' => request('title'),
    	]);

    	return redirect('/admin/countries/' . $code);
    }

    public function delete($code, $id)
    {
    	MSections::where('id', $id) -> delete();
    	MTheory::where('section', $id) -> delete();

    	return redirect('/admin/countries/' . $code);
    }
}
