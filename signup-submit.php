<?php
if (!empty($_POST)) {
  $hoten = $_POST['fullname'];
  $user = $_POST['usr'];
  $pass = $_POST['password'];
  $cfpass = $_POST['cfpass'];
  $email = $_POST['email'];
  $sdt = $_POST['sdt'];
  $ngay_gio_hien_tai = date('d-m-Y H:i:s');
  //tao ket noi
  $connect = new mysqli("localhost", "root", "", "nienluan");
  mysqli_set_charset($connect, "utf8");
  if ($connect->connect_error) {
    var_dump($connect->connect_error);
    die();
  }
  $allConditionsMet = true;
  $m1 = $m2 = $m3 = $m4 = $m5 = '';
  $p1 = $hoten;
  $p2 = $user;
  $p3 = $pass;
  $p4 = $cfpass;
  $p5 = $email;
  if ($hoten == '') {
    $m1 = "Họ tên không hợp lệ";
    $allConditionsMet = false;

  }
  $usrcheck = mysqli_num_rows(mysqli_query($connect, "SELECT `usr` FROM `signup` WHERE usr  = '$user' "));
  if ($user == '' | $usrcheck > 0) {
    $m2 = 'Tài khoản đã có người đăng kí';
    $allConditionsMet = false;

  }
  if ($pass == '' | strlen($pass) < 8) {
    $m3 = 'Mật khẩu không hợp lệ';
    $allConditionsMet = false;

  }
  if ($pass != $cfpass) {
    $m4 = 'Xác nhận mật khẩu không đúng';
    $allConditionsMet = false;

  }
  $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
  if (!preg_match($pattern, $email)) {
    $m5 = 'Email không hợp lệ';
    $allConditionsMet = false;

  }


  if ($allConditionsMet) {
    $query =
      "INSERT INTO signup(fullname, usr, pass, cfpass,sdt,email,timee)
    VALUES(
      '" . $hoten . "','" . $user . "','" . $pass . "','" . $cfpass . "','" . $sdt . "','" . $email . "','" . $ngay_gio_hien_tai . "')";
    $result = mysqli_query($connect, $query);

    if ($result) {
      // Insert thành công
      echo '<script>alert("Đăng ký thành công!");</script>';
    }
    $p1 = '';
    $p2 = '';
    $p3 = '';
    $p4 = '';
    $p5 = '';

  }

  // $connect->close();


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
  <link rel="stylesheet" href="css/signup.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css" />

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
</head>

<body>
  <header>
    <?php
    include 'E:\NienLuan\headfoot\header.php';
    ?>
  </header>
  <main>
    <div class="login-form">
      <form action="" method="post">
        <div class="container">
          <div class="account">
            <h2>Sign Up:</h2>
            <label for="">Họ và Tên:</label>
            <input type="text" placeholder="Fullname" name="fullname" value="<?php echo $p1; ?>" />
            <?php echo '<p>' . $m1 . '</p>'; ?>
            <label for="">Tên tài khoản:</label>
            <input type="text" placeholder="User" name="usr" value="<?php echo $p2; ?>" />
            <?php echo '<p>' . $m2 . '</p>'; ?>
            <label for="">Mật khẩu:</label>
            <input type="password" placeholder="Password" name="password" value="<?php echo $p3; ?>" />
            <?php echo '<p>' . $m3 . '</p>'; ?>
            <label for="">Xác nhận mật khẩu:</label>
            <input type="password" placeholder="Confirm Password" name="cfpass" value="<?php echo $p4; ?>" />
            <?php echo '<p>' . $m4 . '</p>'; ?>
            <label for="">Số điện thoại:</label>
            <input type="text" placeholder="Phone" name="sdt" />
            <label for="">Email:</label>
            <input type="email" placeholder="Email" name="email" value="<?php echo $p5; ?>" />
            <?php echo '<p>' . $m5 . '</p>'; ?>
            <button type="submit">Sign Up</button>
          </div>
        </div>
      </form>
    </div>
  </main>
  <footer>
    <?php include 'E:\NienLuan\headfoot\footer.php' ?>
  </footer>
</body>

</html>