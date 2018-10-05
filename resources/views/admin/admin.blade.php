@extends('global')

@section('title') Admin - Countries @endsection

@section('body')
    <div class="container">
        <p class="flow-text">Countries</p>
        <ol class="flow-text">
            @foreach($COUNTRIES as $object)
                <li><a href="{{ url() -> current() }}/countries/{{ $object -> code }}">{{ $object -> name }}</a></li>
            @endforeach
        </ol>
    </div>
@endsection
