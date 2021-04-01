<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa sản phẩm</title>
</head>
<body>
	<?php 
	require_once 'layout/header.php';
	require_once 'layout/menu_ngang.php';
	// code lấy thông tin loại sản phẩm
	$sql_type = "SELECT * from types";
	$result_type = mysqli_query($conn, $sql_type);
	// Code lấy thông tin sản phẩm
	$id = $_GET['id'];
	$sql_product = "SELECT * from products where id = '$id'";
	$result_product = mysqli_query($conn, $sql_product);
	$each = mysqli_fetch_array($result_product);
	?>
	<div class="content">
		<h2>Sửa thông tin sản phẩm</h2>
		<form method="POST" action="index.php?module=products&action=process_update">
			<table width="100%">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<tr>
					<td width="20%"><label>Tên sản phẩm</label></td>
					<td><input type="text" value="<?php echo $each['name'] ?>" name="name"></td>
				</tr>
				<tr>
					<td><label>Ảnh cũ</label></td>
					<td><img width="200" height="200" src="<?php echo $each['url'] ?>" alt=""></td>
				</tr>
				<tr>
					<td><label>Ảnh mới</label></td>
					<td><input type="text" value="<?php echo $each['url'] ?>" name="url"></td>
				</tr>
				<tr>
					<td><label>Giá tiền</label></td>
					<td><input type="text" value="<?php echo $each['price'] ?>" name="price"></td>
				</tr>
				<tr>
					<td><label>Số lượng</label></td>
					<td><input type="number" value="<?php echo $each['amount'] ?>" name="amount"></td>
				</tr>
				<tr>
					<td><label>Mô tả</label></td>
					<td><textarea style="height: 200px" name="description"><?php echo $each['description'] ?></textarea></td>
				</tr>
				<tr>
					<td><label>Loại sản phẩm</label></td>
					<td>
						<select name="id_types">
							<?php foreach ($result_type as $each_type) { ?>
								<option value="<?php echo $each_type['id_types'] ?>" <?php if($each['id_types'] == $each_type['id_types']) echo "selected";?>>
									<?php echo $each_type['name'] ?>
								</option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<button type="submit">Sửa sản phẩm</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<?php require_once 'layout/footer.php'; ?>
</body>
</html>