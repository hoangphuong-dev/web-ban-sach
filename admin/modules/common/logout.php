<?php 
session_start();
session_destroy();
header("Location:index.php?module=common&action=login")
?>