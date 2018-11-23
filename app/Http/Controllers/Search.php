<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Theory as MTheory;
use App\Sections as MSections;
use App\Countries as MCountries;
use App\Generalities as MGeneralities;

class Search extends Controller
{
	private $query = null;
	private $results = null;
	private $message = null;
	private $chars = [
		['a', 'a', 'i', 't', 's'],
		['ă', 'â', 'î', 'ț', 'ș']
	];

	public function index()
	{
		return view('search', [
			'QUERY' => $this -> query,
			'RESULTS' => $this -> results,
			'MESSAGE' => $this -> message,
		]);
	}

	public function perform(Request $request)
	{
		if(empty($request -> input('phrase')) || strlen($request -> input('phrase')) < 4)
		{
			$this -> message = 'Please fill in search field. Note that search must contain at least three characters.';
			return $this -> index();
		}
		
		$this -> query = $this -> map_phrase($request -> input('phrase'));

		/*
		*	Countries
		*/
		$tmp = MCountries::select(['name', 'code']) -> get();
		foreach($tmp as $key => $object)
		{
			$name = strtolower(str_replace($this -> chars[1], $this -> chars[0], $object -> name));
			
			if(preg_match("|".$this -> query."|", $name) === 1)
				$this -> results['countries'][$key] = $object;
		}

		/*
		*	Generalities
		*/
		$tmp = MGeneralities::select(['name', 'url', 'country']) -> get();
		foreach($tmp as $key => $object)
		{
			$name = strtolower(str_replace($this -> chars[1], $this -> chars[0], $object -> name));
			
			if(preg_match("|".$this -> query."|", $name) === 1)
				$this -> results['generalities'][$key] = $object;
		}

		/*
		*	Sections
		*/							
		$tmp = MSections::select(['name', 'id', 'country']) -> get();
		foreach($tmp as $key => $object)
		{
			$name = strtolower(str_replace($this -> chars[1], $this -> chars[0], $object -> name));
			
			if(preg_match("|".$this -> query."|", $name) === 1)
				$this -> results['sections'][$key] = $object;
		}

		/*
		*	Theory
		*/	
		$tmp = MTheory::select(['title', 'id', 'country', 'theory']) -> get();
		foreach($tmp as $key => $object)
		{
			$title = strtolower(str_replace($this -> chars[1], $this -> chars[0], $object -> title));
			$theory = strtolower(str_replace($this -> chars[1], $this -> chars[0], $object -> theory));
			
			if(preg_match("|". $this -> query ."|", $title) === 1)
				$this -> results['theory'][$key] = $object;
			else if(preg_match("|". $this -> query ."|", $theory) === 1)
				$this -> results['theory'][$key] = $object;
		}

		return $this -> index();
	}

	/*
	*   Map search phrase
	*/
	private function map_phrase(string $phrase) : string
	{
	    $tmp = strtolower($phrase);
	    $tmp = str_replace($this -> chars[1], $this -> chars[0], $tmp);
	    
	    // Trim regex directives
	    $tmp = str_replace('.', '\.', $tmp);
	    $tmp = str_replace('(', '\(', $tmp);
	    $tmp = str_replace(')', '\)', $tmp);
	    $tmp = str_replace('|', '\|', $tmp);
	    $tmp = str_replace('[', '\[', $tmp);
	    $tmp = str_replace(']', '\]', $tmp);
	    $tmp = str_replace('{', '\{', $tmp);
	    $tmp = str_replace('}', '\}', $tmp);
	    $tmp = str_replace('+', '\+', $tmp);
	    
	    // Set regex directives
	    $tmp = str_replace(' ', '.*', $tmp);
	    
	    return $tmp;
	}
}