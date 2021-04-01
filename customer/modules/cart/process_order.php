<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
$recipient_name = $_POST['recipient_name'];
$recipient_phone = $_POST['recipient_phone'];
$recipient_address = $_POST['recipient_address'];

session_start();
$id_customer = $_SESSION['customer']['id_customer'];
$statuss = 1; // Đang chờ duyệt
$date_created = date("Y-m-d H:i:s");

$sql = "INSERT INTO invoice(id_customer, date_created, recipient_name, recipient_address, recipient_phone, statuss) VALUES ('$id_customer', '$date_created', '$recipient_name', '$recipient_address', '$recipient_phone', '$statuss')";
mysqli_query($conn, $sql);

// mã hoá đơn là tự động tăng nên sẽ lấy mã hoá đơn là mã lớn nhất 
$sql_id_invoice = "select max(id_invoice) from invoice";
$result_id_invoice = mysqli_query($conn, $sql_id_invoice);
$each = mysqli_fetch_array($result_id_invoice);

$id_invoice = $each['max(id_invoice)'];
foreach ($_SESSION['cart'] as $id_product => $amount) {
	$sql_price = "select price from products";
	$result_price = mysqli_query($conn, $sql_price);
	$each_price = mysqli_fetch_array($result_price);

	 $price = $each_price['price'];
	$sql = "INSERT INTO invoice_detail(id_invoice, id_product, price, amount) VALUES ('$id_invoice', '$id_product', '$price', '$amount')";
	mysqli_query($conn, $sql);
}

unset($_SESSION['cart']);

header("location: index.php?module=home&action=home");
