<?php
session_start();
session_destroy(); // Xóa session hiện tại
header("Location: home.php"); // Chuyển hướng người dùng đến trang đăng nhập sau khi đăng xuất
exit;
?>
