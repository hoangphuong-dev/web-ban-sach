<?php
session_start(); 
require_once("layout/header.php");
require_once("layout/menu_ngang.php");
?>
<title>Giới thiệu trang Web</title>
<style>
	.mota {
		width: 90%;
		margin: auto;
		padding: 30px;
	}
</style>
<div class="container">
	<?php require_once("layout/danh_muc_san_pham.php"); ?>
	<div class="content">
		<h1 align="center" style="margin-top:50px;">Chào mừng bạn đến với trang giới thiệu của bookshop</h1>
		<div class="mota">
			<p>Cùng với sự phát triển của nhân loại bước vào nền kinh tế tri thức, công nghệ ngày càng phát triển mạnh mẽ và đem lại cho loài người nhều thành công rực rỡ.Những kiến thức và ứng dụng của tri thức trong sách ngày càng đi sâu vào đời sống của con người trở thành một bộ phận không thể thiếu của thế giới văn minh. Mạng Internet  là một trong những sản phẩm có giá trị hết sức lớn lao và ngày càng trở nên một công cụ không thể thiếu. </p>
		</div>
	</div>
</div>
<?php require_once("layout/footer.php"); ?>