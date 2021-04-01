<?php 
$id_types = $_POST['id_types'];
$name = $_POST['name'];
$sql_checkname = "select name from types where name = '$name'";
$result = mysqli_query($conn, $sql_checkname);
$count = mysqli_num_rows($result);
if($count == 0) { // chưa có loại sản phẩm này trong ĐB
	$sql_update = "UPDATE types SET name= '$name', WHERE id_types = '$id_types'";
	mysqli_query($conn, $sql_update);
	header("location:index.php?module=types&action=list");
	exit();
} else {
	header("location:index.php?module=types&action=process_insert&error=* Loại sản phẩm này đã tồn tại !");
}


