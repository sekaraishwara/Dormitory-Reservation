<?php 
// koneksi database
require 'config.php';
 
// menangkap data yang di kirim dari form
$a = $_POST['invoice_id'];
$b = $_POST['tenant_name'];
$c = $_POST['tenant_address'];
$d = $_POST['zip_code'];
$e = $_POST['tenant_phone'];
$f = $_POST['date'];
$g = $_POST['room_label'];
$h = $_POST['month'];
$i = $_POST['price'];
 
// menginput data ke database
mysqli_query($conn,"INSERT INTO invoice VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i')");  

// mengalihkan halaman kembali ke index.php
header("location:invoice_result.php");

?>