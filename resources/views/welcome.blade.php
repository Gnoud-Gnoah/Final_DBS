<!DOCTYPE html>
<html>
   <head>
		<title>CSS layout</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
		<link rel="Stylesheet" href="../css/design.css" type="text/css">
		<style>
			body {
	margin:0px;
	padding:0px;
}
#container {
	padding:0px;
	width: 980px;
	margin-left:auto;
	margin-right:auto;
	position:relative;
	top:0px;
}

#header {
	background-image:url('../images/banner.png');
	background-repeat:no-repeat;
	height: 160px;
	width:980px;
	background-color:#fff000;
}

#leftbar {
	display:inline;
	float:left;
	width:165px;
}

#content {
	display:inline;
	float:left;
	width:605px;
	padding:20px;
}

#rightbar {
	display:inline;
	float:left;
	width:140px;
}

.spacer {clear:both;}

#footer{
	background-color:#9d2224;
}

p {
	text-align:justify;
}


ul.single-vertical-menu  {
	padding:0px;
}
ul.single-vertical-menu  li {
	left:0px;
	height:45px;
	padding:0px ;  
    margin:0px;        
	background:url('../images/bgmenu.gif') no-repeat;
	list-style:none;
}

ul.single-vertical-menu  li > a {
	text-decoration:none;
	cursor: pointer;
	position:relative;
	top:10px;
	left:5px;
}
ul.single-vertical-menu  li > a:hover {
	color:red;
}

.linkedimg {
	border: #920001 1px solid;
	cursor: pointer;
}

#owner {
	display:inline;
	float:left;
	width: 660px;
	color:#ffffff;
	padding:20px;
}

#developer {
	display:inline;
	float:left;
	color:#999999;
	width: 240px;
	padding:20px;
	text-align: right;
}

#menu {
	background: #1e7c9a;
	padding: 5px 15px 5px 15px;
	position:fixed;
	top:0px;
	left:10px;
}
#menu  li { 
	list-style-type: none;
	cursor:pointer;
    text-decoration: none;
    color: #ffffff;
    padding: 5px 15px 0px 15px;
    background: #1e7c9a;
}

#menu li a {  white-space: nowrap; }

#menu > li {
	display: inline;
    position: relative;
	padding: 5px 10px;
}

#menu > li:hover {
	background: #2f8d9a;
}

#menu > li  > ul {
	display:none;
}

#menu > li:hover > ul {
	display: block;
    position: absolute;
	left:-50px;
}

#menu > li > ul > li {
	position:relative;
}
#menu > li  > ul > li > ul {
	display:none;
}

#menu > li:hover > ul > li:hover > ul{
	display: block;
    position: absolute;
	left:170px;
    top:0;
}

#menu > li  > ul > li {
	width:180px;
	border-bottom: solid 1px #1e6c8b;
	background: #123cdf;
}

#menu > li  > ul > li > ul > li {
	width:180px;
	border-bottom: solid 1px #1e6c8b;
	background: #abc123;
}


ul.droplinemenu {
	position: relative;
	background: #2f8d9a;
	padding-top: 5px;
	padding-bottom:5px;
}

ul.droplinemenu > li {
	display: inline;
	height: 20px;
	padding: 5px 10px;
	list-style-type: none;
	cursor:pointer;
}
ul.droplinemenu > li:hover {
	background:#cdcdcd;
}

ul.droplinemenu  > li > ul {
	display: none;
	position:absolute;
	top:29px;
	left:0px;
	padding-top: 5px;
	padding-bottom:5px;
	width:940px;
	background:#cdcdcd;
}

ul.droplinemenu  > li:hover > ul  {
	display: block;
}

ul.droplinemenu  > li > ul > li {
	display: inline;
	cursor:pointer;
	list-style-type: none;
	padding: 5px 10px;
}
ul.droplinemenu  > li > ul > li:hover {
	color: red;
}

form.searchBar input[type=text] {
  padding: 10px;
  font-size: 20px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  height: 30px;
  background: #f1f1f1;
}

/* Style the submit button */
form.searchBar button {
  float: left;
  width: 17%;
  height: 52px;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 20px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.searchBar button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.searchBar::after {
  content: "";
  clear: both;
  display: table;
}
		</style>
	</head>        
	<body>
	
		<div id="container">
			
			<div id="header"></div>
			<form class="searchBar" action="/action_page.php" style="margin:auto;max-width:800px">
  					<input type="text" placeholder="Search.." name="search2">
 					<button type="submit"><i class="fa fa-search"></i></button>
			</form>
			<div id="main">
				<div id="leftbar">
					<ul class="single-vertical-menu">
						<li><a href ="">Trang tin điện tử</a></li> 
						<li><a href ="">Diễn đàn</a></li>
						<li><a href ="">Dịch vụ công</a></li>
						<li><a href ="">Phổ biến kiến thức</a></li>
						<li><a href ="">Đào tạo từ xa</a></li>
						<li><a href ="">Hoạt động sáng tạo</a></li>
						<li><a href ="">Tư vấn phản biện</a></li>
						<li><a href ="">Thư điện tử</a></li>		
					</ul>				
				</div>
				<div id="content">
					
				</div>
				<div id="rightbar">
					
				</div>
				<div class="spacer"></div>
			</div>
			<div id="footer">
				<div id="upper-footer">
					<div id="owner">
						Trường Đại học Công nghệ - Đại học Quốc gia. <br>
						Địa chỉ: 144 Xuân thủy - Cầu Giấy - Hà Nội - Việt Nam. <br>
						Điện thoại: (+84) 43.9432206, 43.9432208. Fax: (+84) 43.8227593. E-mail: thongtin@vusta.vn.<br>
						Giấy phép Số 169/GP-BC ngày 02/05/2007. 
					</div>
					<div id="developer">
						Cổng thông tin tra cứu thông tin. <br>
						được phát triển bởi Sinh viên Công nghệ <br>
						https://github.com/Gnoud-Gnoah/Final_DBS
					</div>
					<div class="spacer"></div>
				</div>
				<div id="lower-footer">
				</div>
			</div>
		</div>
</body>
</html>
