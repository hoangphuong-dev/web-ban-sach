<?php
session_start();
require_once("layout/header.php");
require_once("layout/menu_ngang.php");
$search = '';
if(isset($_GET['search'])) $search = trim($_GET['search']);
if(!empty($_GET['id_types'])) {
	$id_types = $_GET['id_types'];
		// in ra sản phẩm theo danh mục sản phẩm 
	$sql = "select products.* FROM products join types on products.id_types = types.id_types
	WHERE products.id_types = $id_types";
	$result = mysqli_query($conn,$sql);
} else {
		// không có id danh mục => in ra tất cả
	$sql= "SELECT products.* FROM products WHERE name like '%$search%' ";
	$result = mysqli_query($conn,$sql);
}
$count_product = mysqli_num_rows($result);

$tong_so_san_pham = mysqli_num_rows($result);
	// if($tong_so_san_pham == 0) include('dang_cap_nhat.php');
$so_san_pham_1_trang = 16;
$tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_1_trang);
$trang_hien_tai = 1;
if(isset($_GET['trang'])) $trang_hien_tai = $_GET['trang'];
$so_san_pham_can_bo_qua = ($trang_hien_tai - 1) * $so_san_pham_1_trang;
$sql = "$sql
limit $so_san_pham_1_trang offset $so_san_pham_can_bo_qua";
$result = mysqli_query($conn,$sql);
?>

<!-- code HTML  -->
<title>Tất cả sản phẩm</title>
<link rel="stylesheet" href="modules/products/list_product.css">
<div class="container" style="height: 2030px;">
	<?php require_once("layout/danh_muc_san_pham.php"); ?>
	<div class="content" style="height: auto;">
		<h2 style="text-align: center; margin: 10px 0 20px 0;">Có tất cả <?php echo $count_product ?> sản phẩm</h2>
		<?php foreach ($result as $row ) { ?>
			<div class="div_each_product">
				<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>"><img src="<?php echo $row['url'] ?>" alt="Đây là ảnh sản phẩm"></a>
				<h3><?php echo $row['name'] ?></h3>
				<p class="price">Giá bán: <?php echo $row['price'] ?> VNĐ</p>
				<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>">Xem chi tiết</a> <br>
				<?php if(isset($_SESSION['customer']['id_customer'])) { ?>
					<a href="index.php?module=cart&action=add_product_on_cart&id_product=<?php echo $row['id']?> "><i class="fa fa-shopping-cart"></i></a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
	<div class="div_phan_trang">
		<?php for($i = 1; $i <= $tong_so_trang; $i++) { ?>
			<a <?php if($trang_hien_tai == $i) { ?> class="active" <?php } ?> href="index.php?module=products&action=list-products&trang=<?php echo $i ?><?php if(!empty($tim_kiem)){?>&tim_kiem=<?php echo $tim_kiem ?><?php } ?>">
				<?php echo $i ?>
			</a>
		<?php } ?>
	</div>
</div>
<?php require_once("layout/footer.php"); ?>