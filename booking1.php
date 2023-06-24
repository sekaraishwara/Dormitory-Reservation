<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rental Room</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
    <?php 
include("config.php");

if(isset($_POST['submit'])){
  $book_id = $_POST['book_id'];
  $room_id = $_POST['room_label'];
  $tenant_id = $_POST['tenant_name'];
  $book_start_date = $_POST['book_start_date'];
  $book_end_date = $_POST['book_end_date'];
  $book_tr_date = $_POST['book_tr_date'];

  $sql = mysqli_query($conn,"SELECT*FROM booking WHERE room_id ='$room_id' AND book_end_date>'$book_end_date'");

    $rows = mysqli_num_rows($sql);

  if($rows>0) {
    echo "<script>alert('Sorry, this room is already booked at this date. You can reservation again in other room'); window.location.href='booking1.php'</script>";
}
else {
$q = $conn->query("INSERT INTO booking VALUES ('$book_id','$room_id','$tenant_id','$book_start_date','$book_end_date','$book_tr_date')");
if ($q) {
    // pesan jika data tersimpan
    echo "<script>alert('Your Reservation Successful'); window.location.href='user_page.php'</script>"; //link ke display booking
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Your Reservation Failed'); window.location.href='booking1.php'</script>";
  }
}
}

 ?>

      <div class="container">

        <div class="section-title">
          <h2>Fill The Form Below</h2>
        </div>
        <form action="" method="POST">
                  <table>
                  <?php 

$query = mysqli_query($conn, "SELECT max(book_id) as idTerbesar FROM booking");
  $data = mysqli_fetch_array($query);
  $book_id = $data['idTerbesar'];

  $urutan = (int) substr($book_id, 2, 2);

  $urutan++;

  $huruf = "B";
  $book_id = $huruf . sprintf("%02s", $urutan);
     ?>
                  <tr>
                    <td for="ID">ID</td>
                    <td><input type="text" class="form-control" name="book_id"  value="<?= $book_id; ?>" required readonly></td>
                  </tr>
                   <tr>
                   <?php $result = mysqli_query($conn,"SELECT room_label FROM room ORDER BY room_label");?>
                   <td>Room Label</td>
                   <td><select name="room_label" class="form-control" aria-describedby="emailHelp">
                   <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?=$row["room_label"];?>"><?=$row["room_label"];?></option>
                    <?php
                     $i++;
                    }
                    ?>
                    </select></td>
                  </tr>
                   <tr>
                   <?php $result = mysqli_query($conn,"SELECT tenant_name FROM tenant ORDER BY tenant_name");?>
                    <td>Tenant Name</td>
                    <td><select name="tenant_name" class="form-control" aria-describedby="emailHelp">
                    <?php
                      $i=0;
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?=$row["tenant_name"];?>"><?=$row["tenant_name"];?></option><?php
                    $i++;
                    }
                    ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td for="book_start_date">Start Date</td>
                    <td><input type="date" class="form-control" name="book_start_date" required></td>
                  </tr>
                   <tr>
                    <td for="book_end_date">End Date</td>
                    <td><input type="date" class="form-control" name="book_end_date" required></td>
                  </tr>
                   <tr>
                    <td for="book_tr_date">Transaction Date</td>
                    <td><input type="date" class="form-control" name="book_tr_date" value="<?php echo date('m/d/y');?>"required></td>
                  </tr>
                  <tr>
                <td></td>
                <td>
                  <button type="submit" name="submit">Save</button>
                  <button type="reset" >Reset</button>
                </td>
                </tr>
              </table>
                </form>
</body>
</html>