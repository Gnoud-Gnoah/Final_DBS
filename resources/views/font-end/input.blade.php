@extends('layouts.default')

@section('title', 'Ví dụ đầu tiên về Blade template')

@section('sidebar')
    @parent
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <link rel="StyleSheet" type="text/css" href="../css/enterData.css"/>
@endsection

@section('content')
<script type="text/javascript">
	var dataCMND;
	var count = 0;
	$().ready(function(event) {
       dataCMND =  getData();
    })

	function accept() {
		var okie = true;
		count++;
		document.getElementById("loi_hoten").innerHTML  = "";
		document.getElementById("loi_ngaysinh").innerHTML = "";
		document.getElementById("loi_ngayhd").innerHTML = "";
		document.getElementById("loi_socmnd").innerHTML = "";

		if (document.getElementById("hoten").value == "") {
			document.getElementById("loi_hoten").innerHTML = "Lỗi chưa nhập!";
			document.getElementById("hoten").focus();
			okie = false;
		}

		if (document.getElementById("ngaysinh").value == "") {
			document.getElementById("loi_ngaysinh").innerHTML = "Chưa nhập ngày sinh!";
			document.getElementById("ngaysinh").focus();
			okie = false;
		} else if (!isDateTime(document.getElementById("ngaysinh").value)) {
			document.getElementById("loi_ngaysinh").innerHTML = "Ngày sinh không đúng định dạng!";
			document.getElementById("ngaysinh").focus();
			okie = false;
		}

		if (document.getElementById("ngayhd").value == "") {
			document.getElementById("loi_ngayhd").innerHTML = "Chưa nhập ngày đăng kí!";
			document.getElementById("ngayhd").focus();
			okie = false;
		} else if (!isDateTime(document.getElementById("ngayhd").value)) {
			document.getElementById("loi_ngayhd").innerHTML = "Ngày đăng kí không đúng định dạng!";
			document.getElementById("ngayhd").focus();
			okie = false;
		}

		if (document.getElementById("socmnd").value == "") {
			document.getElementById("loi_socmnd").innerHTML = "Chưa nhập số CMND!";
			document.getElementById("socmnd").focus();
			okie = false;
		} else if (isDateTime(document.getElementById("socmnd").value)) {
			document.getElementById("loi_socmnd").innerHTML = "Số CMND này đã có người sử dụng!";
			document.getElementById("socmnd").focus();
			okie = false;
		}
		console.log(count)
		if(count >= 6){
			okie = true;
		}else{
			okie = false;
		}

		if (okie) {
			$('#tsubmit').append('<div id="bsubmit"><button type="submit" class="btn btn-default" onclick ="add()">Submit</button></div>');
			
		}else{
			var parent = document.getElementById("bsubmit");
            parent?.remove();
		}
	}

	function add(){
		alert('Đã thêm thành công vào cở sở dữ liệu!');
	}

	function isDateTime(d) { 
		s = d.split('/');

		if (s.length != 3) return false;
		if (isNaN(s[0]) || isNaN(s[1]) || isNaN(s[2])) return false;

		//chuyen thanh cac so nguyen
		yyyy = parseInt(s[0]);
		mm = parseInt(s[1]);
		dd = parseInt(s[2]);

		//kiem tra
		if (mm > 12 || mm < 1) return false;
		if (mm == 1 || mm == 3 || mm == 5 || mm == 7 || mm == 8 || mm == 10 || mm == 12) {
			if (dd > 31) return false;
		} else if (mm == 2){
			if (nam%4 == 0 && nam%100 != 0) {
				if (dd > 29) return false;
			} else if (dd > 28) return false;
		} else if (dd > 30) return false;

		if (dd < 1) return false;

		date = new Date();
		if (yyyy > date.getFullYear() || yyyy < 1950) return false;

		return true;
	}

	function isUnique(cmnd) {
		for(let i = 0; i < 10000; i++){
			if(cmnd === dataCMND[i].socmnd){
				return false;
			}
		}
		return true;
	}

	function ChuanhoaTen(ten) {
		dname = ten;
		ss = dname.split(' ');
		dname = "";
		for (i = 0; i < ss.length; i++)
			if (ss[i].length > 0) {
				if (dname.length > 0) dname = dname + " ";
				dname = dname + ss[i].substring(0, 1).toUpperCase();
				dname = dname + ss[i].substring(1).toLowerCase();
			}
		return dname;
	}

    const getData = () => {
		var response;
		$.ajax({
            url: '/takeDataUnique',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            async: false,
            success(res) {
                if (!res.error) {
					console.log(res.data)
                    response = res.data;
                }
            },
            error(err) {
            }
        });
		return response;
	}
	document.onchange = function() {
		accept();
	}
</script>
	
<form id = 'submit' action="/admin/input/out" method="post">
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <div class="form-group">
    <label for="hoten">Họ, chữ đệm và tên khai sinh:</label>
    <input class="form-control" id="hoten" name="hoten" placeholder="Nguyễn Văn A">
	<span id="loi_hoten" class="Baoloi" ></span>
  </div>
  <div class="form-group">
    <label for="ngaysinh">Ngày sinh:</label>
    <input class="form-control" id="ngaysinh" name="ngaysinh" placeholder="yyyy-mm-dd">
	<span id="loi_ngaysinh" class="Baoloi" ></span>
  </div>
  <div class="form-group">
    <label for="quequan">Quê quán:</label>
    <input class="form-control" id="quequan" name="quequan">
  </div>
  <div class="form-group">
    <label for="socmnd">Số CMND</label>
    <input class="form-control" id="socmnd" name="socmnd" placeholder="123456789">
	<span id="loi_socmnd" class="Baoloi" ></span>
  </div>
  <div class="form-group">
    <label for="dantoc">Nơi quản lý:</label>
    <input class="form-control" id="quanly" name="quanly" placeholder="">
  </div>
  <div class="form-group">
    <label for="ngayhd">Ngày đăng kí:</label>
    <input class="form-control" id="ngayhd" name="ngayhd" placeholder="yyyy-mm-dd">
	<span id="loi_ngayhd" class="Baoloi" ></span>
  </div>
	<div id='tsubmit'>
		<div id='bsubmit'></div>
	</div>
</form>
@endsection

