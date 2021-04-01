<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa loại sản phẩm</title>
</head>
<body>
	<?php 
	require_once 'layout/header.php';
	require_once 'layout/menu_ngang.php';
	// code lấy thông tin loại sản phẩm
	if(isset($_GET['id_types'])) $id_types = $_GET['id_types'];
	$sql_type = "SELECT * from types where id_types = '$id_types'";
	$result_type = mysqli_query($conn, $sql_type);
	$each = mysqli_fetch_array($result_type);
	?>
	<div class="content" style="height: 500px;">
		<h2>Sửa thông tin loại sản phẩm</h2>
		<form method="POST" action="index.php?module=types&action=process_update">
			<table width="100%">
				<input type="hidden" name="id_types" value="<?php echo $id_types ?>">
				<tr>
					<td width="20%"><label>Tên loại sản phẩm</label></td>
					<td><input type="text" readonly value="<?php echo $each['name'] ?>"></td>
				</tr>
				<tr>
					<td><label>Sửa thành : </label></td>
					<td><input type="text" placeholder="Nhập loại sản phẩm mới.." name="name"></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<button type="submit">Sửa loại sản phẩm</button>
					</td>
				</tr>
				<tr>
					<td>
						<span><?php if(isset($_GET['error'])) echo $_GET['error'];?></span>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<?php require_once 'layout/footer.php'; ?>
</body>
</html>