<?php 
$name = $_POST['name'];
$sql_checkname = "select name from types where name = '$name'";
$result = mysqli_query($conn, $sql_checkname);
$count = mysqli_num_rows($result);
if($count == 0) { // chưa có tên loại sản phẩm này trong ĐB
	$sql_insert = "INSERT INTO types(name) VALUES ('$name')";
	mysqli_query($conn, $sql_insert);
	header("location:index.php?module=types&action=list");
	exit();
} else {
	header("location:index.php?module=types&action=insert&error=* Tên này đã tồn tại !");
	exit();
}