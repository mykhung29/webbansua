<?php
    session_start();

    if(isset($_GET['timkiem'])){
        $key = $_GET['key'];
    }
    $connect = new mysqli("localhost", "root","","nienluan");
    $sql_sreach = " SELECT * FROM mass_product WHERE mass_product.title LIKE '%$key%'
                    union
                    SELECT * FROM pre_product WHERE pre_product.title LIKE '%$key%'
                    union
                    SELECT * FROM whey_product WHERE whey_product.title LIKE '%$key%'
                    union
                    SELECT * FROM vitamin_product WHERE vitamin_product.title LIKE '%$key%'
                    union
                    SELECT * FROM beaa_product WHERE beaa_product.title LIKE '%$key%'
                    
    
    ";
    $query_sreach = mysqli_query($connect, $sql_sreach);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kết quả</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/Trangchu.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css">
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"
    />
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
</div>
    
      <div class="container-fluid"> 
        <div class="row">
          <div class="col-6 col-md-2">
            <div class="muc-san-pham">
              <ul>
              <li>
                  <a href="product-list.php?tb=mass_product">Sữa tăng cân</a>
                </li>
                <li>
                  <a href="product-list.php?tb=whey_product">Whey protein</a>
                </li>
                <li>
                  <a href="product-list.php?tb=beaa_product">BCAAs, EAAs</a>
                </li>
                <li>
                  <a href="product-list.php?tb=pre_product">Pre-Workout</a>
                </li>
                <li>
                  <a href="product-list.php?tb=vitamin_product">Vitamin</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-10">
            <div class="best-sell">
              <span>>Kết quả tìm kiếm cho <?php echo $key ?> </span>
            </div>
            <div class="grid text-center">
            <?php
while( $row = mysqli_fetch_array($query_sreach, 1) ){
  $so1 = $row['price'];
  $format = number_format($so1, 0, '.', '.');
echo '<div class="product">
<a href="chitiett.php?id='.$row['ID'].'&tb=mass_product">
  <img
    src=" img/imgproduct/'.$row['img'].' "
    alt=""
  />
</a>
<div class="in4-product">
  <p>'.$row['title'].'</p>
  <h5>'.$format.'</h5>
</div>
<div class="add-cart buy">
  <button>Mua Ngay</button>
  <button>Add Cart</button>
</div>
</div>';
}
$connect->close();
?>
      </div>
          
        </div>
      </div>
    </main>
    <footer>
    <?php include'E:\NienLuan\headfoot\footer.php' ?>
    </footer>
  </body>
</html>
