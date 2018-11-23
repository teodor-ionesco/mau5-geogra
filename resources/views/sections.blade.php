@extends('global')

@section('title') {{ $SECTION -> name }} @endsection

@section('body')
	<div class="container">
		<p class="flow-text">Bună! Ce doriți să repetați?</p>

		<ol class="flow-text">
			@foreach($SECTIONS as $object)
				<li><a href="{{ url() -> current() }}/../{{ $object -> id }}">{{ $object -> name }}</a></li>
			@endforeach

			@if(!$SECTIONS -> isEmpty() && !$THEORY -> isEmpty())<br>@endif

			@foreach($THEORY as $object)
				<li><a href="{{ url() -> current() }}/../../theory/{{ $object -> id }}">{{ $object -> title }}</a></li>
			@endforeach
		</ol>
		<a class="btn waves-effect waves-light blue" href="#" onclick="window.history.go(-1);">Înapoi</a>
	</div>
@endsection