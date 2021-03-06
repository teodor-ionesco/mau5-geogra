@extends('global')

@section('title') Edit theory @endsection
@section('head')
<style>
    .materialize-textarea
    {
        border: 1px solid black !important; 
        font-size: 20px;
        font-family: consolas, sans-serif;
    }
</style>
@endsection

@section('body')
    <div class="container">
        <form method="POST">
        	{{ csrf_field() }}
            <input type="text" hidden="" name="_method" value="PATCH">

		    <input type="text" name="title" value="{{ $THEORY -> title }}" required="" style="width:60%;">
		    <i>(
                <a href="{{ str_replace('/admin', '', url() -> current()) }}" target="_BLANK">View</a>
                |
                <a href="{{ url() -> current() . '/../../' }}">Back to sections</a>
            )</i>
            <div style="width: 60%;" title="Change theory's section">
                <select name="section">
                    <option id="select_option_origin" value="0">None (unsectioned)</option>
                    @foreach($SECTIONS as $object)
                        <option value="{{ $object -> id }}" @if($THEORY -> section == $object -> id) selected @endif>{{ $object -> name }}</option>
                    @endforeach
                </select>
                <label>Sections</label>
            </div>
            <br>
            <br>
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

@section('js')
//<script>
  /*document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });*/
  
    $(document).ready(function(){
        $('select').formSelect();
    });
       
//</script>
@endsection
