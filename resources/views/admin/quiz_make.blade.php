@extends('global')

@section('title')  @endsection

@section('body')

	<div class="container">
		<form method="POST">
			{{ csrf_field() }}
			<div id="sets">
				
			</div>
			<br>
			<button type="submit" class="btn waves-effect waves-light red">Create</button>
			<a class="btn waves-effect waves-light blue" href="#!" onclick="add_question();">Add question</a>
		</form>
	</div>

@endsection

@section('js')
//<script>

	var gQC = 0;

	function add_question()
	{
		$('#sets').html(
			$('#sets').html() 
			+ 
			'<table id="'+gQC+'" class="striped"> \
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
			<div> \
				<a class="btn waves-effect waves-light blue" href="#!" onclick="delete_question('+gQC+');">Delete set</a> \
				<div class="divider"></div>\
			</div> \
		');

		gQC++;
	}

	function delete_question(id)
	{
		$('#'+id).next().remove();
		$('#'+id).remove();
	}


//</script>
@endsection