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
/* 	.div_header img {
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
		} */
		/* CSS cho insert */

		.content {

		}
		.content h2 {
			text-align: center;
			margin:  10px 0 10px 0; 
		}
/* 	.content form {
		background: #A3CEF1;
		width: 80%;
		margin: auto;
		padding: 20px;
		border-radius: 10px;
		} */
/* 	.content form input,
	.content form textarea,
	.content form select
	{
		width: 80%;
		padding: 10px;
		margin-top: 10px;
		margin-bottom: 10px;
		} */
	/* .content form button {
		width: 20%;
		padding: 10px;
		margin-top: 10px;
		margin-bottom: 10px;
		background: lightgreen;
		border-radius: 5px;
		cursor: pointer;
		font-size: 17px;
		} */
		.image,.search,.infor {
			float: left;
		}
		.image {
			width: 15%;
			padding: 10px;
		}
		.search {
			width: 72%;
			padding-top: 40px;
		}
		.infor {
			width: 10%;
			padding-top: 10px;
		}
		.infor img {
			
		}
		.search input:first-child {
			width: 60%;
		}
		.search input {
			margin-left: 40px;
			height: 35px;
			border-radius: 3px;
			border: 1px solid black;
		}
		.img {
			border-radius: 50%;
			width: 50px;
			height: 50px;
			margin-bottom: 10px;
		}
		.tooltip {
			position: relative;
			display: inline-block;
		}
		.tooltiptext {
			visibility: hidden;
			width: 150px;
			background-color: red;
			text-align: center;
			border-radius: 6px;
			position: absolute;
			z-index: 1;
		}
		.tooltip:hover .tooltiptext {
			visibility: visible;
		}
	</style>
	<link rel="shortcut icon" href="../images/iconapp.ico">
	<div class="div_header">
		<div class="image" style="">
			<a href="?module=products&action=list"><img width="150" height="80" src="../images/logo.jpg" alt="Đây là logo"></a>
		</div>
		<div class="search">
			<form action="#">
				<input type="search" placeholder="Bạn cần tìm kiếm gì ?">
				<select name="" id="">
					<option value="">Admin</option>
					<option value="">Admin</option>
					<option value="">Admin</option>
					<option value="">Admin</option>
				</select>
				<input type="submit" value="Tìm kiếm">
			</form>
		</div>

		<div class="infor">
			<?php if(isset($_SESSION['admin'])) { ?>
				<img class="img" src="../images/logo_user.jpg"> <br>
				<div class="tooltip">
					<b><?php echo $_SESSION['admin']['name'] ?></b>
					<div class="tooltiptext">
						<ul style="list-style-type: none">
							<li><a href="index.php?module=common&action=logout">Đăng xuất</a></li> <br>
							<li><a href="index.php?module=common&action=logout">Đăng xuất</a></li>
						</ul>
					</div>
				</div>
			<?php } ?>
			
		</div>

	</div>
	<script>

	</script>