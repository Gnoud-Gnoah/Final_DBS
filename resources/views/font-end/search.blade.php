@extends('layouts.default')

@section('title', 'Ví dụ đầu tiên về Blade template')

@section('sidebar')
    @parent

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

@endsection

@section('content')

    <div class="container">
        <h1>Laravel 8 Autocomplete Search using Bootstrap Typeahead JS - ItSolutionStuff.com</h1>   
        <input class="typeahead form-control" type="text">
    </div>
    
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection