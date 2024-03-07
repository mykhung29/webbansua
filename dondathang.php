<?php
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
$connect = new mysqli("localhost", "root", "", "nienluan");
$query = "SELECT * FROM `mass_product` LIMIT $begin,8";
$result = mysqli_query($connect, $query);
if (isset($_POST['update'])) {

  $orderID = $_POST['order_id'];
  $newStatus = $_POST['cars'];

  $connect = new mysqli("localhost", "root", "", "nienluan");

  // Truy vấn SQL để cập nhật trạng thái
  $sql = "UPDATE order_khach SET tinhtrang = '$newStatus' WHERE ID = $orderID ";

  if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Cập nhật trạng thái thành công");</script>';
  } else {
    echo "Lỗi khi cập nhật trạng thái: " . $conn->error;
  }

  // Đóng kết nối đến cơ sở dữ liệu
  $connect->close();
}

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
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Ngày đặt hàng</th>
                <th>Tình trạng</th>

              </tr>
              <?php
              $connect = new mysqli("localhost", "root", "", "nienluan");
              $sql_asd = mysqli_query($connect, "SELECT * FROM `order_khach`");
              while ($row = mysqli_fetch_array($sql_asd)) {
                echo '
                <tr>   
                  <th>' . $row['tenkhach'] . '</th>
                  <th>' . $row['sdt'] . '</th>
                  <th>' . $row['adr'] . '</th>
                  <th>' . $row['email'] . '</th>
                  <th>' . $row['tensp'] . '</th>
                  <th>' . $row['giasp'] . '</th>
                  <th><img src="img/imgproduct/' . $row['imgsp'] . '" alt="" height="100px" ></th>
                  <th>' . $row['soluong'] . '</th>
                  <th>175000</th>
                  <th>' . $row['time'] . '</th>
                  <th>
                  ' . $row['tinhtrang'] . '
                  <form action="" method="post">
                  <input type="hidden" value="' . $row['ID'] . '" name="order_id">
                  <select id="cars" name="cars">
                  
                    <option value="Đã hoàn thành">Hoàn thành</option>
                    <option value="Đang trên đường giao">Đang giao</option>
                    <option value="Đang chuẩn bị hàng">Đang chuẩn bị</option>
                  </select>
                  <input type="submit" name= "update">
                </form></th>

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