@extends('global')

@section('title')  @endsection

@section('body')

	<div class="container">
		<form method="POST">
			{{ csrf_field() }}
			<input type="text" name="_method" value="PATCH" hidden="">
			<a class="btn waves-effect waves-light red" href="{{ url() -> current() }}/delete">Delete Quiz</a>
			<a class="btn waves-effect waves-light blue" href="{{ str_replace('/admin', '', url() -> current()) }}">View Quiz</a>
			<hr>
			<div id="sets">
				@foreach($QUIZ as $key => $set)
					<table id="{{ $key }}" class="striped">
						<tr>
							<td>Question:&nbsp;</td> 
							<td><input type="text" name="quiz[{{ $key }}][question]" value="{{ $set['question'] }}" required></td> 
						</tr> 
						<tr> 
							<td>Answer1:&nbsp;</td> 
							<td><input type="text" name="quiz[{{ $key }}][0]" value="{{ $set['answers'][0] }}" required></td> 
						</tr> 
						<tr> 	
							<td>Answer2:&nbsp;</td> 
							<td><input type="text" name="quiz[{{ $key }}][1]" value="{{ $set['answers'][1] }}" required></td> 
						</tr>
						<tr> 
							<td>Answer3:&nbsp;</td> 
							<td><input type="text" name="quiz[{{ $key }}][2]" value="{{ $set['answers'][2] }}" required></td> 
						</tr> 
						<tr> 
							<td>Answer4:&nbsp;</td> 
							<td><input type="text" name="quiz[{{ $key }}][3]" value="{{ $set['answers'][3] }}" required></td> 
						</tr>
					</table> 
					<div>
						<a class="btn waves-effect waves-light blue" href="#!" onclick="delete_question('{{ $key }}');">Delete set</a>
						<div class="divider"></div>
					</div>
				@endforeach
			</div>
			<br>
			<button class="btn waves-effect waves-light red" type="submit">Submit</button> 
			<a class="btn waves-effect waves-light blue" href="#!" onclick="add_question();">Add question</a>
		</form>		
	</div>

@endsection

@section('js')
//<script>

	var gQC = -1;

	function add_question()
	{
		$('#sets').html(
			$('#sets').html() 
			+ 
			'<table id="'+gQC+'"> \
				<tr> \
					<td>Question:&nbsp;</td> \
					<td><input type="text" name="quiz['+gQC+'][question]" value="" required></td> \
				</tr> \
				<tr> \
					<td>Answer1:&nbsp;</td> \
					<td><input type="text" name="quiz['+gQC+'][0]" value="" required></td> \
				</tr> \
				<tr> 	\
					<td>Answer2:&nbsp;</td> \
					<td><input type="text" name="quiz['+gQC+'][1]" value="" required></td> \
				</tr>\
				<tr> \
					<td>Answer3:&nbsp;</td> \
					<td><input type="text" name="quiz['+gQC+'][2]" value="" required></td> \
				</tr> \
				<tr> \
					<td>Answer4:&nbsp;</td> \
					<td><input type="text" name="quiz['+gQC+'][3]" value="" required></td> \
				</tr>\
			</table> \
			<div>\
				<a class="btn waves-effect waves-light blue" href="#!" onclick="delete_question('+gQC+');">Delete set</a> \
				<div class="divider"></div>\
			</div> \
		');

		gQC--;
	}

	function delete_question(id)
	{
		$('#'+id).next().remove();
		$('#'+id).remove();
	}


//</script>
@endsection