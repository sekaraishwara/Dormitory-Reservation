<?php
include("config.php");

$tenant_id=$_GET['tenant_id'];

$row = mysqli_query($conn, "DELETE FROM tenant WHERE tenant_id = '$tenant_id'");
header('location:tenant_admin.php');

?>