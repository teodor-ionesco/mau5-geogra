@extends('global')

@section('title') Geogra - Index @endsection

@section('body')

	<div class="container">
		<p class="flow-text">
			Bună! Ce doriți să repetați?
			Doriți să efectuați o <a href="/search">căutare</a>?
			<br>
			Subiecte bac <a href="/bac/2008">2008</a> sau <a href="/bac/2009">2009</a>.
		</p >

		<ol class="flow-text">
			@foreach($COUNTRIES as $country)
				<li><a href="/countries/{{ $country -> code }}">{{ $country -> name }}</a></li>
			@endforeach
		</ol>
	</div>

@endsection