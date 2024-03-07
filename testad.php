<?php
    if (isset($_GET['submit'])) {
    $type = $_GET['tpbs'];
    $tsp = $_GET['tensp'];
    $gsp = $_GET['giasp'];
    $hinh = $_GET['hinh'];
    }    

    $connect = new mysqli("localhost", "root","","nienluan");
    $insert = mysqli_query($connect,
    "INSERT INTO `$type`(`title`, `img`, `price`) VALUES ('$tsp','$hinh','$gsp')");
    $connect->close();
    if ($insert) {
        echo '<script>alert("Thêm sản phẩm thành công");</script>';
        echo '<script>window.location.href = "admin.php";</script>';

    }
    

?>  