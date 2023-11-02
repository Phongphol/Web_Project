<?php include 'condb.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myshop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</head>

<body>
<?php include 'menu.php'; ?>
    <div class="container">
        <div class="row">
            <?php
            $ids = $_GET['id'];
            $sql = "SELECT * FROM product,type WHERE product.type_id = type.type_id and product.pro_id='$ids' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result)
                ?>
            <div class="col-md-4">
                <img src="img/<?= $row["image"] ?>" width="350px" class="mt-5 p-2 my-2 rounded border" />
            </div>

            <div class="col-md-6">
                ID: <?= $row["pro_id"] ?> <br> <br>
                <h6 class="text-success"> <?= $row["pro_name"] ?> </h6> <br>
                ประเภทสินค้า : <?=$row["type_name"]?> <br>
                รายละเอียด : <?=$row["detail"]?> <br>
                ราคา <?= $row["price"] ?> บาท <br>
                <a href="order.php?id=<?= $row["pro_id"] ?>" class="btn btn-danger mt-4"> หยิบใส่ตะกร้า </a>
            </div>

        </div>
    </div>
    <?php mysqli_close($conn);?>
</body>

</html>