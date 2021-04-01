<style type="text/css" media="screen">
	*{
		padding: 0px;
		margin: 0px;
		box-sizing:border-box;
	}
	.div_header {
		width: 100%;
		height: 100px;
		background: #A3CEF1;
	}
	.content {
		width: 100%;
		height: auto;
		/* background: red; */
		padding: 20px 5% 20px 5%;
	}
	.div_header img {
		margin: 10px 0 0 5%;
	}
	.div_header span {
		margin: 0 0 0 50%;
		font-size: 20px;
	}
	.div_header a {
		margin: 40px 5% 0 0;
		text-decoration: none;
		color: black;
		font-weight: bold;
	}
	/* CSS cho insert */
	
	.content {

	}
	.content h2 {
		text-align: center;
		margin:  10px 0 10px 0; 
	}
	.content form {
		background: #A3CEF1;
		width: 80%;
		margin: auto;
		padding: 20px;
		border-radius: 10px;
	}
	.content form input,
	.content form textarea,
	.content form select
	{
		width: 80%;
		padding: 10px;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.content form button {
		width: 20%;
		padding: 10px;
		margin-top: 10px;
		margin-bottom: 10px;
		background: lightgreen;
		border-radius: 5px;
		cursor: pointer;
		font-size: 17px;
	}
</style>

<div class="div_header">
	<img width="100" height="80" src="../public/images/logo.png" alt="Đây là logo">
	<?php if(isset($_SESSION['admin'])) { ?>
		<span><?php echo $_SESSION['admin']['name'] ?></span>
	<?php } ?>
	<a style="float:right" href="index.php?module=common&action=logout">Đăng xuất</a>
</div>