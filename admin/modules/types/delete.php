<?php 
$id_types = $_GET['id_types'];
$sql_check_id_types = "SELECT id_types from products WHERE id_types = $id_types";
$result = mysqli_query($conn, $sql_check_id_types);
$count = mysqli_num_rows($result);
if($count == 0) {
	$sql = "DELETE FROM types WHERE id_types = '$id_types'";
	mysqli_query($conn, $sql);
	echo "
	<script type='text/javascript'>
	confirm('Bạn chắc chắn muốn xoá loại sản phẩm này !');
	window.history.back();
	</script>";
}
else echo "<script> alert('Không thể xoá loại sản phẩm này !'); window.history.back(); </script> ";

