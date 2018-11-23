@extends('global')

@section('title') {{$COUNTRY -> name}} @endsection

@section('body')
    <div class="container">
        <p class="flow-text">{{ $COUNTRY -> name }}</p>
        <ol class="flow-text">
            @foreach($GEN as $object)
                <li><a href="{{ $object -> url }}" target="_BLANK">{{ $object -> name }}</a>
                &nbsp;
                <i>(<a class="red-text" href="{{ url() -> current() }}/generalities/{{ $object -> id }}/delete">delete</a>)</i></li>
            @endforeach
            <div class="row" style="position:relative; right: 40px;">
                <div class="col s12 m8 l6">
                    <form action="{{ url() -> current() }}/generalities" method="POST">
                        {{ csrf_field() }}
                        <table class="striped">
                            <tr>
                                <td>Title:&nbsp;</td>
                                <td><input type="text" required="" name="title"></td>
                            </tr>
                            <tr>
                                <td>URL:&nbsp;</td>
                                <td><input type="text" required="" name="url"></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn waves-effect waves-light red" >Add</button>
                    </form>
                </div>
            </div>

            <br>
            @foreach($SECTIONS as $object)
                <li><a href="{{ url() -> current() }}/sections/{{ $object -> id }}">{{ $object -> name }}</a>
                &nbsp;
                <i>(<a class="red-text" href="{{ url() -> current() }}/sections/{{ $object -> id }}/delete">delete</a>)</i></li>
            @endforeach
            <div class="row" style="position:relative; right: 40px;">
                <div class="col s12 m8 l6">
                    <form action="{{ url() -> current() }}/sections" method="POST">
                        {{ csrf_field() }}
                        <input name="section" value="0" hidden="">
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

            <br>
            @foreach($THEORY as $object)
            	<li><a href="{{ url() -> current() }}/theory/{{ $object -> id }}">{{ $object -> title }}</a>
                &nbsp;
                <i>(<a class="red-text" href="{{ url() -> current() }}/theory/{{ $object -> id }}/delete">delete</a>)</i></li>
            @endforeach
            <div class="row" style="position:relative; right: 40px;">
                <div class="col s12 m8 l6">
                    <form action="{{ url() -> current() }}/theory" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="section" value="0" hidden="">
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
        </ol>
    </div>
@endsection
