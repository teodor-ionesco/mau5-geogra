@extends('global')

@section('title') Geogra - Index @endsection

@section('body')

	<div class="container">
		<p class="flow-text">Bună! Ce doriți să repetați?</p >
		<ol class="flow-text">
			@foreach($COUNTRIES as $country)
				<li><a href="/countries/{{ $country -> code }}">{{ $country -> name }}</a></li>
			@endforeach
		</ol>
	</div>

@endsection