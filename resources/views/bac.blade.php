@extends('global')

@section('title') Geogra - Bac @endsection

@section('body')

	<div class="container">
		<center>
			<form method="POST" action="/bac/{{ $YEAR }}/search">
				{{ csrf_field() }}
				<div style="width: 70%">
					<input name="search" placeholder="Caută varianta.." required="" value="{{ $QUERY }}">
					<button style="" type="submit" class="btn blue waves-effect waves-lighten">Caută</button>
					<a class="btn waves-effect waves-light blue" href="/">Înapoi</a>
				</div>
			</form>
			<br>
			<div class="divider"></div>
		</center>

		@if(!empty($FILES))
			<ol class="flow-text">
				@foreach($FILES as $file)
					<li><a target="_BLANK" href="/bac/{{ $YEAR }}/{{ $file }}">{{ $file }}</a></li>
				@endforeach
			</ol>
		@endif
	</div>

@endsection