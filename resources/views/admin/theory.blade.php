@extends('global')

@section('title') {{$THEORY -> name}} @endsection

@section('body')
    <div class="container">
        <form method="POST">
        	{{ csrf_field() }}

		    <input type="text" name="title" value="{{ $THEORY -> title }}" required="" style="width:80%;">
		    <i>(<a href="{{ str_replace('/admin', '', url() -> current()) }}" target="_BLANK">View</a>)</i>

		    <div class="divider"></div>
            <br><br>
            
        	<input type="text" hidden="" name="_method" value="PATCH">
        	<textarea name="theory" class="materialize-textarea">{{ $THEORY -> theory }}</textarea>
        	<br>
        	<button type="submit" class="btn waves-effect waves-light blue">Edit</button>
        </form>
        <br>
        @if(count($QUIZ))
        	<a class="btn waves-effect waves-light" href="{{ url() -> current() }}/quiz">Quiz</a>
        @else
        	<a class="btn waves-effect waves-light" href="{{ url() -> current() }}/quiz/make">Make Quiz</a>
        @endif
    </div>
@endsection
