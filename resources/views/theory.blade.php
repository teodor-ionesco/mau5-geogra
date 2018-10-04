@extends('global')

@section('title') <?= $THEORY -> title ?> @endsection

@section('body')
	<div class="container">
		<h4><?= $THEORY -> title ?></h4>
		
		<div class="divider"></div>

		<p class="flow-text">
			<?= $THEORY -> theory ?>
		</p>
		<a class="btn waves-effect waves-light red" href="{{ url() -> current() }}/quiz">Quiz</a>
	</div>

@endsection