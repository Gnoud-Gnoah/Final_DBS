@extends('layouts.default')

@section('title', 'Ví dụ đầu tiên về Blade template')

@section('sidebar')
    @parent

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

@endsection

@section('content')

    <div class="container">
        <h1>Nhập đầy đủ tên hoặc số CMND để tìm kiếm</h1>   
        <input class="typeahead form-control" type="text" id="search" value="">
        <span></span>
    </div>
    <div id = 'exception'>
       
    </div>
    <table class="table">
            <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Mã số thuế</th>
                <th>Quản lí bởi</th>
                <th>Tình trạng</th>
            </tr>
            </thead>
            <tbody>
                <tr id='abcd'></tr>
            </tbody>
        </table>

    <script type="text/javascript">
    $(document).keypress(function(event) {
        if (event.keyCode == 13 || event.which == 13) {
            var parent = document.getElementById("abcd");
            parent?.remove();
            let key = document.getElementById("search");
            getData(key.value);
            
        }
    })
       const getData = (key) => {
        $.ajax({
            url: '/autocomplete?search=' + key,
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
                            let row = "<tr id='abcd'><td>"  + res.data[i].hoten+ 
                            "</td><td>" + res.data[i].ngaysinh + 
                            "</td><td>" + res.data[i].quequan +
                            "</td><td>" + res.data[i].masothue +
                            "</td><td>" + res.data[i].quanly +
                            "</td><td>" + res.data[i].tinhtrang +
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
@endsection
