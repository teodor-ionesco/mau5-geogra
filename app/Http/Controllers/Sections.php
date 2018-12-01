<?php

namespace App\Http\Controllers;

use App\Sections as MSections;
use App\Countries as MCountries;
use App\Theory as MTheory;
use App\Generalities as MGeneralities;
use Illuminate\Http\Request;

class Sections extends Controller
{
    public function read($code, $id)
    {
        return view('sections', [
            'THEORY' => MTheory::where('section', $id) -> select(['title', 'id']) -> orderBy('title', 'asc') -> get(),
            'COUNTRY' => MCountries::where('code', $code) -> first(),
            'GENERALITIES' => MGeneralities::where('code', $code) -> get(),
            'SECTION' => MSections::where('id', $id) -> select(['id', 'name']) -> first(),
            
            'SECTIONS' => MSections::where([
            	['section', '=', $id],
            	['country', '=', $code],
            ]) -> select(['id', 'name']) -> orderBy('name', 'asc') -> get(),
        ]);
    }
}
