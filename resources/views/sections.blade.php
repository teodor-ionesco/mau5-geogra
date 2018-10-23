@extends('global')

@section('title') {{ $COUNTRY -> name }} - Sections @endsection

@section('body')
	<div class="container">
		<p class="flow-text">Bună! Ce doriți să repetați?</p>

		<ol class="flow-text">
			@foreach($THEORY as $object)
				<li><a href="{{ url() -> current() }}/../../theory/{{ $object -> id }}">{{ $object -> title }}</a></li>
			@endforeach
		</ol>
		<a class="btn waves-effect waves-light blue" href="{{ url() -> current() . '/../../'}}">Înapoi</a>
	</div>
@endsection