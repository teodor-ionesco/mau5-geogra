@extends('global')

@section('title') {{$COUNTRY -> name}} - Sections @endsection

@section('body')
    <div class="container">
        <p class="flow-text">{{ $COUNTRY -> name }}</p>
        <ol class="flow-text">
            <br>
            @if($SCOPE === 'index')
                @foreach($DATA as $object)
                    <li><a href="{{ url() -> current() }}/sections/{{ $object -> id }}">{{ $object -> name }}</a>
                    &nbsp;
                    <i>(<a class="red-text" href="{{ url() -> current() }}/sections/{{ $object -> id }}/delete">delete</a>)</i></li>
                @endforeach
                <div class="row" style="position:relative; right: 40px;">
                    <div class="col s12 m8 l6">
                        <form action="{{ url() -> current() }}" method="POST">
                            {{ csrf_field() }}
                            <table class="striped">
                                <tr>
                                    <td>Title:&nbsp;</td>
                                    <td><input type="text" required="" name="title"></td>
                                </tr>                         
                            </table>
                            <button type="submit" class="btn waves-effect waves-light red" >Add</button>
                        </form>
                    </div>
                </div>
            @else
                @foreach($DATA as $object)
                    <li><a href="/admin/countries/{{$COUNTRY -> code}}/theory/{{ $object -> id }}">{{ $object -> title }}</a>
                    &nbsp;
                    <i>(<a class="red-text" href="/admin/countries/{{$COUNTRY -> code}}/theory/{{ $object -> id }}/delete">delete</a>)</i></li>
                @endforeach
                <div class="row" style="position:relative; right: 40px;">
                    <div class="col s12 m8 l6">
                        <form action="{{ request() -> url() }}/theory" method="POST">
                            {{ csrf_field() }}
                            <input name="section" value="{{ $SECTION }}" hidden="">
                            <table class="striped">
                                <tr>
                                    <td>Title:&nbsp;</td>
                                    <td><input type="text" required="" name="title"></td>
                                </tr>                         
                            </table>
                            <button type="submit" class="btn waves-effect waves-light red" >Add</button>
                        </form>
                    </div>
                </div>
            @endif
        </ol>
    </div>
@endsection
