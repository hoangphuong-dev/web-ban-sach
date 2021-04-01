<?php 
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE id = '$id'";
mysqli_query($conn, $sql);
echo "
<script type='text/javascript'>
confirm('Bạn chắc chắn muốn xoá sản phẩm này !');
window.history.back();
</script>";