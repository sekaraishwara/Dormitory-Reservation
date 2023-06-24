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
  $tenant_id = $_POST['tenant_id'];
  $tenant_name = $_POST['tenant_name'];
  $tenant_address = $_POST['tenant_address'];
  $tenant_ktp_no = $_POST['tenant_ktp_no'];
  $tenant_phone= $_POST['tenant_phone'];
  $tenant_email = $_POST['tenant_email'];
  $tenant_emergcp = $_POST['tenant_emergcp'];
  $tenant_emergcp_phone = $_POST['tenant_emergcp_phone'];
  $tenant_emergcp_email = $_POST['tenant_emergcp_email'];
  $tenant_bankaccount = $_POST['tenant_bankaccount'];
  $tenant_bankaccount_no = $_POST['tenant_bankaccount_no'];

 $sql = "UPDATE tenant SET tenant_name ='$tenant_name', tenant_address ='$tenant_address', 
 tenant_ktp_no ='$tenant_ktp_no', tenant_phone ='$tenant_phone', tenant_email ='$tenant_email', tenant_emergcp ='$tenant_emergcp',
 tenant_emergcp_phone ='$tenant_emergcp_phone', tenant_emergcp_email ='$tenant_emergcp_email', tenant_bankaccount ='$tenant_bankaccount',
 tenant_bankaccount_no ='$tenant_bankaccount_no' WHERE tenant_id = '$tenant_id'";

  $act =mysqli_query($conn, $sql);

  if($act)
  {
    header('location:tenant_admin.php');
  }else {
    echo "<script>
    alert('Update Failed!!');
    window.location.href='tenant_admin.php';
    </script>";
  }

}

 ?>

      <div class="container">

        <div class="section-title">
          <h2>Fill The Form Below</h2>
        </div>
        <form action="" method="POST">
        
                  <table>
                  <tr>
                    <td for="ID">ID</label></td>
                    <td><input type="text" class="form-control" name="tenant_id"  required></td>
                  </tr>
                   <tr>
                    <td><label for="Name">Name</td>
                    <td><input type="text" class="form-control" name="tenant_name" required></td>
                  </tr>
                   <tr>
                    <td><label for="Address">Address</td>
                    <td><input type="text" class="form-control" name="tenant_address" required></td>
                  </tr>
                   <tr>
                    <td><label for="KTP Number">KTP Number</td>
                    <td><input type="number" class="form-control" name="tenant_ktp_no" required></td>
                  </tr>
                  <tr>
                    <td for="Phone">Phone</td>
                    <td><input type="number" class="form-control" name="tenant_phone" required></td>
                  </tr>
                  <tr>
                    <td for="Email">Email</td>
                  <td><input type="text" class="form-control" name="tenant_email" required></td>
                  </tr>
                  <tr>
                    <td for="Emergcp">Emergcp</td>
                    <td><input type="text" class="form-control" name="tenant_emergcp" required></td>
                  </tr>
                  <tr>
                    <td for="Emergcp Phone">Emergcp Phone</td>
                    <td><input type="number" class="form-control" name="tenant_emergcp_phone" required></td>
                  </tr>
                  <tr>
                    <td for="Emergcp Email">Emergcp Email</td>
                    <td><input type="text" class="form-control" name="tenant_emergcp_email" required></td>
                  </tr>
                  <tr>
                    <td for="Bank Account">Bank Account</td>
                    <td><input type="text" class="form-control" name="tenant_bankaccount" required></td>
                  </tr>
                  <tr>
                    <td for="Bank Account Number">Bank Account Number</td>
                    <td><input type="number" class="form-control" name="tenant_bankaccount_no" required></td>
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