<?php 
$conn=mysqli_connect("localhost","root","","bkd05k11");
$sql_danh_muc = "select * from types";
$result_danh_muc = mysqli_query($conn, $sql_danh_muc);
?>
<link rel="stylesheet" href="layout/danh_muc_san_pham.css">

<div class="main-menu">
	<ul>
		<?php foreach ($result_danh_muc as $each) { ?>
			<li>
				<a href="index.php?module=products&action=list-products&id_types=<?php echo $each['id_types'] ?>"><!-- lấy id danh mục sản phẩm kèm link  -->
					<?php echo $each['name'] ?> <!-- tên danh mục-->
				</a>
			</li>
		<?php } ?>
	</ul>
</div>
