<?php 
$error = "Đăng nhập để tiếp tục";
if (isset($_POST['btn'])) {
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);
	$sql = "SELECT id_customer,name FROM customer WHERE email = '$email' AND pass = '$pass' ";
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);
	if ($count == 1) {
		session_start();
		// Đăng nhập thành công
		$row = mysqli_fetch_array($result);
		$_SESSION['customer']['id_customer'] = $row['id_customer'];
		$_SESSION['customer']['name'] = $row['name'];
		header("Location:index.php");
	} else{
		// Đăng nhập thất bại
		$error = " Thông tin tài khoản hoặc mật khẩu không chính xác";
	}
}
?>
<?php 
require_once("layout/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<meta charset="utf-8">
	<style type="text/css">
		.login{
			padding: 16px;
		}
		.login form{
			background-color: #A3CEF1;
			margin: auto;
			width: 50%;
			padding: 16px;
			margin-top:100px;
			border-radius: 10px;
		}
		.login form h2{
			text-align: center;
			padding-bottom: 20px;
		}
		.login td{
			padding: 5px 0 5px 0;
			font-size: 20px;
		}
		.login input{
			padding: 5px 0 5px 0;
			width: 90%;
		}
		.login button{
			padding: 5px 0 5px 0;
			margin-top: 20px;
			margin-left: 40%; 
			width: 20%;
			background: lightgreen;
			border-radius: 3px;
			font-size: 17px;
		}
	</style>
</head>
<body>
	<?php require_once("layout/menu_ngang.php"); ?>
	<link rel="stylesheet" href="layout/content.css">
	<div class="container">
		<?php require_once("layout/danh_muc_san_pham.php"); ?>
		<div class="content">
			<div class="login">
				<div>
					<form method="POST" action="index.php?module=common&action=login">
						<h2 style="color: red;"> <?php echo $error; ?> </h2>
						<table width="100%">
							<tr>
								<td width="30%"><label>Nhập email :</label></td>
								<td><input type="email" name="email" placeholder="SĐT hoặc Email" required=""></td>
							</tr>
							<tr>
								<td><label>Nhập sdt:</label></td>
								<td><input type="password" name="pass" placeholder="Mật khẩu" required=""></td>
							</tr>
							<tr>
								<td colspan="2"><button name="btn" background-color: red; color: white; align: center; >Đăng nhập</button><br></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php require_once("layout/footer.php") ?>	
</body>
</html>