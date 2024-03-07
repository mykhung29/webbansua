<?php
session_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = "";
}
//


$connect = new mysqli("localhost", "root", "", "nienluan");
//
if (isset($_POST['upc'])) {

  for ($i = 0; $i < (count($_POST['product_id'])); $i++) {
    $spid = $_POST['idcart'][$i];
    $slsp = $_POST['soluong'][$i];
    $sql_update = mysqli_query($connect, "UPDATE `cart` SET `slsp`='$slsp' where ID_cart = '$spid' and idusrs = '$user_id' ");
  }
}
//

if (isset($_POST['xoa'])) {
  $xoa = $_POST['tensp'];
  $sql_xoa = mysqli_query($connect, "DELETE FROM `cart` WHERE `ID_cart` = '$xoa' and idusrs = '$user_id' ");
   
}

//
$connect1 = new mysqli("localhost", "root", "", "diachii");
$provine = mysqli_query($connect1, "SELECT * FROM `province` ");
$sql_ttcart = mysqli_query($connect, "SELECT * FROM `cart` where idusrs = '$user_id'");

// tinh tong tien

$tongtien = mysqli_query($connect, "SELECT `giasp`,`slsp` FROM `cart` where idusrs = '$user_id'");
$total = 0;
while ($rowtotal = mysqli_fetch_array($tongtien)) {
  $sumcl = floatval($rowtotal['slsp']) * floatval($rowtotal['giasp']);
  $total += $sumcl;
}
$formattedNumber = number_format($total, 0, '.', '.');



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Giỏ hàng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/Sanpham.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/cart.css" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="js/app.js"></script>

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
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
    <div class="row main">
      <div class="col-7">
        <div class="cart-table">
          <form action="" method="post" class="table">
            <table>
              <tr>
                <th>Ảnh sản phẩm</th>
                <th>Sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
              </tr>
              <!-- ------------------------------------------------------------------------ -->
              <?php
              while ($asd = mysqli_fetch_array($sql_ttcart)) {
                $sumcl = number_format(floatval($asd['slsp']) * floatval($asd['giasp']), 0, '.', '.');
                echo '
                    <tr>
                    <th>
                        <img src="img/imgproduct/' . $asd['imgsp'] . '" alt="" srcset="" height="100px">
                    </th>

                    <th>' . $asd['tensp'] . '  (' . $asd['muivi'] . ')
                      <input  type="hidden" name="idusrs" value="' . $asd['idusrs'] . '"/>
                      <input  type="hidden" name="tensp" value="' . $asd['ID_cart'] . '"/>
                      <input  type="hidden" name="idcart[]" value="' . $asd['ID_cart'] . '"/>
                    </th>

                    <th>' . number_format(floatval($asd['giasp']), 0, '.', '.') . '</th>

                    <th>
                      <input type="number" min = "1" name="soluong[] "value="' . $asd['slsp'] . '"/>
                      <input type="hidden" name="product_id[]" value="' . $asd['idsp'] . '"/>
                    </th>

                    <th>' . $sumcl . '</th>
                    
                    <th><input type="submit" name="xoa" value="Xóa" onclick="confirmDelete(event) "></th>
                  </tr>
                    ';
              }
              ?>

              <tr>
                <td class="btnud"><input type="submit" name="upc" value="Cập nhật"></td>
                <td class="asd" colspan="4" align="right">
                  <h5>Tổng tiền thanh toán:</h5>
                </td>
                <td class="ads" colspan="6" align="center">
                  <h5>
                    <?php echo $formattedNumber; ?> VND
                  </h5>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <div class="col-5">
        <form action="success.php" method="post">
          <div class="container">

            <div class="account">

              <label for="">Họ và Tên:</label>
              <input type="text" placeholder="Fullname" name="fullname" />
              <label for="">Số điện thoại:</label>
              <input type="text" placeholder="Number phone" name="sdt" />
              <label for="province">Tỉnh/Thành phố:</label>

              <select id="province" name="province">
                <option value="">Chọn một Tỉnh/Thành phố</option>
                <?php
                while ($rowdc = mysqli_fetch_assoc($provine)) { ?>
                  <option value="<?php echo $rowdc['province_id']; ?>">
                    <?php echo $rowdc['name']; ?>
                  </option>
                <?php } ?>
              </select>

              <label for="district">Quận/Huyện:</label>
              <select id="district" name="district">
                <option value="">Chọn một quận/huyện</option>
              </select>

              <label for="wards">Phường/Xã:</label>
              <select id="wards" name="wards">
                <option value="">Chọn một xã</option>
              </select>

              <label for="">Email:</label>
              <input type="email" placeholder="Email" name="email" />
              <button name="order" type="submit">Đặt hàng</button>

            </div>

        </form>
      </div>
    </div>
  </main>
  <footer>
    <?php include 'E:\NienLuan\headfoot\footer.php' ?>

  </footer>
</body>
<script src="js/modal.js"></script>

</html>