<?php
include("config.php");

$room_id=$_GET['room_id'];

$row = mysqli_query($conn, "DELETE FROM room WHERE room_id = '$room_id'");
header('location:room_admin.php');

?>