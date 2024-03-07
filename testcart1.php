<?php

$connect = new mysqli("localhost", "root","","nl");

if(isset($_POST['xoa'])){
  $xoa = $_POST['tensp'];
  $sql_xoa = mysqli_query($connect, "DELETE FROM `cart` WHERE `ID_cart` = '$xoa' " );
  header('Location: cart.php');

}
?>