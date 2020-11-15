@extends('layouts.default')

@section('title', 'Ví dụ đầu tiên về Blade template')

@section('sidebar')
    @parent

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <Style>
        .add_button {
            position: relative;
            left: 850px;
            bottom: 10px;
            background: #A9FFF0;
            border: 2px solid #67FFE4;
            border-radius: 5px 5px 5px 5px;
            font-size: 19px;
        }
    </Style>

@endsection

@section('content')

    <div class="container">
        <h1>Nhập đầy đủ tên hoặc số CMND để tìm kiếm</h1>   
        <button class='add_button' type="button" class="btn btn-info">Thêm</button>
        <input class="typeahead form-control" type="text" id="search" value="">
        <span></span>
        <div id = 'exception'>
       
    </div>
    <table class="table">
            <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Số CMND</th>
                <th>Mã số thuế</th>
                <th>Chức năng</th>
            </tr>
            </thead>
            <tbody>
                <tr id = 'content_tax'></tr>
            </tbody>
        </table>

    <script type="text/javascript">
    $(document).keypress(function(event) {
        if (event.keyCode == 13 || event.which == 13) {
            var parent = document.getElementById("content_tax");
            parent?.remove();
            let key = document.getElementById("search");
            getData(key.value);
        }
    })
       const getData = (key) => {
        $.ajax({
            url: '/adminSearch?search=' + key,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            async: false,
            success(res) {
                if (!res.error) {
                    if(res.data.length === 0){
                        alert("Không có kết quả! Vui lòng nhập từ khóa khác để tìm kiếm!");
                    }else{
                        for (let i = 0; i < res.data.length; i++) {
                            let row = "<tr id='content_tax'><td>"  + res.data[i].hoten +
                            "</td><td>" + res.data[i].socmnd + 
                            "</td><td>" + res.data[i].masothue + 
                            "</td><td>" + "<button type='button' class='btn btn-success'>Chi tiết</button>" + "<button type='button' class='btn btn-info'>Sửa</button>" + "<button type='button' class='btn btn-danger'>Xóa</button>" +
                            "</td></tr>";
                            $("tbody").append(row);
                        }
                    };
                }
            },
            error(err) {
            }
        });
       }
    </script>
    </div>
    
@endsection
