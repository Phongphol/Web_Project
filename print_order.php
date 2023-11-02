<?php
session_start();
include 'condb.php';
$sql = "select * from tb_order where orderID= '" . $_SESSION["order_id"] . "' ";
$result = mysqli_query($conn, $sql);
$rs = mysqli_fetch_array($result);
$total_price = $rs['total_price'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อ</title>
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
            <div class="col-md-15">
                <div class="alert alert-success h2 text-center mt-4" role="alert">
                    การสั่งซื้อเสร็จสมบูรณ์
                </div>
                เลขที่การสั่งซื้อ :
                <?= $rs['orderID'] ?> <br>
                ชื่อ - นามสกุล (ลูกค้า) :
                <?= $rs['cus_name'] ?> <br>
                ที่อยู่การจัดส่ง :
                <?= $rs['address'] ?> <br>
                เบอร์โทรศัพท์ :
                <?= $rs['telephone'] ?> <br>
                <br>
                <div class="card mb-4 mt-4">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>ยอดรวมสุทธิ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql1 = "select * from order_detail d,product p where d.pro_id=p.pro_id and d.orderID= '" . $_SESSION["order_id"] . "' ";
                                $result1 = mysqli_query($conn, $sql1);
                                while ($row = mysqli_fetch_array($result1)) {

                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row['pro_id'] ?>
                                        </td>
                                        <td>
                                            <?= $row['pro_name'] ?>
                                        </td>
                                        <td>
                                            <?= $row['orderPrice'] ?>
                                        </td>
                                        <td>
                                            <?= $row['orderQty'] ?>
                                        </td>
                                        <td>
                                            <?= $row['Total'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                                }
                                ?>
                        </table>
                        <h6 class="text-end"> รวมเป็นเงินทั้งหมด
                            <?= number_format($total_price, 2) ?> บาท
                        </h6>
                    </div>
                </div>
                <div>
                    ***กรุณาโอนเงินภายใน 24 ชั่วโมงหลังจากทำการสั่งซื้อ***
                </div>
                <br>
                <div class = "text-center">
                    <a href="show_product.php" class="btn btn-danger">Back</a>
                    <button onclick="window.print()" class="btn btn-info">Print</button>
                </div>
            </div>
        </div>
</body>

</html>