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

<div id = 'repair'>
<input id = '_token' type='hidden' name='_token' value='<?php echo csrf_token(); ?>'>
</div>
<div id='all'>
    <div class="container">
        <h1>Nhập đầy đủ tên hoặc số CMND để tìm kiếm</h1>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button class='add_button' type="button" class="btn btn-info"><a href="/admin/input">Thêm</a></button>
        </input>
        <input class="typeahead form-control" type="text" id="search" value="">
        <span></span>
        <div id = 'exception'>
       
    </div>
    <table id='table' class="table">
            <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Số CMND</th>
                <th>Mã số thuế</th>
                <th>Ngày sinh</th>
                <th>Quê quán</th>
                <th>Chức năng</th>
            </tr>
            </thead>
            <tbody id='tbody'>
                <tr id = 'content_tax'></tr>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
    var data;
    var token;
        $(document).keypress(function(event) {
            if (event.keyCode == 13 || event.which == 13) {
                var parent = document.getElementById("content_tax");
                parent?.remove();
                let key = document.getElementById("search");
                token = document.getElementById("_token");
                console.log(token.value);
                data = getData(key.value);
            }
        })
       const getData = (key) => {
           var spon;
        $.ajax({
            url: '/adminSearch?search=' + key,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            async: false,
            success(res) {
                if (!res.error) {
                    spon = res.data;
                    if(res.data.length === 0){
                        alert("Không có kết quả! Vui lòng nhập từ khóa khác để tìm kiếm!");
                    }else{
                        for (let i = 0; i < res.data.length; i++) {
                            let row = "<tr id='content_tax'><td>"  + res.data[i].hoten +
                            "</td><td>" + res.data[i].socmnd + 
                            "</td><td>" + res.data[i].masothue + 
                            "</td><td>" + res.data[i].ngaysinh + 
                            "</td><td>" + res.data[i].quequan + 
                            "</td><td>" + "<button type='button' class='btn btn-success' onclick='detail()'>Chi tiết</button>" + 
                            "<button type='button' class='btn btn-info mr-2' onclick='repair()'>Sửa</button>" + 
                            "<button type='button' class='btn btn-danger' onclick='remove()'>Xóa</button>" +
                            "</td></tr>"; 
                            $("tbody").append(row);
                        }
                    };
                }
               
            },
            error(err) {
            }
        });
        return spon;
       }
       function repair(){
            var parent = document.getElementById("all");
            parent?.remove();
            let row =
            "<form id = 'submit' action='/admin/repair' method='post'>" + 
            "<input type='hidden' name='_token' value=" + "'" + token.value + "'" + ">" +
            "<div class='form-group'>" +
                "<label for='hoten'>Họ, chữ đệm và tên khai sinh:</label>" +
                "<input class='form-control' id='socmnd' name='socmnd' value=" + "'" + data[0].socmnd + "'" + ">" +
            "</div>" +
            "<div class='form-group'>" +
                "<label for='hoten'>Họ, chữ đệm và tên khai sinh:</label>" +
                "<input class='form-control' id='hoten' name='hoten' value=" + "'" + data[0].hoten + "'" + ">" +
            "</div>" +
            "<div class='form-group'>" +
                "<label for='hoten'>Ngày sinh:</label>" +
                "<input class='form-control' id='ngaysinh' name='ngaysinh' value=" + "'" + data[0].ngaysinh + "'" + ">" +
            "</div>" +
            "<div class='form-group'>" +
                "<label for='hoten'>Quê quán:</label>" +
                "<input class='form-control' id='quequan' name='quequan' value=" + "'" + data[0].quequan + "'" + ">" +
            "</div>" +
            "<button type='submit' class='btn btn-info' onclick='complete()'>Hoàn thành</button></form>"
            $("#repair").append(row);
            console.log(row);
        }

        function detail(){
            var parent = document.getElementById("all");
            parent?.remove();
            let row =
            "<form>" + 
            "<div class='form-group'>" +
                "<label for='hoten'>Họ, chữ đệm và tên khai sinh:</label>" +
                "<input class='form-control' id='socmnd' name='socmnd' value=" + "'" + data[0].socmnd + "'" + ">" +
            "</div>" +
            "<div class='form-group'>" +
                "<label for='hoten'>Họ, chữ đệm và tên khai sinh:</label>" +
                "<input class='form-control' id='hoten' name='hoten' value=" + "'" + data[0].hoten + "'" + ">" +
            "</div>" +
            "<div class='form-group'>" +
                "<label for='hoten'>Ngày sinh:</label>" +
                "<input class='form-control' id='ngaysinh' name='ngaysinh' value=" + "'" + data[0].ngaysinh + "'" + ">" +
            "</div>" +
            "<div class='form-group'>" +
                "<label for='hoten'>Quê quán:</label>" +
                "<input class='form-control' id='quequan' name='quequan' value=" + "'" + data[0].quequan + "'" + ">" +
            "</div>" +
            "<button type='submit' class='btn btn-info'><a href='/admin'>Quay lại</a></button></form>"
            $("#repair").append(row);
            console.log(row);
        }

        function remove(){
            var parent = document.getElementById("all");
            parent?.remove();
            let row =
            "<form id = 'submit' action='/admin/remove' method='post'>" + 
            "<input type='hidden' name='_token' value=" + "'" + token.value + "'" + ">" +
            "<div class='form-group'>" +
                "<label for='hoten'>Họ, chữ đệm và tên khai sinh:</label>" +
                "<input class='form-control' id='socmnd' name='socmnd' value=" + "'" + data[0].socmnd + "'" + ">" +
            "</div>" +
            "<div class='form-group'>" +
                "<label for='hoten'>Họ, chữ đệm và tên khai sinh:</label>" +
                "<input class='form-control' id='hoten' name='hoten' value=" + "'" + data[0].hoten + "'" + ">" +
            "</div>" +
            "<div class='form-group'>" +
                "<label for='hoten'>Ngày sinh:</label>" +
                "<input class='form-control' id='ngaysinh' name='ngaysinh' value=" + "'" + data[0].ngaysinh + "'" + ">" +
            "</div>" +
            "<div class='form-group'>" +
                "<label for='hoten'>Quê quán:</label>" +
                "<input class='form-control' id='quequan' name='quequan' value=" + "'" + data[0].quequan + "'" + ">" +
            "</div>" +
            "<button type='submit' class='btn btn-info' onclick='completeRemove()'>Xóa</button></form>"
            $("#repair").append(row);
            console.log(row);
        }

        function completeRemove(){
            alert("Xóa thành công!");
        }

        function complete(){
            alert("Thay đổi thành công!");
        }

        function back(){
            alert("Thay đổi thành công!");
        }
    </script>
    </div>
    
@endsection
