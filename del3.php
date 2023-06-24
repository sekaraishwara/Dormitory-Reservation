<?php
include("config.php");

$book_id=$_GET['book_id'];

$row = mysqli_query($conn, "DELETE FROM booking WHERE book_id = '$book_id'");
header('location:booking_admin.php');

?>