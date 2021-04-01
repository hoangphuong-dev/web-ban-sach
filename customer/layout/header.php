<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	*{
		padding: 0;
		margin: 0;
	}
	.header{
		width: 100%;
		text-align: center;
		background: #A3CEF1;
		height: 120px;
		padding: 20px;
	}
	.header .div_img{
		width: 20%;
		float: left;
	}
	.header .div_form{
		padding-top: 30px;
		width: 50%;
		float: left;
	}
	.header .div_form input {
		width: 70%;
		padding: 10px;
		border-radius: 5px;
		border: 2px black solid;
	}
	.header .div_form button {
		padding: 10px;
		border-radius: 5px;
	}
	.header .div_gio_hang {
		padding-top: 45px;
		width: 25%;
		float: left;
	}
	.header .div_gio_hang a {
		text-decoration: none;
		color: black;
		padding-left: 10px;
		font-size: 20px;
		font-weight: bold;
	}
	.header .div_gio_hang a:hover {
		color: red;
	}
</style>

<div class="header">
	<div style="float: none; margin: auto; width: 95%; padding-top: 20px;">
		<div class="div_img"><a href="index.php?module=home&action=home"><img width="100px" height="100px" src="../public/images/logo.png" alt="Đây là ảnh header"></a></div>
		<div class="div_form">
			<form action="index.php">
				<input type="hidden" name="module" value="products">
				<input type="hidden" name="action" value="list-products">
				<input type="search" name="search" placeholder="Tìm tên sách, loại sách..">
				<button type="submit">Tìm kiếm</button>
			</form>
		</div>
		<div class="div_gio_hang">
			<a href="index.php?module=cart&action=view_cart" style="float: right"> <i class="fa fa-shopping-cart"> </i> Giỏ hàng</a>
			<span>
				<?php 
				if (isset($_SESSION['customer'])) {
					echo "<span style='margin-right: 8px'>".$_SESSION['customer']['name']."</span>";
					echo "<a href='index.php?module=common&action=logout'>Đăng xuất </a>";
				}
				else{
					echo "<a style='margin-right: 8px' href='index.php?module=common&action=login'> Đăng nhập </a> ";
					echo "<a style='margin-right: 8px' href='index.php?module=common&action=register'> Đăng ký </a> ";
				}
				?>
			</span>
		</div>
	</div>
</div>