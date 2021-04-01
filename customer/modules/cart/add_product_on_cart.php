<?php 
session_start();
$id_product = $_GET['id_product'];
// code kiểm tra có sản phẩm trong ĐB không 
$sql = "select id from products where id = $id_product";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count == 0) { // không có sản phẩm này trong ĐB
	echo " <script type='text/javascript'> alert('Không có sản phẩm này !'); </script>";
} else { // có --> thực hiện thao tác thêm 
	if(isset($_SESSION['cart'][$id_product])) {
		$_SESSION['cart'][$id_product]++;
	} else {
		$_SESSION['cart'][$id_product] = 1;
	}
// print_r($_SESSION);
	echo "
	<script type='text/javascript'>
	alert('Đã thêm vào giỏ hàng !');
	window.history.back();
	</script>";
}