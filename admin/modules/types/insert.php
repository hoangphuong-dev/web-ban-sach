<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm sản phẩm</title>
</head>
<body>
	<?php 
	require_once 'layout/header.php';
	require_once 'layout/menu_ngang.php';
	?>
	<div class="content" style="height: 500px;">
		<h2>Nhập thông tin</h2>
		<form method="POST" action="index.php?module=types&action=process_insert">
			<table width="100%">
				<tr>
					<td width="20%"><label>Tên loại sản phẩm</label></td>
					<td><input type="text" placeholder="Nhập tên loại sản phẩm .." name="name"></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<button type="submit">Thêm loại sản phẩm</button>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<span style="color: red;font-size: 20px;"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></span>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<?php require_once 'layout/footer.php'; ?>
</body>
</html>