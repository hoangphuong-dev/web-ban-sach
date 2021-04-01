<?php
session_start();
require_once("layout/header.php");
require_once("layout/menu_ngang.php");
if(!empty($_GET['click'])) {
	$click = $_GET['click'];
		// không có id danh mục => in ra tất cả theo yêu cầu mà người dùng click
	if($click == 'moi_ve') {
		$tieu_de = "mới về";
		$sql = "SELECT id, name, description,price,amount,id_types,url FROM products ORDER BY(id) DESC limit 12";
		$result = mysqli_query($conn,$sql);
	}
	if($click == 'dang_sale') {
		$tieu_de = "đang sale";
		$sql = "SELECT id, name, description,price,amount,id_types,url FROM products ORDER BY(price) limit 10";
		$result = mysqli_query($conn,$sql);
	}
	if($click == 'ban_chay') {
		$tieu_de = "bán chạy";
		$sql = "SELECT products.*, count(invoice_detail.id_product) as 'da_ban'
			from invoice_detail join products ON products.id = invoice_detail.id_product
			GROUP BY(invoice_detail.id_product) ORDER BY(da_ban) DESC limit 11";
		$result = mysqli_query($conn,$sql);
	}
	if($click == 'dat_nhat') {
		$tieu_de = "đắt nhất";
		$sql = "SELECT id, name, description,price,amount,id_types,url FROM products ORDER BY(price) DESC limit 9";
		$result = mysqli_query($conn,$sql);
	}
} else header("location:index.php?module=home&action=home");

$tong_so_san_pham = mysqli_num_rows($result);
// // khi limit rồi thì không cần phân trang 
// if($tong_so_san_pham == 0) require_once('dang_cap_nhat.php');
// $so_san_pham_1_trang = 8;
// $tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_1_trang);
// $trang_hien_tai = 1;
// if(isset($_GET['trang'])) $trang_hien_tai = $_GET['trang'];
// $so_san_pham_can_bo_qua = ($trang_hien_tai - 1) * $so_san_pham_1_trang;
// $sql = "$sql
// limit $so_san_pham_1_trang offset $so_san_pham_can_bo_qua";
// $result = mysqli_query($conn,$sql);
?>

<!-- code HTML  -->
<title>Tất cả sản phẩm</title>
<link rel="stylesheet" href="modules/products/list_product.css">
<div class="container" style="height: 1500px;">
	<?php require_once("layout/danh_muc_san_pham.php"); ?>
	<div class="content" style="height: auto;">
		<h2 style="text-align: center; margin: 10px 0 20px 0;">Có tất cả <?php echo $tong_so_san_pham ?> sản phẩm <?php echo $tieu_de ?></h2>
		<?php foreach ($result as $row ) { ?>
			<div class="div_each_product">
				<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>">
					<img src="<?php echo $row['url'] ?>" alt="Đây là ảnh sản phẩm">
				</a>
				<h3><?php echo $row['name'] ?></h3>
				<p class="price">Giá bán: <?php echo number_format( $row['price'] )?> VNĐ</p>
				<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>">Xem chi tiết</a> <br>
				<?php if(isset($_SESSION['customer']['id_customer'])) { ?>
					<a href="index.php?module=cart&action=add_product_on_cart&id_product=<?php echo $row['id']?> "><i class="fa fa-shopping-cart"></i></a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>
<?php require_once("layout/footer.php"); ?>