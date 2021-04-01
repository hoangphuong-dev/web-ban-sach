 <?php 
$module = $action = "";
if (isset($_GET['module'])) {
	$module = $_GET['module'];
}
if (isset($_GET['action'])) {
	$action =$_GET['action'];
}
// Mặc định khi module hoặc action rỗng --> chạy vào đăng nhập 
if ($module == "" || $action == "" )   {
	$module = "home";
	$action = "home";
}
// Trường hợp có module và action -> kiểm tra xem module và action có hợp lệ hay ko ?
$path = "modules/$module/$action.php";
if (file_exists($path)) {
	// Đường dẫn tồn tại
	require_once("config/connectDB.php");
	require_once($path);
	require_once("config/closeDB.php");
}
else{
	require_once("modules/common/404.php");
}

 ?>