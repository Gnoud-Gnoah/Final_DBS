<!DOCTYPE html><html><head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="StyleSheet" type="text/css" href="../css/enterData.css"/>
</head><body>
		<form id="form1" method="post" action="newacc.php">
			<!--
				Con trỏ sự kiện của các đối tượng #hoten, #diachi, #nam, #nu, #ngaysinh, #email
				được gán giá trị sau (xem tệp js/form.js).
			-->
			<div>
				<label class="HangMoi">Họ, chữ đệm và tên khai sinh:</label>
				<input type="text" id="hoten" name="hoten" class="TruongBatbuoc"/>
				<span id="loi_hoten" class="Baoloi" ></span>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Ngày, tháng, năm sinh:</label>
				<input type="text" id="ngaysinh" name="ngaysinh" placeholder="nn/tt/nnnn" class="TruongBatbuoc"/>
				<span id="loi_ngaysinh" class="Baoloi" ></span>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Giới tính:</label>
				<label class="radio-container">
					<input type="radio" id="nam" name="gioitinh" checked="checked"/> Nam
					<span class="checkmark"></span>
					<span class="checkmark2"></span>
				</label>

				<label class="radio-container">
					<input type="radio" id="nu" name="gioitinh"/> Nữ
					<span class="checkmark"></span>
					<span class="checkmark2"></span>
				</label>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Nhóm máu:</label>
				<label class="radio-container">
					<input type="radio" id="O" name="nhommau" checked="checked"/> O
					<span class="checkmark"></span>
					<span class="checkmark2"></span>
				</label>
				<label class="radio-container">
					<input type="radio" id="A" name="nhommau"/> A
					<span class="checkmark"></span>
					<span class="checkmark2"></span>
				</label>
				<label class="radio-container">
					<input type="radio" id="B" name="nhommau"/> B
					<span class="checkmark"></span>
					<span class="checkmark2"></span>
				</label>
				<label class="radio-container">
					<input type="radio" id="AB" name="nhommau"/> AB
					<span class="checkmark"></span>
					<span class="checkmark2"></span>
				</label>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Tình trạng hôn nhân:</label>
				<label class="radio-container">
					<input type="radio" id="chuakethon" name="tinhtrangkethon" checked="checked"/> Chưa kết hôn
					<span class="checkmark"></span>
					<span class="checkmark2"></span>
				</label>
				<label class="radio-container">
					<input type="radio" id="dakethon" name="tinhtrangkethon"/> Đã kết hôn
					<span class="checkmark"></span>
					<span class="checkmark2"></span>
				</label>
				<label class="radio-container">
					<input type="radio" id="lyhon" name="tinhtrangkethon"/> Ly hôn
					<span class="checkmark"></span>
					<span class="checkmark2"></span>
				</label>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Nơi đăng kí khai sinh:</label>
				<input type="text" id="noidangkikhaisinh" name="noidangkikhaisinh"/>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Quê quán:</label>
				<input type="text" id="quequan" name="quequan"/>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Dân tộc:</label>
				<input type="text" id="dantoc" name="dantoc" placeholder="Kinh, Tày, Nùng,..." class="TruongBatbuoc"/>
				<span id="loi_dantoc" class="Baoloi" ></span>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Tôn giáo:</label>
				<input type="text" id="tongiao" name="tongiao" placeholder="Không, Phật giáo,..." class="TruongBatbuoc"/>
				<span id="loi_tongiao" class="Baoloi" ></span>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Số CMND:</label>
				<input type="text" id="cmnd" name="cmnd" placeholder="9 chữ số trên CMND" class="TruongBatbuoc"/>
				<span id="loi_cmnd" class="Baoloi" ></span>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Nơi thường chú:</label>
				<input type="text" id="noithuongchu" name="noithuongchu"/>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Nơi ở hiện tại:</label>
				<input type="text" id="noiohientai" name="noiohientai"/>
				<br/>
			</div>
			<div>
				<label class="HangMoi">Ghi chú:</label>
				<textarea id="ghichu" name="ghichu"></textarea>
				<br/>
			</div>
			<div>
				<label class="HangMoi">&nbsp;</label>
				<input type="button" onclick = "javascript:Chapnhan();" value="Chấp nhận"/>
				<input type="button" onclick = "javascript:Boqua();" value="Bỏ qua"/>
				<br/>
			</div>
		</form>
		<script type="text/javascript" src="../js/enterData.js"></script>
</body></html>
