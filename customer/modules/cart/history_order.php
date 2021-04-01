<?php
session_start();
if(empty($_SESSION['customer']['id_customer'])) header("location:index.php?module=common&action=login");
$id_customer = $_SESSION['customer']['id_customer'];
require_once("layout/header.php");
require_once("layout/menu_ngang.php");

$sql = "SELECT * from invoice where id_customer = '$id_customer'";
$result = mysqli_query($conn, $sql);
?>
<title>Lịch sử mua hàng</title>
<div class="container">
	<?php require_once("layout/danh_muc_san_pham.php"); ?>
	<div class="content" style="height: auto">
		<table border="1" width="100%">
			<tr>
				<th>Thời gian đặt</th>
				<th>Tình trạng</th>
				<th>Thông tin người nhận</th>
				<th>Xem chi tiết</th>
			</tr>
			<?php foreach ($result as $each) {?>
				<tr>
					<td><?php echo $each['date_created'] ?></td>
					<td>
						<?php 
						if($each['statuss'] == 1) echo "Đang chờ duyệt";
						elseif($each['statuss'] == 2) echo "Đã duyệt";
						elseif($each['statuss'] == 0) echo "Đã huỷ";
						?>
					</td>
					<td>
						<?php echo $each['recipient_name'] ?> <br>
						<?php echo $each['recipient_phone'] ?> <br>
						<?php echo $each['recipient_address'] ?> <br>
					</td>
					<td>
						<a href="index.php?module=cart&action=view_detail_invoice&id_invoice=<?php echo $each['id_invoice'] ?>">Xem chi tiết</a>
						
					</td>
				</tr>
			<?php } ?>
		</table>


	</div>
</div>