<?php
session_start();
session_destroy();
// chuyen huong ve login
header("Location:index.php");
?>