<?php
session_start();
include "condb.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="img/icon/icon.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iHAVECOM - CART</title>
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
    <br> <br>
    <div class="container">
        <form id="form1" method="POST" action="insert_cart.php">
            <div class="row">
                <div class="alert alert-danger h2" role="alert">
                    ตะกร้าสินค้า
                </div>
                <div class="col-md-15">
                    <table class="table table-hover" style="background-color:#fff">
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                            <th>เพิ่ม - ลด</th>
                            <th></th>
                        </tr>
                        <?php
                        $Total = 0;
                        $sumPrice = 0;
                        $m = 1;
                        $sumTotal = 0;
                        if (isset($_SESSION["intLine"])) { //ถ้าไม่เป็นค่าว่างให้ทำงาน
                            for ($i = 0; $i <= (int) $_SESSION["intLine"]; $i++) {
                                if (($_SESSION["strProductID"][$i]) != "") {
                                    $sql = "select * from product where pro_id='" . $_SESSION["strProductID"][$i] . "' ";
                                    $result = mysqli_query($conn, $sql);
                                    $row_pro = mysqli_fetch_array($result);

                                    $_SESSION["price"] = $row_pro['price'];
                                    $Total = $_SESSION["strQty"][$i];
                                    $sum = $Total * $row_pro['price'];
                                    $sumPrice = $sumPrice + $sum;
                                    $_SESSION["sum_price"] = $sumPrice;
                                    $sumTotal = $sumTotal + $Total;

                                    ?>
                                    <tr>
                                        <td>
                                            <?= $m ?>
                                        </td>
                                        <td>
                                            <img src="img/<?= $row_pro['image'] ?>" width="80px" height="80px">
                                            <?= $row_pro['pro_name'] ?>
                                        </td>
                                        <td>
                                            <?= $row_pro['price'] ?>
                                        </td>
                                        <td>
                                            <?= $_SESSION["strQty"][$i] ?>
                                        </td>
                                        <td>
                                            <?= $sum ?>
                                        </td>
                                        <td>
                                            <a href="order.php?id=<?= $row_pro['pro_id'] ?>" class="btn btn-outline-danger">+</a>
                                            <?php if ($_SESSION["strQty"][$i] > 1) { ?>
                                                <a href="order_del.php?id=<?= $row_pro['pro_id'] ?>"
                                                    class="btn btn-outline-danger">-</a>
                                            <?php } ?>
                                        </td>
                                        <td> <a href="pro_delete.php?Line=<?= $i ?>"> <img src="img/icon/trash.png"
                                                    width="30px"></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $m = $m + 1;
                                }
                            }
                        }
                        mysqli_close($conn);
                        ?>
                    </table>
                    <p class="text-end h5">จำนวนสินค้า
                        <?= $sumTotal ?> ชิ้น
                    </p>
                    <div style="text-align:right">
                        <a href="show_product.php"> <button type="button"
                                class="btn btn-outline-danger">เลือกสินค้าอื่นเพิ่มเติม</button></a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-danger h5" role="alert">
                        ข้อมูลสำหรับจัดส่งสิ้นค้า
                    </div>
                    <div class="h6">
                        ชื่อ-นามสกุล :
                        <input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ-นามสกุล ...">
                        <br>
                        ที่อยู่จัดส่งสินค้า:
                        <textarea class="form-control" required placeholder="ที่อยู่ ..." name="cus_add"
                            rows="3"> </textarea> <br>
                        เบอร์โทรศัพท์ :
                        <input type="number" name="cus_tel" class="form-control" required
                            placeholder="เบอร์โทรศัพท์ ...">
                        <br>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mt-5 p-2 my-2 rounded border d-grid gap-2" style="background-color:#fff">
                        <br>
                        <h5 class="text-center">
                            ยอดรวมสุทธิ
                            <?= $sumPrice ?> บาท
                        </h5>
                        <button type="submit" class="btn btn-outline-success">ยืนยันการสั่งซื้อ</button>
                        <br>
                    </div>
                </div>
        </form>
        <br>
    </div>
    <br> <br>
</body>

</html>