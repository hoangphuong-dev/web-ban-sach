<?php 
$error = "Đăng nhập để tiếp tục";
if (isset($_POST['btn'])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$sql = "SELECT * FROM admin WHERE email = '$email' AND pass = '$pass' ";
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);
	if ($count == 1) {
		session_start();
		// Đăng nhập thành công
		$row = mysqli_fetch_array($result);
		$_SESSION['admin']['id'] = $row['id'];
		$_SESSION['admin']['name'] = $row['name'];
		header("Location:index.php?module=products&action=list");
	} else{
		// Đăng nhập thất bại
		$error = " Thông tin tài khoản hoặc mật khẩu không chính xác";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<style type="text/css" media="screen">
		.div_dang_nhap {
			width: 45%;
			height: auto;
			background: #A3CEF1;
			padding: 30px;
			margin: auto;
			border-radius: 20px;
			margin-top: 15%;
		}
		.div_dang_nhap h1 {
			padding-left: 40%;
		}
		.div_dang_nhap table {
			margin: auto;
			width: 100%;
		}
		.div_dang_nhap table td{
			padding: 10px 0 10px 0;
		}
		.div_dang_nhap input,button {
			padding: 8px;
			width: 70%;
			border-radius: 3px;
			border:none;
		}
		.div_dang_nhap button {
			width: 20%;
			margin-left: 40%;
		}
	</style>	
</head>
<body>
	<div class="div_dang_nhap">
		<h1>Đăng nhập</h1>
		<h2 style="color: red"><?php echo $error; ?></h2>
		<img src="" alt="">
		<form method="POST">
			<table>
				<tr>
					<td width="25%"><label>Nhập Email:</label></td>
					<td><input type="email" name="email" required placeholder="Nhập email"></td>
				</tr>
				<tr>
					<td><label>Nhập Mật khẩu :</label></td>
					<td><input type="password" name="pass" required placeholder="Mật khẩu"></td>
				</tr>
				<tr><td colspan="2"><button type="submit" name="btn">Đăng nhập</button></td></tr>
			</table>
			
		</form>
	</div>

</body>
</html>