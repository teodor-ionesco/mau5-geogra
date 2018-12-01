<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaticHandler extends Controller
{
	public function read($target)
	{
		return response() -> file(base_path() . '/storage/app/public/'.$target);
	}
}