<?php include 'condb.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="img/icon/icon.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iHAVECOM</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</head>

<style>
    body {
        background-color: #F5F5F5;
    }
</style>

<body>
    <?php include 'menu.php'; ?>
    <div class="container">
        <?php
        $ids = $_GET['id'];
        $sql = "SELECT * FROM product,type WHERE product.type_id = type.type_id and product.pro_id='$ids' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result)
            ?>
        <div class="text-center">
            <img src="img/product/<?= $row["image"] ?>" width="400px" class="mt-5 p-2 my-2 rounded border"
                style="background-color: #ffffff;" />
        </div>
        <br>
        <div>
            <h3>
                <?= $row["pro_name"] ?>
            </h3>
            <h5 style="color:gray;">
                ประเภทสินค้า :
                <?= $row["type_name"] ?> | รหัสสินค้า :
                <?= $row["pro_id"] ?> <br>
            </h5>
            <br>
            <h4>
                ราคา
                <?= $row["price"] ?> บาท
            </h4> <br>
            <h5>
                <?= $row["detail"] ?>
            </h5><br>
            <a href="order.php?id=<?= $row["pro_id"] ?>" class="btn btn-danger mt-4 btn-lg"> หยิบใส่ตะกร้า </a>
        </div>

    </div>
    </div>
    <?php mysqli_close($conn); ?>
</body>

</html>