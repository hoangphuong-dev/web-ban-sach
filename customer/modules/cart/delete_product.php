<?php 
$id_product = $_GET['id_product'];
session_start();
unset($_SESSION['cart'][$id_product]);
header("location:index.php?module=cart&action=view_cart");