<?php

namespace App\Formatting;

class Format
{
	// The schema of all codes
	private static $schema = [
		'[>]' => '►',
		'[*]' => '•',
		'[b]' => '<b>',
		'[/b]' => '</b>',
		'[i]' => '<i>',
		'[/i]' => '</i>',
		'[m]' => '<span class="yellow">',
		'[/m]' => '</span>',
		'[tab]' => '&nbsp;&nbsp;&nbsp;',
		'[img]' => '<div class="row"><div class="col s12 m12 l6"><img src="',
		'[/img]' => '"></div></div>',
		PHP_EOL => '<br>',
	];

	// In: unformatted
	// Out: formatted
	public static function parse($text) : string
	{
		foreach(self::$schema as $code => $html)
			$text = str_replace($code, $html, $text);

		return $text;
	}

	// In: formatted
	// Out: unformatted
	public static function unparse($text) : string
	{
		foreach(self::$schema as $code => $html)
			$text = str_replace($html, $code, $text);

		return $text;
	}
}