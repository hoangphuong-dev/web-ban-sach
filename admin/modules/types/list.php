<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý loại sản phẩm</title>
	<style type="text/css" media="screen">
		.content a {
			text-decoration: none;
			color: lightgreen;
			font-size: 25px;
			font-weight: bold;
			margin-left: 50%;
		}
	</style>
</head>
<body>
	<?php 
	require_once 'layout/header.php';
	require_once 'layout/menu_ngang.php';
	$sql = "SELECT * FROM types";
	$result = mysqli_query($conn,$sql);
	?>
	<div class="content">
		<a href="index.php?module=types&action=insert">Thêm loại sản phẩm </a>
		<table border="1" width="100%">
			<tr>
				<th>Id</th>
				<th>Tên loại </th>
				<th>Sửa Xóa</th>
			</tr>
			<?php foreach ($result as $each) { ?>
				<tr>
					<td><?php echo $each['id_types'] ?></td>
					<td><?php echo $each['name'] ?></td>
					<td>
						<a href="index.php?module=types&action=edit&id_types=<?php echo $each['id_types'] ?>">Sửa</a>  <br><br> 
						<a href="index.php?module=types&action=delete&id_types=<?php echo $each['id_types'] ?>">Xoá</a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
	<?php require_once 'layout/footer.php'; ?>
</body>
</html>