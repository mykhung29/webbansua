<div class="header-top">
  <ul class="menu">
    <li>
      <a href="login.php" onclick="confirmSignout(event)">
        <i class="bx bx-user"></i>
        Đăng xuất
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
        <a href="quantri.php" target="_blank" rel="noopener noreferrer">
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