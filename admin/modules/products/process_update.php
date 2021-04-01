<?php 
$id = $_POST['id'];
$name = $_POST['name'];
$url = $_POST['url'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$id_types = $_POST['id_types'];
$sql_update = "UPDATE products 
SET id= '$id',
name= '$name', 
description= '$description', 
price= '$price', 
amount= '$amount', 
id_types= '$id_types', 
url= '$url'
WHERE id = '$id'";
mysqli_query($conn, $sql_update);

header("location:index.php?module=products&action=list");
