<?php 
$name = $_POST['name'];
$url = $_POST['url'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$id_types = $_POST['id_types'];
$sql_insert = "INSERT INTO products(name, description, price, amount, id_types, url) VALUES ('$name', '$description', '$price', '$amount', '$id_types', '$url')";
mysqli_query($conn, $sql_insert);

header("location:index.php?module=products&action=list");