

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng kí tài khoản</title>
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
    <link rel="stylesheet" href="css/signup.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />

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
        include 'E:\NienLuan\headfoot\header.php';
        ?>
    </header>
    <main>
      <div class="login-form">
        <form action="signup-submit.php" method="post">
          <div class="container">
            <div class="account">
              <h2>Sign Up:</h2>
              <label for="">Họ và Tên:</label>
              <input type="text" placeholder="Fullname" name="fullname" />
              <label for="">Tên tài khoản:</label>
              <input type="text" placeholder="User" name="usr" />
              <label for="">Mật khẩu:</label>
              <input type="password" placeholder="Password" name="password" />
              <label for="">Xác nhận mật khẩu:</label>
              <input type="password" placeholder="Confirm Password"  name="cfpass" />
              <label for="">Số điện thoại:</label>
              <input type="text" placeholder="Phone" name="sdt" />
              <label for="">Email:</label>
              <input type="email" placeholder="Email" name="email" />
              <button type="submit">Sign Up</button>
            </div>
          </div>
        </form>
      </div>
    </main>
    <footer>
    <?php include'E:\NienLuan\headfoot\footer.php' ?>
    </footer>
  </body>
</html>
