@extends('global')

@section('title') <?= $COUNTRY -> name ?> - Index @endsection

@section('body')
	<div class="container">
		<p class="flow-text">Bună! Ce doriți să repetați?</p>

		<ol class="flow-text">
			@foreach($GEN as $object)
				<li><a href="{{ $object -> url }}">{{ $object -> name }}</a></li>
			@endforeach

			@if(!$GEN -> isEmpty())<br>@endif

			@foreach($SECTIONS as $object)
				<li><a href="{{ url() -> current() }}/sections/{{ $object -> id }}">{{ $object -> name }}</a></li>
			@endforeach

			@if(!$THEORY -> isEmpty() && !$SECTIONS -> isEmpty())<br>@endif

			@foreach($THEORY as $object)
				<li><a href="{{ url() -> current() }}/theory/{{ $object -> id }}">{{ $object -> title }}</a></li>
			@endforeach
		</ol>
		<a class="btn waves-effect waves-light blue" href="{{ url() -> current() . '/../../'}}">Înapoi</a>
	</div>
@endsection