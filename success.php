<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = "";
}
$connect = new mysqli("localhost", "root", "", "nienluan");
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_POST['order'])) {
  $tenkhach = $_POST['fullname'];
  $sdtkhach = $_POST['sdt'];
  $adr0 = $_POST['province'];
  $adr1 = $_POST['district'];
  $adr2 = $_POST['wards'];
  $email = $_POST['email'];
  $ngay_gio_hien_tai = date('d-m-Y H:i:s');
}
$adr = $adr0 . " " . $adr1 . " " . $adr2;
$sql_cart = mysqli_query($connect, "SELECT * FROM `cart` where `idusrs`	= '$user_id' ");
while ($row = mysqli_fetch_array($sql_cart)) {
  $sql_order = mysqli_query(
    $connect,
    "INSERT INTO `order_khach`(`tenkhach`, `sdt`, `adr`, `email`, `tensp`, `imgsp`, `giasp`, `soluong`,`time`, `idsanpham`,`tinhtrang`,`idusrs` ) 
      VALUES  
      ('$tenkhach','$sdtkhach','$adr','$email','" . $row['tensp'] . "','" . $row['imgsp'] . "','" . $row['giasp'] . "','" . $row['slsp'] . "','$ngay_gio_hien_tai','" . $row['idsp'] . "','Đang xử lí','" . $row['idusrs'] . "')"
  );
}
$sql_delete = mysqli_query($connect, "DELETE FROM `cart`  where `idusrs`	= '$user_id'");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thông báo đặt hàng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/Sanpham.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/success.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
</head>

<body>
  <header>
    <?php
    include('E:\NienLuan\headfoot\headeruser.php');
    ?>
  </header>
  <main>
    <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
      <h2>Đặt hàng thành công</h2>
      <p>Cảm ơn quý khách<br /> Đã lựa chọn sản phẩm của chúng tôi</p>
      <a href="home.php">Tiếp tục mua sắm</a>
    </div>
  </main>
  <footer>
    <?php include 'E:\NienLuan\headfoot\footer.php' ?>
  </footer>
</body>

</html>