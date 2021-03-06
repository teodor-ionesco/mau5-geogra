<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BacSubjects extends Controller
{
	/*
	*	Object vars
	*/
	private $files = [];
	private $message = null;
	private $query = null;

	/*
	*	Index
	*/
	public function index($year)
	{
		return view('bac', [
			'FILES' => $this -> files,
			'MESSAGE' => $this -> message,
			'YEAR' => $year,
			'QUERY' => $this -> query,
		]);
	}

	/*
	*	Search
	*/
	public function search($year, Request $request)
	{	
		$this -> query = $request -> input('search');

		$files = Storage::disk('public') -> files('bac/' . $year);

		if(empty($files)) {
			$this -> message = 'Invalid year';
			return $this -> index($year);
		}

		$str = null;
		$tmp = null;

		foreach($files as $key => $value)
		{
			$tmp = basename($value);
			$str = preg_replace('|d_e_f_geografie_cls_12_si+_|', '', $tmp);
			$str = preg_replace('|^0+[^1-9]?|', '', $str);

			if($str == $this -> query . '.pdf')
				$this -> files[$key] = $tmp;
		}

		return $this -> index($year);
	}

	/*
	*	Download file
	*/
	public function download($year, $file)
	{
		return Storage::disk('public') -> download('bac/'.$year.'/'.$file);
	}
}