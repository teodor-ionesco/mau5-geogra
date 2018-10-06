@extends('global')

@section('title') <?= $THEORY -> title ?> @endsection

@section('body')
	<div class="container">
		<h4><?= $THEORY -> title ?></h4>
		
		<div class="divider"></div>

		<p class="flow-text">
			<?= $THEORY -> theory ?>
		</p>
		@if(count($QUIZ))
			<a class="btn waves-effect waves-light red" href="{{ url() -> current() }}/quiz">Quiz</a>
		@endif
		<a class="btn waves-effect waves-light blue" href="{{ url() -> current() . '/../../'}}">Înapoi</a>
	</div>

@endsection