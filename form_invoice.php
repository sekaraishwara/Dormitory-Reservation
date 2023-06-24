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
	
	include 'config.php';
// mengambil data barang dengan kode paling besar
	$query = mysqli_query($conn, "SELECT max(invoice_id) as kodeauto FROM invoice");
	$data1 = mysqli_fetch_array($query);
	$kodeKamar = $data1['kodeauto'];
 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kodeKamar, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
  
	$huruf = "INV";
	$kodeKamar = $huruf . sprintf("%03s", $urutan);
?>


      <div class="container">

        <div class="section-title">
          <h2>Fill The Form Below</h2>
        </div>
        <form action="invoice_act.php" method="POST">
                  <table>
                  <tr>
                    <td for="Invoice ID">Invoice ID</td>
                    <td><input type="text" class="form-control" id="invoiceID" name="invoice_id" value="<?php echo $kodeKamar ?>" required readonly></td>
                  </tr>
                  <tr>
                   <?php $result = mysqli_query($conn,"SELECT tenant_id FROM booking ORDER BY tenant_id");?>
                    <td>Tenant Name</td>
                    <td><select name="tenant_name" class="form-control" aria-describedby="emailHelp">
                    <?php
                      $i=0;
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?=$row["tenant_id"];?>"><?=$row["tenant_id"];?></option><?php
                    $i++;
                    }
                    ?>
                    </select></td>
                  </tr>
                  <tr>
                   <?php $result = mysqli_query($conn,"SELECT tenant_address FROM tenant ORDER BY tenant_address");?>
                    <td>Tenant Name</td>
                    <td><select name="tenant_address" class="form-control" aria-describedby="emailHelp">
                    <?php
                      $i=0;
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?=$row["tenant_address"];?>"><?=$row["tenant_address"];?></option><?php
                    $i++;
                    }
                    ?>
                    </select></td>
                  </tr>
                   <tr>
                    <td for="Phone">Phone</td>
                    <td><input type="number" class="form-control" name="tenant_phone" required></td>
                  </tr>
                   <tr>
                    <td for="City, ZIP Code">City, ZIP Code</td>
                    <td><input type="text" class="form-control" name="zip_code" required></td>
                  </tr>
                   <tr>
                    <td for="Invoice Date">Invoice Date</td>
                    <td><input type="date" class="form-control" name="date" required></td>
                  </tr>
                  <tr>
                   <?php $result = mysqli_query($conn,"SELECT room_id FROM booking ORDER BY room_id");?>
                   <td>Room Label</td>
                   <td><select name="room_label" class="form-control" aria-describedby="emailHelp">
                   <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?=$row["room_id"];?>"><?=$row["room_id"];?></option>
                    <?php
                     $i++;
                    }
                    ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td for="Month">Month</td>
                    <td><input type="text" class="form-control" name="month" required></td>
                  </tr>
                  <tr>
                   <?php $result = mysqli_query($conn,"SELECT room_monthly_price FROM room ORDER BY room_monthly_price");?>
                   <td>Price</td>
                   <td><select name="price" class="form-control" aria-describedby="emailHelp">
                   <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?=$row["room_monthly_price"];?>"><?=$row["room_monthly_price"];?></option>
                    <?php
                     $i++;
                    }
                    ?>
                    </select></td>
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