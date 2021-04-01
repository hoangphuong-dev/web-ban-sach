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
	$sql_type = "SELECT * from types";
	$result = mysqli_query($conn, $sql_type);
	?>
	<div class="content">
		<h2>Nhập thông tin sản phẩm</h2>
		<form method="POST" action="index.php?module=products&action=process_insert">
			<table width="100%">
				<tr>
					<td width="20%"><label>Tên sản phẩm</label></td>
					<td><input type="text" placeholder="Nhập tên sản phẩm .." name="name"></td>
				</tr>
				<tr>
					<td><label>Ảnh</label></td>
					<td><input type="text" placeholder="Nhập link ảnh sản phẩm .." name="url"></td>
				</tr>
				<tr>
					<td><label>Giá tiền</label></td>
					<td><input type="text" placeholder="Nhập giá tiền .." name="price"></td>
				</tr>
				<tr>
					<td><label>Số lượng</label></td>
					<td><input type="number" placeholder="Nhập số lượng .." name="amount"></td>
				</tr>
				<tr>
					<td><label>Mô tả</label></td>
					<td><textarea style="height: 200px" name="description"></textarea></td>
				</tr>
				<tr>
					<td><label>Loại sản phẩm</label></td>
					<td>
						<select name="id_types">
							<?php foreach ($result as $each) { ?>
								<option value="<?php echo $each['id_types'] ?>" ><?php echo $each['name'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<button type="submit">Thêm sản phẩm</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<?php require_once 'layout/footer.php'; ?>
</body>
</html>