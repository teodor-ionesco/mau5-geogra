@extends('global')

@section('title') Search @endsection


@section('body')
	<div class="container">
		<center>
			<form method="POST">
				{{ csrf_field() }}
				<div style="width: 70%">
<<<<<<< HEAD
					<input name="phrase" placeholder="Caută aici.." required="" value="{{ $QUERY }}">
=======
					<input name="phrase" placeholder="Caută aici.." required="">
>>>>>>> 095a712676dee8e026abc405badf61beb84fdc52
					<button style="" type="submit" class="btn blue waves-effect waves-lighten">Caută</button>
					<a class="btn waves-effect waves-light blue" href="/admin">Înapoi</a>
				</div>
			</form>
			<br>
			<div class="divider"></div>
		</center>

		<span style="color: red">{{ $MESSAGE }}</span>

		@if(!empty($RESULTS['countries']))
			<h4>Țări</h4>
			<div>
				<ol>
					@foreach($RESULTS['countries'] as $object)
						<li><a href="/admin/countries/{{ $object -> code }}" target="">{{ strtoupper($object -> name) }}</a></li>
					@endforeach					
				</ol>
			</div>
			<br>
		@endif

		@if(!empty($RESULTS['generalities']))
			<h4>Generalități</h4>
			<div>
				<table class="table responsive-table bordered ">
					<thead>
						<tr>
							<th>Link</th>
							<th>Țara</th>
						</tr>
					</thead>
					<tbody>
						@foreach($RESULTS['generalities'] as $object)
							<tr>
								<td><a href="{{ $object -> url }}" target="">{{ $object -> name }}</a></td>
								<td><a href="/admin/countries/{{ $object -> country }}" target="">{{ strtoupper($object -> country) }}</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<br>
		@endif

		@if(!empty($RESULTS['sections']))
			<h4>Secțiuni</h4>
			<div>
				<table class="table responsive-table bordered ">
					<thead>
						<tr>
							<th>Nume</th>
							<th>Țara</th>
						</tr>
					</thead>
					<tbody>
						@foreach($RESULTS['sections'] as $object)
							<tr>
								<td><a href="/admin/countries/{{ $object -> country }}/sections/{{ $object -> id }}" target="">{{ $object -> name }}</a></td>
								<td><a href="/admin/countries/{{ $object -> country }}" target="">{{ strtoupper($object -> country) }}</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<br>
		@endif

		@if(!empty($RESULTS['theory']))
			<h4>Teorie</h4>
			<div >
				<table class="table highlight responsive-table bordered ">
					<thead>
						<tr>
							<th>Titlu articol</th>
							<th>Țara</th>
						</tr>
					</thead>
					<tbody>
						@foreach($RESULTS['theory'] as $object)
							<tr>
								<td><a href="/admin/countries/{{ $object -> country }}/theory/{{ $object -> id }}" target="">{{ $object -> title }}</a></td>
								<td><a href="/admin/countries/{{ $object -> country }}" target="">{{ strtoupper($object -> country) }}</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif
		
	</div>
@endsection