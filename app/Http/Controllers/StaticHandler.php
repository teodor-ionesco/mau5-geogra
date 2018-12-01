<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Facades\Support\Storage;

class StaticHandler extends Controller
{
	public function read($target)
	{
		return Storage::disk('local') -> download($target);
	}
}