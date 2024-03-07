<?php
session_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = "";
}
$connect = new mysqli("localhost", "root", "", "nienluan");

if (isset($_POST['muangay'])) {
  $idusrr = $_POST['idusr'];
  $tensp = $_POST['nameproduct'];
  $giasp = $_POST['priceproduct'];
  $img = $_POST['imgproduct'];
  $spid = $_POST['idproduct'];
  $slsp = $_POST['slsp'];
  $mui = $_POST['fav_language'];
  $sql_asd = mysqli_query($connect, "SELECT * FROM `cart` WHERE `idsp` = '$spid' and `idusrs` = '$user_id'");
  $count = mysqli_num_rows($sql_asd);
  // echo $count;
  if ($count > 0) {
    $row_sanpham = mysqli_fetch_array($sql_asd);
    $slsp = $row_sanpham['slsp'] + 1;
    $sql_zxc = "UPDATE `cart` SET slsp = '$slsp' WHERE `idsp` = '$spid' and idusrs = '$user_id' ";
  } else {
    $slsp = $slsp;
    $sql_zxc = "INSERT INTO `cart`(`tensp`, `giasp`, `imgsp`, `idsp`, `slsp`,`muivi`, `idusrs`  ) VALUES ('$tensp','$giasp','$img','$spid','$slsp','$mui','$idusrr')";

  }
  $insert = mysqli_query($connect, $sql_zxc);
  header("Location: cart.php");
}


if (isset($_POST['addcart'])) {
  $tensp = $_POST['nameproduct'];
  $giasp = $_POST['priceproduct'];
  $img = $_POST['imgproduct'];
  $spid = $_POST['idproduct'];
  $slsp = $_POST['slsp'];
  $idusrr = $_POST['idusr'];
  $mui = isset($_POST['fav_language']) ? $_POST['fav_language'] : null;
  $current_url = $_POST['curent'];

  $sql_asd = mysqli_query($connect, "SELECT * FROM `cart` WHERE `idsp` = '$spid' and `imgsp` = '$img' and `idusrs` = '$user_id' ");
  $count = mysqli_num_rows($sql_asd);
  // echo $count;
  if ($count > 0) {
    $row_sanpham = mysqli_fetch_array($sql_asd);
    $slsp = $row_sanpham['slsp'] + 1;
    $sql_zxc = "UPDATE `cart` SET slsp = '$slsp' WHERE `idsp` = '$spid' and idusrs = '$user_id'";
  } else {
    $slsp = $slsp;
    $sql_zxc = "INSERT INTO `cart`(`tensp`, `giasp`, `imgsp`, `idsp`, `slsp`,`muivi`, `idusrs`) VALUES ('$tensp','$giasp','$img','$spid','$slsp','$mui','$idusrr' )";
  }
  $insert = mysqli_query($connect, $sql_zxc);
  // echo $current_url;
  header("Location: $current_url");
  exit;
}

?>