<?php
require_once 'config.php';

if(isset($_POST['submit'])){
  $book_id = $_POST['book_id'];
	$room_id = $_POST['room_label'];
	$tenant_id = $_POST['tenant_name'];
	$book_start_date= $_POST['book_start_date'];
	$book_end_date= $_POST['book_end_date'];
	$book_tr_date = $_POST['book_tr_date'];

	$sql = mysqli_query($conn,"SELECT*FROM booking WHERE room_label ='$room_id' AND book_end_date>'$book_end_date'");

    $rows = mysqli_num_rows($sql);
    
    if($rows>0) {
        echo "<script>alert('Sorry, this room is already booked at this date😢. You can reservation again in other room😊'); window.location.href='insert3.php'</script>";
    }
    else {
    $q = $conn->query("INSERT INTO booking VALUES ('$book_id','$room_id','$tenant_id','$book_start_date','$book_end_date','$book_tr_date')");
    if ($q) {
        // pesan jika data tersimpan
        echo "<script>alert('Your Reservation Successfull😊'); window.location.href='user_page.php'</script>"; //link ke display booking
      } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Your Reservation Failed😢'); window.location.href='insert3.php'</script>";
      }
    }
}
?>
    