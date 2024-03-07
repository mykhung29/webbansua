<?php
// session_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = "";
}
$connect = new mysqli("localhost", "root", "", "nienluan");
?>
<div class="header-top">
  <ul class="menu">
    <li>
      <a href="login.php">
        <i class="bx bx-user"></i>
        Đăng nhập
      </a>
    </li>
    <li>
      <a href="cart.php?c=0">
        <i class="bx bx-cart-alt"></i>
        Giỏ hàng(
        <?php
        $tongmonhang = mysqli_query($connect, "SELECT COUNT(*) as total FROM cart where idusrs = '$user_id' ");
        if (mysqli_num_rows($tongmonhang) > 0) {
          $tong = mysqli_fetch_assoc($tongmonhang);
        }
        echo $tong["total"]; ?>)
      </a>
    </li>
  </ul>
</div>

<div class="center-header">
  <div class="logo">
    <img src="img/MK-29-removebg-preview.png" alt="" />
  </div>
  <!-- ------------------------------------- -->
  <nav class="menu-center">
    <ul>
      <li>
        <a href="home.php" target="_blank" rel="noopener noreferrer">
          Trang chủ
        </a>
      </li>
      <li>
        <a href="#" target="_blank" rel="noopener noreferrer">
          Sản Phẩm
        </a>
        <div class="sub-1">
          <ul>
            <li>
              <a href="product-list.php?tb=mass_product">Sữa tăng cân</a>
            </li>
            <li>
              <a href="product-list.php?tb=whey_product">Whey protein</a>
            </li>
            <li>
              <a href="product-list.php?tb=beaa_product">BCAAs,EAAs</a>
            </li>
            <li>
              <a href="product-list.php?tb=vitamin_product">Vitamin bổ sung</a>
            </li>
          </ul>
        </div>
      </li>

      <li>
        <a href="about.php" target="_blank" rel="noopener noreferrer">
          Liên Hệ
        </a>
      </li>
    </ul>
  </nav>
  <!-- ------------------------------------- -->
  <form action="timkiem.php" method="GET">
    <div class="search">
      <input type="text" placeholder="Tìm kiếm sản phẩm" name="key" />
      <input type="submit" name="timkiem" value="tim kiem" style="display: none;" id="submitButton">
      <i class="bx bx-search" style="cursor: pointer;" onclick="document.getElementById('submitButton').click();"></i>

    </div>
  </form>
</div>