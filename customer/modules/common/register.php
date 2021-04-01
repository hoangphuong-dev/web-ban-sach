<?php 
$error = "";
if (isset($_POST['btn'])) {
	$name = $_POST['name'];
	$sex = $_POST['sex'];
	$DOB = $_POST['DoB'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone_no = $_POST['phone'];
	$pass = md5($_POST['password']);
	$sql = "INSERT INTO `customer` (`id_customer`,`name`,`sex`,`DoB`,`address`,`email`,`phone_no`,`pass`) values ('NULL','$name','$sex','$DOB','$address','$email','$phone_no','$pass' ) ";
	$result = mysqli_query($conn,$sql);
	$result = mysqli_close($conn);
	if ($result == false) echo "Error: ".mysqli_error($conn);
	else header("Location:index.php?module=common&action=login"); // Đăng ký thành công
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="layout/content.css">
	<style type="text/css">
		.register{
			background-color: #A3CEF1;
			margin: auto;
			margin-top: 10%;
			width: 70%;
			padding: 20px 0 10px 20px;
			font-size: 20px;
			border-radius: 10px;
			border: none;
		}
		.register h2{
			margin-bottom: 25px;
			color: red;
		}
		.register td{
			padding: 5px 0 5px 0;
			font-size: 20px;
		}
		.register input {
			padding: 5px 0 5px 10px;
			width: 90%;
		}
		.register button{
			padding: 8px 0 8px 0;
			margin-top: 20px;
			width: 17%;
			background: lightgreen;
			border-radius: 3px;
			font-size: 17px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<?php require_once("layout/header.php");?>
	<?php require_once("layout/menu_ngang.php");?>
	<div class="container">
		<?php require_once("layout/danh_muc_san_pham.php"); ?>
		<div class="content">
			<div class="register">
				<h2 align="center">Đăng ký để trở thành hội viên</h2>
				<div>
					<form method="POST" action="index.php?module=common&action=register">
						<table width="100%">
							<tr>
								<td width="23%"><label>Nhập tên : </label></td>
								<td><input class="name" type="text" name="name" placeholder="Thêm vào tên của bạn"></td>
							</tr>
							<tr>
								<td><label>Giới tính : </label></td>
								<td>
									<input style="width: 5%" type="radio" name="sex">Nam &emsp;&emsp;
									<input style="width: 5%" type="radio" name="sex">Nữ
								</td>
							</tr>
							<tr>
								<td><label>Ngày sinh : </label></td>
								<td><input type="date" name="DoB"></td>
							</tr>
						</tr>
						<td><label>Email : </label></td>
						<td><input type="email" name="email" placeholder="Thêm vào Email của bạn"></td>
						<tr>
						</tr>
						<td><label>Số điện thoại : </label></td>
						<td><input type="number" name="phone" placeholder="Thêm vào số điện thoại của bạn"></td>
						<tr>
						</tr>
						<td><label>Mật khẩu : </label></td>
						<td><input type="password" name="password" placeholder="Nhập mật khẩu đăng nhập"></td>
						<tr>
						</tr>
						<td><label>Địa chỉ : </label></td>
						<td><input type="text-align" name="address" placeholder="Thêm vào địa chỉ của bạn"></td>
						<tr>
						</tr>
						<td colspan="2" style="text-align: center"><button type="submit" name="btn">Đăng ký</button></td>
						<tr>
						</table>
					</form>
					<button type="submit" name="btn">Trở về</button>
				</div>
			</div>
		</div>
	</div>
	<?php require_once("layout/footer.php") ?>	
</body>
<script type="text/javascript">
	function Ok() {
		var username = document.getElementById('ten_dang_nhap');
		var pass = document.getElementById('mat_khau');
		var xt_phone = /^([+840-9]){10,11}$/g;
		var xt_email = /^[a-z][a-z0-9_\.]{1,}@[a-z0-9]{2,}(\.[a-z0-9]{1,}){1,}$/g ;
		var xt_pass = /^([a-zA-Z0-9]){8,}$/g;
		function DK1(){
			if(username.value.trim() == ""){
				alert("Bạn chưa nhập tên đăng nhập");
				return false;
			}
			else if(xt_phone.test(username.value.trim() ) == true |) {
				(xt_email.test(username.value.trim()) == true|)
				return true;
			}	   
			else{
				return false;
			}	
		}
		function DK2(){
			if (password.value.trim() == "") {
				alert("Bạn chưa nhập mật khẩu");
				return false;
			}
			else if(xt_pass.test(password.value.trim()) == true){
				return true;
			}
			else{
				return false;
			}
		}
		if (DK1() == true & DK2() == true) {
			return true;
		}
		else{
			return false;
		}
	}
</script>
</html>
