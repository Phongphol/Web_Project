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
        <br><br>
        <div class="row">
            <?php
            $sql = "SELECT * FROM product ORDER BY pro_id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-sm-3">
                    <div class="mt-5 p-2 my-2 rounded border">
                        <div>
                            <img src="img/<?= $row["image"] ?>" width="250px" height="250px" class="rounded mx-auto d-block"> <br>
                            ID: <?= $row["pro_id"] ?> <br> <br>
                            <h6 class="text-success"> <?= $row["pro_name"] ?> </h6> <br>
                            ราคา <?= $row["price"] ?> บาท <br>
                            <div class="d-grid gap-2">
                            <a href="sh_product_detail.php?id=<?= $row["pro_id"] ?>" class="btn btn-outline-danger mt-4"> รายละเอียด </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            mysqli_close($conn);
            ?>
        </div>

    </div>

</body>

</html>