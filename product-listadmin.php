<?php
if (isset($_GET['tb'])) {
  $tb = $_GET['tb'];
}
if (isset($_GET['trang'])) {
  $page = $_GET['trang'];
} else {
  $page = '';
}
if ($page == '' || $page == 1) {
  $begin = 0;
} else {
  $begin = ($page * 8) - 8;
}
//tao ket noi
$connect = new mysqli("localhost", "root", "", "nienluan");
$query = "SELECT * FROM `$tb` ORDER BY title DESC LIMIT $begin, 8 ";
$result = mysqli_query($connect, $query);
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sản phẩm
    <?php echo $tb; ?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/Trangchu.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
</head>

<body>
  <header>
    <?php
    include 'E:\NienLuan\headfoot\hdad.php';
    ?>
  </header>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-6 col-md-2">
          <div class="muc-san-pham">
            <ul>
              <li>
                <a href="product-listadmin.php?tb=mass_product">Sữa tăng cân</a>
              </li>
              <li>
                <a href="product-listadmin.php?tb=whey_product">Whey protein</a>
              </li>
              <li>
                <a href="product-listadmin.php?tb=beaa_product">BCAAs, EAAs</a>
              </li>
              <li>
                <a href="product-listadmin.php?tb=pre_product">Pre-Workout</a>
              </li>
              <li>
                <a href="product-listadmin.php?tb=vitamin_product">Vitamin</a>
              </li>
              <li>
                <a href="admin.php">Thêm sản phẩm</a>
              </li>
              <li>
                <a href="dondathang.php">Đơn hàng</a>
              </li>
              <li>
                <a href="product-listadmin.php?tb=mass_product">Cập nhật sản phẩm</a>
              </li>
              <li>
                <a href="quanlinguoidung.php">Quản lí tài khoản</a>
              </li>

            </ul>
          </div>
        </div>
        <div class="col-md-10">
          <div class="best-sell">
            <span>>>Sản phẩm bán chạy : </span>
          </div>
          <div class="grid text-center">
            <?php


            while ($row = mysqli_fetch_array($result, 1)) {
              $so1 = $row['price'];
              $format = number_format($so1, 0, '.', '.');
              echo '
<form action = "suasanpham.php" method="GET">
    <div class="product">
      <a href="chitiett.php?id=' . $row['ID'] . '&tb=' . $tb . '">
        <img src=" img/imgproduct/' . $row['img'] . ' " alt=""/>
      </a>
      <div class="in4-product">
        <p>' . $row['title'] . '</p>
        <h5>' . $format . ' VNĐ</h5>
      </div>
      <div class="add-cart buy">
        <input type="hidden" name="idproduct" value="' . $row['ID'] . '" />
        <input type="hidden" name="curent" value="' . $current_url . '" />
        <input type="hidden" name="tb" value="' . $tb . '" />
        <button type ="submit" name="xoa">Xóa</button>
        <button type="submit" class="showModalBtn" >Sữa</button>
      </div>
    </div>
</form>';
            }
            //dong ket noi
            $connect->close();


            ?>
          </div>
          <div class="list-trang">
            <?php
            $connect = new mysqli("localhost", "root", "", "nienluan");
            $get_trang = "SELECT * FROM `$tb`";
            $result1 = mysqli_num_rows(mysqli_query($connect, $get_trang));
            $trang = ceil($result1 / 8);
            ?>
            <ul>
              <?php
              for ($i = 1; $i <= $trang; $i++) { ?>
                <li><a href="product-listadmin.php?trang=<?php echo $i ?>&tb=<?php echo $tb ?>">
                    <?php echo $i ?>
                  </a></li>
              <?php } ?>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <?php include 'E:\NienLuan\headfoot\footer.php' ?>
  </footer>
</body>

</html>