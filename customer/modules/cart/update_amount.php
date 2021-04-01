<?php 
$id_product = $_GET['id_product'];
$type = $_GET['type'];
session_start();
if($type == 'sub') {
	if($_SESSION['cart'][$id_product] > 1) $_SESSION['cart'][$id_product]--;
	else unset($_SESSION['cart'][$id_product]);
}
if($_SESSION['cart'][$id_product] < 10 && $_SESSION['cart'][$id_product] >= 1 && $type == 'add') {
	$_SESSION['cart'][$id_product]++;
}
header("location:index.php?module=cart&action=view_cart");