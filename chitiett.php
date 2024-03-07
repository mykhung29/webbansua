<?php
session_start();
if (isset($_GET['tb'])) {
  $tb = $_GET['tb'];
}
if (isset($_GET['id'])) {
  $ID = $_GET['id'];
} else {
  $ID = '';
}
$connect = new mysqli("localhost", "root", "", "nienluan");
$tongmonhang = mysqli_query($connect, "SELECT COUNT(*) as total FROM cart");
if (mysqli_num_rows($tongmonhang) > 0) {
  $tong = mysqli_fetch_assoc($tongmonhang);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chi tiết
    <?php
    $query = "SELECT * FROM `$tb` WHERE `ID` = '" . $ID . "'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    echo $row['title'];
    ?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/Sanpham.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
  <style>
    /* CSS cho modal */
    .modal {
      display: none;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      position: fixed;
      background: rgba(0, 0, 0, 0.8);
      border-radius: 8px;
      width: 30%;
      height: 30%;
      padding: 20px;
      text-align: center;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
    }

    .modal i {
      font-size: 110px;
    }
  </style>

</head>

<body>
  <header>
    <?php
    if (isset($_SESSION['user_id'])) {
      // Session có tồn tại, bao gồm file A
      include('E:\NienLuan\headfoot\headeruser.php');
    } else {
      // Session không tồn tại, bao gồm file B
      include('E:\NienLuan\headfoot\header.php');
    }
    ?>
  </header>
  <main>
    <?php
    //tao ket noi
    $connect = new mysqli("localhost", "root", "", "nienluan");
    $query = "SELECT * FROM `$tb` WHERE `ID` = '" . $ID . "'";
    $result = mysqli_query($connect, $query);
    $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $muivi = mysqli_query($connect, "SELECT * FROM `smell`");
    $size = mysqli_query($connect, "SELECT * FROM `size`");
    while ($row = mysqli_fetch_array($result)) {
      $so1 = $row['price'];
      $format = number_format($so1, 0, '.', '.');
      echo ' <div class="row mainproduct">
  <div class="col">
    <div class="img-prd">
    <img
        src="img/imgproduct/' . $row['img'] . '"
        alt=""
      />
    </div>
  </div>
  <div class="col">
    <div class="in4-prd">
      <h3>' . $row['title'] . '</h3>
      <h4>' . $format . ' VND</h4>

    </div>


    <div class="buy order">
    <form action="xulicart.php" method="post">
        <input type="hidden" name="idusr" value="' . $user_id . '" />
        <input type="hidden" name="nameproduct" value="' . $row['title'] . '" />
        <input type="hidden" name="priceproduct" value="' . $row['price'] . '" />
        <input type="hidden" name="imgproduct" value="' . $row['img'] . '" />
        <input type="hidden" name="idproduct" value="' . $row['ID'] . '" />
        <input type="hidden" name="slsp" value="1" />
        <input type="hidden" name="curent" value="' . $current_url . '" />
        ';
    }


    echo '<div class="size-choose">
        <h5>Khối lượng: 15 LBS</h5>';
    while ($rowsize = mysqli_fetch_array($size)) {
      echo '
            <input type="radio" id="html" name="fav_language" value="' . $rowsize['size'] . '">
            <label for="html">' . $rowsize['size'] . '</label>    
          ';
    }
    echo '</div>';

    echo '<h5>Hương vị : </h5>';
    while ($rowsmell = mysqli_fetch_array($muivi)) {
      echo '
          <input type="radio" id="html1" name="fav_language" value="' . $rowsmell['smell'] . '">
          <label for="html1">' . $rowsmell['smell'] . '</label>
          ';
    }

    echo '
        <button type="submit" name ="muangay">Mua Ngay</button>
        <button type="submit" class="showModalBtn" name="addcart">Thêm vào giỏ</button>
            </form>
              </div>
            </div>
          </div>
                <div id="myModal" class="modal">
                <i class="bx bx-check-circle"></i>
                <h3>Đã thêm vào giỏ hàng.</h3>
          </div>';

    $query = "SELECT * FROM `$tb` WHERE `ID` = '" . $ID . "'";
    $result4 = mysqli_query($connect, $query);
    while ($row4 = mysqli_fetch_array($result4)) {
      echo '
            <div class="about-product">
              <div class="title-product"><h3>Về sản phẩm</h3></div>
              <span>' . $row4['vsp'] . '</span>
              <div class="title-product"><h3>Điểm mạnh sản phẩm</h3></div>
              <span>' . $row4['dmsp'] . '</span>
            </div>';
    }
    ;




    while ($rowsize = mysqli_fetch_array($size)) {
      echo '
          <input type="radio" id="html" name="fav_language" value="' . $rowsize['size'] . '">
          <label for="html">' . $rowsize['size'] . '</label>';
    }


    //dong ket noi
    $connect->close();
    ?>

  </main>
  <footer>
    <?php include 'E:\NienLuan\headfoot\footer.php' ?>

  </footer>
</body>
<script src="js/modal.js"></script>

</html>