<?php
session_start();
if(empty($_SESSION['customer']['id_customer'])) header("location:index.php?module=common&action=login");
require_once("layout/header.php");
require_once("layout/menu_ngang.php");
$tong_tien = 0;
$id_customer = $_SESSION['customer']['id_customer'];
$sql = "select * from customer where id_customer =  $id_customer";
$result = mysqli_query($conn, $sql);
$each_customer = mysqli_fetch_array($result);
?>
<title>Xem giỏ hàng</title>
<style type="text/css" media="screen">
	.cart {
		width: 90%;
		margin: auto;
	}
	.cart th {
		padding-top: 20px;
		padding-bottom: 40px;
		border-bottom: 1px solid black;
	}
	.cart td {
		padding-bottom: 30px;
		text-align: center;
		border-bottom: 1px solid black;
	}
	.content form {
		background: #A3CEF1;
		width: 50%;
		margin: 30px 23%;
		border-radius: 10px;
	}
	.content form td {
		font-size: 19px;
	}
	.content form th {
		font-size: 25px;
		padding: 20px;
	}
	.content form input,
	.content form button {
		width: 100%;
		padding: 5px;
		border-radius: 5px;
		margin-bottom: 20px;
		border: 1px solid #F9B234;
		font-size: 16px;
	}
	.content form button {
		width: 25%;
		background: lightgreen;
		margin-left: 40%;
	}
</style>
<div class="container">
	<?php require_once("layout/danh_muc_san_pham.php"); ?>
	<div class="content" style="height: auto;">
		<?php if(!empty($_SESSION['cart'])) { ?>
		<table class="cart">
			<tr>
				<th>Ảnh sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Tổng tiền</th>
				<th>Xoá sản phẩm</th>
			</tr>
			<?php foreach ($_SESSION['cart'] as $id_product => $amount) { ?>
				<?php 
				$sql = "select * from products where id = '$id_product'";
				$result = mysqli_query($conn, $sql);
				$each = mysqli_fetch_array($result);

				?>
				<tr>
					<td><img width="150" height="150" src="<?php echo $each['url'] ?>" alt="Đây là ảnh sản phẩm"></td>
					<td><?php echo $each['name'] ?></td>
					<td><?php echo $each['price'] ?></td>
					<td>
						<a href="index.php?module=cart&action=update_amount&id_product=<?php echo $id_product?>&type=sub">-</a>
						<?php echo $amount ?>
						<a href="index.php?module=cart&action=update_amount&id_product=<?php echo $id_product?>&type=add">+</a>
					</td>
					<td>
						<?php echo $each['price'] * $amount;
						$tong_tien +=  $each['price'] * $amount;
						?>VNĐ
					</td>
					<td><a href="index.php?module=cart&action=delete_product&id_product=<?php echo $id_product ?>">Xoá</a></td>
				</tr>
			<?php } ?>
			<tr>
				<td colspan="6">Tổng tiền : <?php echo $tong_tien ?>VNĐ</td>
			</tr>
		</table>

		<form action="index.php?module=cart&action=process_order" method="POST">
			<table width="90%">
				<tr><th>Thông tin người nhận</th></tr>
				<tr><td>Họ tên :</td></tr>
				<tr><td><input type="text" name="recipient_name" value="<?php echo $each_customer['name'] ?>"></td></tr>
				<tr><td>Số điện thoại :</td></tr>
				<tr><td><input type="text" name="recipient_phone" value="<?php echo $each_customer['phone_no'] ?>"></td></tr>
				<tr><td>Địa chỉ :</td></tr>
				<tr><td><input type="text" name="recipient_address" value="<?php echo $each_customer['address'] ?>"></td></tr>
				<tr><td><button type="submit">Đặt hàng</button></td></tr>
			</table>
		</form>
	<?php } else { ?>
		<h1 align="center">Không có sản phẩm nào trong giỏ hàng</h1>
		<h2><a href="index.php?module=home&action=home">Tiếp tục mua hàng</a></h2>
	<?php } ?>
	</div>
</div>