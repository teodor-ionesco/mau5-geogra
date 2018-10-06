@extends('global')

@section('title') Admin - Countries @endsection

@section('body')
    <div class="container">
        <p class="flow-text">Countries</p>
        <ol class="flow-text">
            @foreach($COUNTRIES as $object)
                <li><a href="{{ url() -> current() }}/countries/{{ $object -> code }}">{{ $object -> name }}</a>
                	&nbsp;
                	<i>(<a class="red-text" href="{{ url() -> current() }}/countries/{{ $object -> code }}/delete">delete</a>)</i></li>
            @endforeach
        </ol>
        <div class="row">
            <div class="col s12 m6 l4">
                <form method="POST" action="{{ url() -> current() }}/countries">
                	{{ csrf_field() }}
                	<table class="striped">
                		<tr>
                			<td>Name:&nbsp;</td>
                			<td><input type="text" name="name"></td>
                		</tr>
                		<tr>
                			<td>Code:&nbsp;</td>
                			<td><input type="text" name="code"></td>
                		</tr>
                	</table>
                    <br>
                	<button type="submit" class="btn waves-effect waves-light red" >Add</button>

                </form>
            </div>
        </div>
    </div>
@endsection
