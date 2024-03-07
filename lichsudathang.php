<?php

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = "";
}

$connect = new mysqli("localhost", "root", "", "nienluan");

$sql_cart = mysqli_query($connect, "SELECT * FROM `order_khach` where idusrs = '$user_id'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử mua hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            margin-left: 5%;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        h2 {
            color: #333;
            text-align: center;
        }
        table img{
            width: 100px;
        }
    </style>
</head>

<body>
    <header>
        <?php

        if (isset($_SESSION['user_id'])) {
           
            include('E:\NienLuan\headfoot\headeruser.php');
        }
        ?>
    </header>
    <main>
        <h2>Lịch sử đặt hàng</h2>
        <img src="" alt="">
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá x Số lượng</th>
                    <th>Tổng đơn</th>
                    <th>Ngày đặt</th>
                    <th>Tình trạng đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($sql_cart, 1)) {
                //    $sumcl = floatval($row['soluong']) * floatval($row['giasp']);
                    $sumcl = number_format(floatval($row['soluong']) * floatval($row['giasp']), 0, '.', '.');
                    echo '
            <tr>
                <td>' . $row['tensp'] . ' <img src="img/imgproduct/' . $row['imgsp'] . '" alt=""> </td>
                <td>' . $row['giasp'] . ' VND <br> x' . $row['soluong'] . '</td>
                <td> '.$sumcl.' </td>
                <td>' . $row['time'] . '</td>
                <td>' . $row['tinhtrang'] . '</td>
            </tr>
        ';

                }



                ?>
                <!-- <tr>
            <td>Sản phẩm 1</td>
            <td>100.000 VND</td>
            <td>2023-11-24</td>
            <td>Đã giao hàng</td>
        </tr>
        <tr>
            <td>Sản phẩm 2</td>
            <td>150.000 VND</td>
            <td>2023-11-23</td>
            <td>Đang xử lý</td>
        </tr> -->
               
            </tbody>
        </table>
    </main>
    <footer>
        <?php
        include 'E:\NienLuan\headfoot\footer.php';
        ?>
    </footer>

</body>

</html>