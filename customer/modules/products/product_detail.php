<?php session_start() ?>
<style type="text/css" media="screen">
	.div_anh,
	.div_thong_tin {
		width: 45%;
		height: 700px;
		float: left;
		padding: 20px;
	}
	.div_anh img {
		width: 550px;
		height: 500px;
		border-radius: 10px;
	}
	.div_thong_tin {
		font-size: 20px;
		line-height: 1.6;
	}
</style>
<?php
require_once("layout/header.php");
require_once("layout/menu_ngang.php");
$ma_san_pham = $_GET['ma_san_pham'];
// code kiểm tra sản phẩm có trong ĐB không 
$sql_check_id = "select id from products where id = $ma_san_pham";
$result_check = mysqli_query($conn, $sql_check_id);
$count = mysqli_num_rows($result_check);
if($count == 0) echo " <script type='text/javascript'> alert('Không có sản phẩm này !'); window.history.back();</script>";
// code in ra thông tin chi tiết sản phẩm
$sql_detail_product = "select products.*, types.name as 'name_type' 
from products join types on types.id_types = products.id_types 
where products.id = '$ma_san_pham'";
$result_detail_product = mysqli_query($conn, $sql_detail_product);
$each_detail_product = mysqli_fetch_array($result_detail_product);
?>


<title>Chi tiết sản phẩm</title>
<div class="container">
	<?php require_once("layout/danh_muc_san_pham.php"); ?>
	<div class="content">
		<div class="div_anh">

			<img src="<?php echo $each_detail_product['url'] ?>" alt="Đây là ảnh chi tiết sản phẩm">
		</div>
		<div class="div_thong_tin">
			<h1 align="center"><?php echo $each_detail_product['name'] ?></h1>
			<p class="price">Giá bán: 
				<span style="color: red"><?php echo number_format( $each_detail_product['price'])?> VNĐ</span>
			</p>
			<a href="#">Thêm vào giỏ hàng<i class="fa fa-shopping-cart"></i></a>
			<p>Thể loại sách : <?php echo $each_detail_product['name_type'] ?></p>
			<p>Tình trạng : Còn <?php echo $each_detail_product['amount'] ?> cuốn</p>
			<p>THÔNG TIN CHI TIẾT :</p>
			<p> <?php echo $each_detail_product['description'] ?></p>
		</div>

	</div>
</div>
<?php require_once("layout/footer.php"); ?>