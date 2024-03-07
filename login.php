<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST['uname'];
  $pass = $_POST['psw'];

  if ($user == 'admin29' && $pass == 'admin2902') {
    header('Location: admin.php');

    exit;
  }
  //tao ket noi
  $connect = new mysqli("localhost", "root", "", "nienluan");
  mysqli_set_charset($connect, "utf8");
  if ($connect->connect_error) {
    var_dump($connect->connect_error);
    die();
  }
  $query = "SELECT * FROM signup where usr ='" . $user . "' and pass = '" . $pass . "'";
  $result = mysqli_query($connect, $query);
  $data = array();
  while ($row = mysqli_fetch_array($result, 1)) {
    $data[] = $row;
  }

  if ($data != null && count($data) > 0) {
    $_SESSION['user_id'] = $user;
    echo '<script>alert("Đăng nhập thành công");</script>';
    echo $user;
    header("Location: home.php");
    exit;
  } else {
    
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng nhập</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/login.css" />
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
            <h2>Login</h2>
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required />

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required />

            <button type="submit">Login</button>
            <div class="frg1">
              <label>
                <input type="checkbox" checked="checked" name="remember" />
                Remember me
              </label>
            </div>
            <div class="frg">
              <span class="psw"><a href="signup.php">Sign up </a></span>
              <span style="margin:0px 5px">/ </span>
              <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
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