<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	*{
		padding: 0;
		margin: 0;
	}
	.content .div_tieu_de {
		padding: 10px 0 5px 0;
		margin: 0 3% 0 3%;
		border-bottom: 2px black solid;
	}
	.content .div_tieu_de .view_all {
		margin: 0 3% 5% 86%;
	}
	.content .div_product_type {
		height: 450px;
		width: 100%;
		margin-top: 10px;
		background: #F8F8F8;
	}
	.div_each_product i {
		font-size: 24px;
		padding-top: 20px;
	}
	.content .div_each_product {
		width: 23%;
		height: 400px;
		background: white;
		margin: 20px 0 10px 20px;
		float: left;
		text-align: center;
		border-radius: 10px;
	}

	.div_each_product img{
		margin: 10px 0 20px 0;
		border-radius: 5px;
		width: 245px; 
		height: 230px;
	}
	.content a {
		text-decoration: none;
		color: black;
		font-weight: bold;
	}
	.div_each_product a:hover {
		color: #A3CEF1;
	}
	.div_each_product .price{
		color: red;
		font-size: 18px;
		margin: 10px 0 10px 0;
	}
</style>
<?php
session_start();
require_once("layout/header.php");
require_once("layout/menu_ngang.php");
?>
<title>Trang chủ</title>
<link rel="shortcut icon" href="iconapp.ico">
<div class="container"  style="height: 2150px;">
	<?php require_once("layout/danh_muc_san_pham.php"); ?>
	<div class="content" style="background: white">

		<!-- Sách mới về -->
		<div class="div_tieu_de">
			<h1>Sách mới về</h1>
			<a class="view_all" href="index.php?module=products&action=view_all_follow_click&click=moi_ve">
				Xem tất cả &ensp;&#187;
			</a>
		</div>
		<div class="div_product_type">
			<?php 
			$sql = "SELECT id, name, description,price,amount,id_types,url FROM products ORDER BY(id) DESC limit 4";
			$result = mysqli_query($conn,$sql); 
			foreach ($result as $row ) { ?>
				<div class="div_each_product">
					<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>">
						<img width="100px"; height="100px" src="<?php echo $row['url'] ?>" alt="Đây là ảnh sản phẩm">
					</a>
					<h3><?php echo $row['name'] ?></h3>
					<p class="price">Giá bán: <?php echo number_format($row['price']) ?> VNĐ</p>
					<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>">
						Xem chi tiết
					</a> <br>
					<?php if(isset($_SESSION['customer']['id_customer'])) { ?>
						<a href="index.php?module=cart&action=add_product_on_cart&id_product=<?php echo $row['id']?> ">
							<i class="fa fa-shopping-cart"></i>
						</a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>

		<!-- Sách đang sale-->
		<div class="div_tieu_de">
			<h1>Sách đang sale</h1>
			<a class="view_all" href="index.php?module=products&action=view_all_follow_click&click=dang_sale">
				Xem tất cả &ensp;&#187;
			</a>
		</div>
		<div class="div_product_type">
			<?php 
			$sql = "SELECT id, name, description,price,amount,id_types,url FROM products ORDER BY(price) limit 4";
			$result = mysqli_query($conn,$sql); 
			foreach ($result as $row ) { ?>
				<div class="div_each_product">
					<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>">
						<img width="100px"; height="100px" src="<?php echo $row['url'] ?>" alt="Đây là ảnh sản phẩm">
					</a>
					<h3><?php echo $row['name'] ?></h3>
					<p class="price">Giá bán: <?php echo number_format($row['price']) ?> VNĐ</p>
					<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>">
						Xem chi tiết
					</a> <br>
					<?php if(isset($_SESSION['customer']['id_customer'])) { ?>
						<a href="index.php?module=cart&action=add_product_on_cart&id_product=<?php echo $row['id']?> ">
							<i class="fa fa-shopping-cart"></i>
						</a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>

		<!-- Sách bán chạy -->
		<div class="div_tieu_de">
			<h1>Sách bán chạy</h1>
			<a class="view_all" href="index.php?module=products&action=view_all_follow_click&click=ban_chay">
				Xem tất cả &ensp;&#187;
			</a>
		</div>
		<div class="div_product_type">
			<?php 
			$sql = "SELECT products.*, count(invoice_detail.id_product) as 'da_ban'
			from invoice_detail join products ON products.id = invoice_detail.id_product
			GROUP BY(invoice_detail.id_product) ORDER BY(da_ban) DESC limit 4";
			$result = mysqli_query($conn,$sql); 
			foreach ($result as $row ) { ?>
				<div class="div_each_product">
					<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>">
						<img width="100px"; height="100px" src="<?php echo $row['url'] ?>" alt="Đây là ảnh sản phẩm">
					</a>
					<h3><?php echo $row['name'] ?></h3>
					<p class="price">Giá bán: <?php echo number_format($row['price']) ?> VNĐ</p>
					<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>">
						Xem chi tiết
					</a>
					<p>Đã bán : <?php echo $row['da_ban'] ?> cuốn</p>
					<?php if(isset($_SESSION['customer']['id_customer'])) { ?>
						<a href="index.php?module=cart&action=add_product_on_cart&id_product=<?php echo $row['id']?> ">
							<i class="fa fa-shopping-cart"></i>
						</a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		<!-- Sách đắt nhất -->
		<div class="div_tieu_de">
			<h1>Sách đắt nhất</h1>
			<a class="view_all" href="index.php?module=products&action=view_all_follow_click&click=dat_nhat">
				Xem tất cả &ensp;&#187;
			</a>
		</div>
		<div class="div_product_type">
			<?php 
			$sql = "SELECT id, name, description,price,amount,id_types,url FROM products ORDER BY(price) DESC limit 4";
			$result = mysqli_query($conn,$sql); 
			foreach ($result as $row ) { ?>
				<div class="div_each_product">
					<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>">
						<img width="100px"; height="100px" src="<?php echo $row['url'] ?>" alt="Đây là ảnh sản phẩm">
					</a>
					<h3><?php echo $row['name'] ?></h3>
					<p class="price">Giá bán: <?php echo number_format($row['price']) ?> VNĐ</p>
					<a href="index.php?module=products&action=product_detail&ma_san_pham=<?php echo $row['id'] ?>">
						Xem chi tiết
					</a> <br>
					<?php if(isset($_SESSION['customer']['id_customer'])) { ?>
						<a href="index.php?module=cart&action=add_product_on_cart&id_product=<?php echo $row['id']?> ">
							<i class="fa fa-shopping-cart"></i>
						</a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php require_once("layout/footer.php"); ?>