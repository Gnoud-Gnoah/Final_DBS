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
    <input class="typeahead form-control" type="text" id="search" value="">
</div>
<table class="table">
    <thead>
    <tr>
        <th>Họ và tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Dân tộc</th>
        <th>Mã số thuế</th>
        <th>Quản lí bởi</th>
        <th>Tình trạng</th>
    </tr>
    </thead>
    <tbody>
        @foreach($data as $da)
            <div>
                <div">{{$da->hoten}}</div>
                <p>{{$da->socmnd}}</p>
            </div>
        @endforeach
    </tbody>
</table>                 
        