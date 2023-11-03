<?php include 'condb.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="img/icon/icon.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iHAVECOM - NOTEBOOK</title>
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
        <br><br>
        <div class="row">
            <div class="alert alert-light h3 text-center" role="alert">
                ALL PRODUCT
            </div>
            <?php
            $sql = "SELECT * FROM product WHERE type_id=004 ORDER BY pro_id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $amount1 = $row['amount'];
                ?>
                <div class="col-sm-3">
                    <div class="mt-5 p-2 my-2 rounded border" style="background-color: #ffffff;">
                        <div>
                            <img src="img/product/<?= $row["image"] ?>" width="250px" height="250px"
                                class="rounded mx-auto d-block"> <br>
                            <h5 class="text-danger">
                                <?= $row["pro_name"] ?>
                            </h5> <br>
                            <h6>
                                ราคา
                                <?= $row["price"] ?> บาท <br>
                            </h6>
                            <?php
                            if ($amount1 <= 0) {
                                ?>
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger mt-4 disabled"> สินค้าหมด </a>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="d-grid gap-2">
                                    <a href="sh_product_detail.php?id=<?= $row["pro_id"] ?>"
                                        class="btn btn-outline-danger mt-4"> รายละเอียด </a>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <?php
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
    <br> <br>

</body>

</html>