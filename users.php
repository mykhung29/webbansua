<?php
// if(isset($_GET['trang'])){
//   $page  = $_GET['trang'];
// }else{
//   $page = '';
// }
// if($page == '' || $page == 1){
//   $begin = 0;
// }else{
//   $begin = ($page*8)-8;
// }
$connect = new mysqli("localhost", "root", "", "nienluan");
// $query = "SELECT * FROM `mass_product` LIMIT $begin,8";
// $result = mysqli_query($connect, $query); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/Trangchu.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/ddt.css">
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
                <a href="dondathang.php">Đơn hàng</a>
              </li>
              <li>
                <a href="product-listadmin.php?tb=mass_product">Cập nhật sản phẩm</a>
              </li>
              <li>
                <a href="testhome1.php?tb=beaa_product">Quản lí tài khoản</a>
              </li>

            </ul>
            </ul>
          </div>
        </div>
        <div class="col-md-10">
          <div class="best-sell">
            <span>>>Thêm sản phẩm </span>
          </div>
          <div class="in4">
            <table>
              <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Ngày đăng kí</th>


              </tr>
              <?php
              $connect = new mysqli("localhost", "root", "", "nienluan");
              $sql_asd = mysqli_query($connect, "SELECT * FROM `signup`");
              while ($row = mysqli_fetch_array($sql_asd)) {
                echo '
                <tr>   
                  <th>' . $row['ID'] . '</th>
                  <th>' . $row['fullname'] . '</th>
                  <th>' . $row['usr'] . '</th>
                  <th>' . $row['pass'] . '</th>
                  <th>' . $row['email'] . ' 
                  <button class="contact-button">
                    <a href="mailto:' . $row['email'] . '">Liên hệ</a>
                  </button>
                </th>
                  <th>' . $row['timee'] . '</th>
                </tr>
                ';
              }
              ?>


            </table>
          </div>

        </div>
  </main>
  <footer>
    <?php include 'E:\NienLuan\headfoot\footer.php' ?>

  </footer>
</body>

</html>