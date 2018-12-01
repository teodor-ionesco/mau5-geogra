@extends('global')

@section('title') @if(!empty($SECTION)) {{ $SECTION -> name}} @else {{ $COUNTRY -> name }} - Sections @endif @endsection

@section('body')
    <div class="container">
        <ol class="flow-text">
            @if($SCOPE === 'index')
                @foreach($DATA as $object)
                    <li><a href="/admin/countries/{{$COUNTRY -> code}}/sections/{{ $object -> id }}">{{ $object -> name }}</a>
                    &nbsp;
                    <i>(<a class="red-text" href="/admin/countries/{{$COUNTRY -> code}}/sections/{{ $object -> id }}/delete">delete</a>)</i></li>
                @endforeach
                <div class="row" style="position:relative; right: 40px;">
                    <div class="col s12 m8 l6">
                        <form action="{{ url() -> current() }}" method="POST">
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
            @else
                <form action="{{ request() -> url() }}" method="POST" style="width: 60%">
                    {{ csrf_field() }}
                    <input type="text" name="_method" value="PATCH" hidden="">
                    <input type="text" name="name" value="{{ $SECTION -> name }}" required="">
                    <select name="section">
                        <option value="0">None (unsectioned)</option>
                        @foreach($SECTIONS_CH as $object)
                            <option value="{{ $object -> id }}" {{ ($object -> id == $SECTION -> section) ? 'selected' : null }}>{{ $object -> name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <button type="submit" class="btn blue waves-effect waves-light">Change</button>
                </form>
                <br>
                <div class="divider"></div>

                @foreach($GENERALITIES as $object)
                    <li><a href="{{ $object -> url}}">{{ $object -> name }}</a>
                    &nbsp;
                    <i>(<a class="red-text" href="/admin/countries/{{$COUNTRY -> code}}/generalities/{{ $object -> id }}/delete">delete</a>)</i></li>
                @endforeach
                <div class="row" style="position:relative; right: 40px;">
                    <div class="col s12 m8 l6">
                        <form action="/admin/countries/{{ $COUNTRY -> code }}/generalities" method="POST">
                            {{ csrf_field() }}
                            <input name="section" value="{{ $SECTION -> id}}" hidden="">
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

                @foreach($SECTIONS as $object)
                    <li><a href="/admin/countries/{{$COUNTRY -> code}}/sections/{{ $object -> id }}">{{ $object -> name }}</a>
                    &nbsp;
                    <i>(<a class="red-text" href="/admin/countries/{{$COUNTRY -> code}}/sections/{{ $object -> id }}/delete">delete</a>)</i></li>
                @endforeach

                <div class="row" style="position:relative; right: 40px;">
                    <div class="col s12 m8 l6">
                        <form action="/admin/countries/{{ $COUNTRY -> code }}/sections" method="POST">
                            {{ csrf_field() }}
                            <input name="section" value="{{ $SECTION -> id}}" hidden="">
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
                @foreach($DATA as $object)
                    <li><a href="/admin/countries/{{$COUNTRY -> code}}/theory/{{ $object -> id }}">{{ $object -> title }}</a>
                    &nbsp;
                    <i>(<a class="red-text" href="/admin/countries/{{$COUNTRY -> code}}/theory/{{ $object -> id }}/delete">delete</a>)</i></li>
                @endforeach
                <div class="row" style="position:relative; right: 40px;">
                    <div class="col s12 m8 l6">
                        <form action="/admin/countries/{{$COUNTRY -> code}}/theory" method="POST">
                            {{ csrf_field() }}
                            <input name="section" value="{{ $SECTION -> id}}" hidden="">
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

@section('js')
//<script>

    $(document).ready(function()
    {
        $('select').formSelect();
    });

//</script>
@endsection
