<?php session_start(); ?>
<title>Quản lý sản phẩm</title>
<style type="text/css" media="screen">
	.content a {
		text-decoration: none;
		color: lightgreen;
		font-size: 25px;
		font-weight: bold;
	}
</style>
<?php 
require_once 'layout/header.php';
require_once 'layout/menu_ngang.php';
$sql = "select products.*, types.name as 'name_type' from products join types on products.id_types = types.id_types ORDER BY products.id DESC;";
$result = mysqli_query($conn, $sql);
?>
<div class="content">
	<a href="index.php?module=products&action=insert">Thêm sản phẩm </a>

	<table border="1" width="100%">
		<tr>
			<th>Mã sản phẩm</th>
			<th>Tên sản phẩm </th>
			<th>Ảnh</th>
			<th>Giá tiền</th>
			<th>Số lượng</th>
			<th>Mô tả</th>
			<th>Loại sản phẩm</th>
			<th colspan="2">Hành động</th>
		</tr>
		<?php foreach ($result as $each) { ?>
			<tr>
				<td><?php echo $each['id'] ?></td>
				<td><?php echo $each['name'] ?></td>
				<td><img width="100" height="100" src="<?php echo $each['url'] ?>" alt="Đây là ảnh sản phẩm"></td>
				<td><?php echo $each['price'] ?></td>
				<td><?php echo $each['amount'] ?></td>
				<td><?php echo $each['description'] ?></td>
				<td><?php echo $each['name_type'] ?></td>
				<td>
					<a href="index.php?module=products&action=edit&id=<?php echo $each['id'] ?>">Sửa</a>  <br><br> 
					<a href="index.php?module=products&action=delete&id=<?php echo $each['id'] ?>">Xoá</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>
<?php require_once 'layout/footer.php'; ?>
