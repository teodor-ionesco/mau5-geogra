@extends('global')

@section('title') {{$COUNTRY -> name}} @endsection

@section('body')
    <div class="container">
        <p class="flow-text">{{ $COUNTRY -> name }}</p>
        <ol class="flow-text">
            @foreach($GEN as $object)
                <li><a href="{{ $object -> url }}">{{ $object -> name }}</a></li>
            @endforeach
            <br>
            @foreach($THEORY as $object)
            	<li><a href="{{ url() -> current() }}/theory/{{ $object -> id }}">{{ $object -> title }}</a></li>
            @endforeach
        </ol>
    </div>
@endsection
