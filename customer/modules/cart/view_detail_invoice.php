<?php
session_start(); 
require_once("layout/header.php");
require_once("layout/menu_ngang.php");


$id_invoice = $_GET['id_invoice'];
$sql = "SELECT invoice_detail.*, products.name, products.url from invoice_detail 
JOIN products on invoice_detail.id_product = products.id where id_invoice = $id_invoice";
$result = mysqli_query($conn, $sql);
?>
<title>Xem chi tiết hoá đơn</title>
<div class="container">
	<?php require_once("layout/danh_muc_san_pham.php"); ?>
	<div class="content">
		<table border="1" width="100%">
		<tr>
			<th>Tên sản phẩm</th>
			<th>Ảnh</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Tổng tiền</th>
		</tr>
		<?php foreach ($result as $each) { ?>
			<tr>
				<td><?php echo $each['name'] ?></td>
				<td><img width="150" height="150" src="<?php echo $each['url'] ?>"></td>
				<td><?php echo $each['price'] ?>VNĐ</td>
				<td><?php echo $each['amount'] ?></td>
				<td>
					<?php 
					$tong_tien_tat_ca = 0;
					$tong_tien = $each['price']*$each['amount'];
					$tong_tien_tat_ca += $tong_tien;
					echo $tong_tien;
					?>VNĐ
				</td>
			</tr>
		<?php } ?>
		<tr>
			<td align="center" colspan="5">
				Tổng tiền tất cả : <?php echo $tong_tien_tat_ca ?>
			</td>
		</tr>
	</table>
	</div>
</div>
<?php require_once("layout/footer.php"); ?>