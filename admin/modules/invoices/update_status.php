<?php
$id_invoice = $_GET['id_invoices'];
$status = $_GET['status'];

$sql_check_status = "select statuss from invoice where id_invoice = $id_invoice";
$result_check_status = mysqli_query($conn, $sql_check_status);
$each = mysqli_fetch_array($result_check_status);

if($each['statuss'] == 1) {
	$sql = "update invoice set statuss = $status where id_invoice = $id_invoice";
	mysqli_query($conn, $sql);
	header("location: index.php?module=invoices&action=list");
}
else echo "<script> alert('Thao tác không hợp lệ !');</script>";