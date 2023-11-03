<?php
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="alert alert-danger h4 text-center" role="alert">
                    เพิ่มข้อมูลสินค้า
                </div>
                <form name="form1" method="POST" action="insert_product.php" enctype="multipart/form-data">
                    <label> ชื่อสินค้า: </label>
                    <input type="text" name="pname" class="form-control" placeholder="ชื่อสินค้า..." required> <br>
                    <label> ประเภทสินค้า: </label>
                    <select class="form-select" name="typeID">
                        <?php
                        $sql = "SELECT * FROM type ORDER BY type_id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?= $row['type_id'] ?>">
                                <?= $row['type_name'] ?>
                            </option>
                            <?php
                        }
                        mysqli_close($conn);
                        ?>
                    </select> <br>
                    <label> รายละเอียดสินค้า: </label>
                    <textarea class="form-control" required placeholder="รายละเอียด..." name="de_tail"
                        rows="3"> </textarea> <br>
                    <label>ราคา: </label>
                    <input type="number" name="price" class="form-control" placeholder="ราคา..." required> <br>
                    <label>จำนวน: </label>
                    <input type="number" name="num" class="form-control" placeholder="จำนวน..." required> <br>
                    <label>รูปภาพ: </label>
                    <input type="file" name="file1" required> <br>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <input class="btn btn-danger" type="reset" value="Cancel">
                </form>
            </div>
        </div>
    </div>
</body>

</html>