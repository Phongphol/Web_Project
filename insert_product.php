<?php
include 'condb.php';
$p_name = $_POST['pname'];
$detail = $_POST['de_tail'];
$typeID = $_POST['typeID'];
$price = $_POST['price'];
$num = $_POST['num'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'product_' . uniqid() . "." . pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./img/product/" . $new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'], $image_upload_path);
} else {
    $new_image_name = "";
}
//เพิ่มข้อมูล ใน database product
$sql = "INSERT INTO product(pro_name,detail,type_id,price,amount,image) VALUES('$p_name','$detail','$typeID','$price','$num','$new_image_name')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
    echo "<script> window.location='add_product.php'; </script>";
} else {
    echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
}
?>