@extends('global')

@section('title') {{ $THEORY -> title }} - Quiz @endsection

@section('body')
	<div class="container">
		<a class="btn waves-effect waves-light blue" href="{{ url() -> current() . '/../'}}">Înapoi la teorie</a>
		<hr>
		<div id="wrapper">

		</div>
	</div>
@endsection

@section('js')
//<script>
	var questions = <?= json_encode($QUIZ) ?>;

	var qNum = <?= count($QUIZ) ?>;
	var aNum = <?= count($QUIZ[0]['answers']) ?>;
	
	var qCount = 0;
	var question = -1;
	var answer = -1;
	var wrong = 0;
	
	function mix_answers()
	{
		var count = 0;
		var someint;
		
		while(true)
		{
			if(count === aNum)
				break;
			
			someint = Math.floor(Math.random() * aNum);
			
			if(questions[question].answers[someint] === '')
				continue;
			
			$('#mix_questions').html($('#mix_questions').html() + '<p> \
			  <label> \
				<input class="with-gap" name="answer" value="'+someint+'" type="radio" /> \
				<span>'+questions[question].answers[someint]+'</span> \
			  </label> \
			</p>');
			
			questions[question].answers[someint] = '';
			
			count++;
		}
	}
	
	function mix_quiz()
	{
		if(qCount === qNum)
		{
			alert('Felicitări! În total au fost '+qNum+' întrebări. Ai răspuns greșit de '+wrong+' ori. Success tura viitoare!');
			return;
		}
		
		$('#wrapper').html('				<p class="flow-text" id="mix_question"></p> \
		<div id="mix_questions"></div> \
		<a class="btn waves-effect waves-light red" onclick="check();">Verifică</a> &nbsp;&nbsp;&nbsp;');

		var someint;
		
		while(true)
		{
			someint = Math.floor(Math.random() * qNum);
			
			if(questions[someint] === '')
				continue;
			
			$('#mix_question').html(questions[someint].question);
			question = someint;
		
			mix_answers();
			
			answer = questions[someint].correct;
			
			questions[someint] = '';
			
			qCount++;
			
			break;
		}
	}	
	
	function check()
	{
		if(parseInt($('input[name=answer]:checked').val()) === answer)
		{
			alert('Corect!');
			$('#wrapper').html($('#wrapper').html() + '<a class="btn waves-effect waves-light red" onclick="mix_quiz();">Next</a>');
		}
		else
		{
			alert('Greșit! Reîncearcă.');
			wrong++;
		}
	}
	
	$(document).ready(function()
	{
		mix_quiz();
	});
// </script>
@endsection