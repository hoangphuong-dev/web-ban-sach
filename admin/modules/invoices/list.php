<?php 
session_start();
require_once 'layout/header.php';
require_once 'layout/menu_ngang.php';
$sql = "SELECT invoice.*, customer.name, customer.phone_no, customer.address from invoice 
join customer on invoice.id_customer = customer.id_customer";
$result = mysqli_query($conn, $sql);
?>
<title>Quản lý sản phẩm</title>
<div class="content"> 
	<table border="1" width="100%">
		<tr>
			<th>Thời gian đặt</th>
			<th>Tình trạng</th>
			<th>Thông tin người nhận</th>
			<th>Thông tin người đặt</th>
			<th>Sửa tình trạng</th>
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
					<?php echo $each['name'] ?> <br>
					<?php echo $each['phone_no'] ?> <br>
					<?php echo $each['address'] ?> <br>
				</td>
				<td>
					<?php if($each['statuss'] == 1) { ?>
						<a href="index.php?module=invoices&action=update_status&id_invoices=<?php echo $each['id_invoice']?>&status=2">Duyệt</a> <br><br>
						<a href="index.php?module=invoices&action=update_status&id_invoices=<?php echo $each['id_invoice']?>&status=0">Huỷ</a>
					<?php } ?>
				</td>
				<td>
					<a href="index.php?module=invoices&action=view_detail&id_invoices=<?php echo $each['id_invoice'] ?>">Xem chi tiết</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>
<?php require_once 'layout/footer.php'; ?>