<?php
if (isset($_GET['tb'])) {
    $spid = $_GET['idproduct'];
}
if (isset($_GET['tb'])) {
    $tb = $_GET['tb'];
}
$connect = new mysqli("localhost", "root", "", "nienluan");
$query = "SELECT *  FROM `$tb` WHERE `ID` = '$spid' ";
$result = mysqli_query($connect, $query);
$result5 = mysqli_query($connect, $query);
$row2 = mysqli_fetch_array($result5);

if (isset($_GET['xoa'])) {
    $spid = $_GET['idproduct'];
    $querydelete = "DELETE FROM `$tb` WHERE `ID` = '$spid' ";
    $resultdelete = mysqli_query($connect, $querydelete);
}

if (isset($_GET['update'])) {
    $spid = $_GET['idproduct'];
    $tensp = isset($_GET['ten']) ? $_GET['ten'] : '' . $row2['title'] . '';
    $giasp = isset($_GET['gia']) ? $_GET['gia'] : '' . $row2['price'] . '';
    $hinhsp = isset($_GET['hinh']) ? $_GET['hinh'] : '' . $row2['img'] . '';
    $vsp = isset($_GET['vsp']) ? $_GET['vsp'] : '' . $row2['vsp'] . '';
    $dmsp = isset($_GET['dmsp']) ? $_GET['dmsp'] : '' . $row2['dmsp'] . '';




    $update = "UPDATE `$tb` SET `title`='$tensp',`img`='$hinhsp',`price`=' $giasp' WHERE `ID` = $spid";
    $result = mysqli_query($connect, $query);
    $result1 = mysqli_query($connect, $update);



}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/update.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />

<body>
    <header>
        <?php
        include 'E:\NienLuan\headfoot\hdad.php';
        ?>
    </header>
    <main>
        <?php
        while ($row = mysqli_fetch_array($result, 1)) {
            $so1 = $row['price'];
            $format = number_format($so1, 0, '.', '.');
            echo '
                <form action = "suasanpham.php" method="GET">

                    <div class="product">
                    <a href="chitiett.php?id=' . $row['ID'] . '&tb=' . $tb . '">
                        <img src=" img/imgproduct/' . $row['img'] . ' " alt=""/>
                    </a>
                    <div class="in4-product">
                    <label >Tên muốn sửa:</label>
                    <input type="text"  name="ten" value="' . $row['title'] . '"">
                    <label >Giá muốn sửa:</label>
                    <input type="text"  name="gia" value="' . $row['price'] . '"">
                    <label >Ảnh muốn sửa:</label>
                    <input type="text" name="hinh" value="' . $row['img'] . '"">
                    <label >Về sản phẩm:</label>
                    <input type="text" name="vsp" value="' . $row['vsp'] . '"">
                    <label >Điểm nổi bật:</label>
                    <input type="text" name="dmsp" value="' . $row['dmsp'] . '"">
                    </div>
                    <div class="add-cart buy">
                        <input type="hidden" name="idproduct" value="' . $row['ID'] . '" />
                        <input type="hidden" name="tb" value="' . $tb . '" />
                        <button type="submit" class="showModalBtn" name="update">Sữa</button>
                    </div>
                    </div>
                </form>';
        }
        //dong ket noi
        $connect->close(); ?>

    </main>
    <footer>
        <?php include 'E:\NienLuan\headfoot\footer.php' ?>
    </footer>


</body>

</html>