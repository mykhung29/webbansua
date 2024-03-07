<?php

$connect = new mysqli("localhost", "root", "", "nienluan");
$query = "SELECT COUNT(*) as total FROM signup";
$result = mysqli_query($connect, $query);



if ($result) {
    $row = $result->fetch_assoc();
    $totalRows = $row['total'];
} else {
    $totalRows = 0;
}

// -------------------------------------------

$queryDXL = "SELECT COUNT(*) as total FROM order_khach WHERE `tinhtrang` = 'Đang xử lí'";
$resultDXL = $connect->query($queryDXL);

if ($resultDXL) {
    $rowDXL = $resultDXL->fetch_assoc();
    $totalDangXuLi = isset($rowDXL['total']) ? $rowDXL['total'] : 0;
} else {
    $totalDangXuLi = 0;
}

///////////////////////////////////////////////////
$queryHoanThanh = "SELECT SUM(giasp * soluong) as tong_gia FROM order_khach WHERE `tinhtrang` = 'Đã hoàn thành'";
$resultHoanThanh = $connect->query($queryHoanThanh);

// Kiểm tra và hiển thị kết quả
if ($resultHoanThanh) {
    $rowHoanThanh = $resultHoanThanh->fetch_assoc();
    $tongGiaHoanThanh = isset($rowHoanThanh['tong_gia']) ? $rowHoanThanh['tong_gia'] : 0;
} else {
    $tongGiaHoanThanh = 0;
}
$formattedNumber = number_format($tongGiaHoanThanh, 0, '.', '.');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/Trangchu.css" />

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
    <style>
        .container {
            display: flex;
            /* justify-content: space-around; */
            /* flex-wrap: wrap; */
            max-width: 800px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 15px;
            text-align: center;
            width: 250px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .statistic-label {
            color: #555;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .statistic-value {
            color: #333;
        }
    </style>
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
                                <a href="quanlinguoidung.php">Quản lí tài khoản</a>
                            </li>
                            <li>
                <a href="admin.php">Thêm sản phẩm</a>
              </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="container">
                        <div class="card">
                            <h2>Doanh thu</h2>
                            <span class="statistic-label">Tổng cộng:</span>
                            <span class="statistic-value" id="doanhThu">
                                <?php echo $formattedNumber; ?> VNĐ
                            </span>
                        </div>

                        <div class="card">
                            <h2>Đơn hàng</h2>
                            <span class="statistic-label">Đang xử lý:</span>
                            <span class="statistic-value" id="donHangDangXuLi">
                                <?php echo $totalDangXuLi; ?>
                            </span>
                        </div>

                        <div class="card">
                            <h2>Người dùng</h2>
                            <span class="statistic-label">Tổng số:</span>
                            <span class="statistic-value" id="soNguoiDung">
                                <?php echo $totalRows; ?>
                            </span>
                        </div>
                    </div>

                </div>
    </main>

    <footer>
        <?php include 'E:\NienLuan\headfoot\footer.php' ?>
    </footer>

</body>

</html>