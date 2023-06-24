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

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Glaze</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="admin_page.php">Home</a></li>
          <li><a class="nav-link scrollto" href="room_admin.php">Room</a></li>
          <li><a class="nav-link scrollto" href="tenant_admin.php">tenant</a></li>
          <li><a class="nav-link scrollto" href="booking_admin.php">Booking</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="logout.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Log out</span></a>

    </div>
  </header><!-- End Header -->
   <!-- ======= Frequently Asked Questions Section ======= -->
   <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
        <h1> </h1>
        <h2> </h2>
        <h2> </h2>
          <h2>Booking Information</h2>
        </div>
<h2>  </h2>
    <table>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #7FC6D7;
            color: black;
        }
        .btn{
            margin-left: 25px;
  background: #1977cc;
  color: #fff;
  border-radius: 50px;
  padding: 8px 25px;
  white-space: nowrap;
  transition: 0.3s;
  font-size: 14px;
  display: inline-block;
        }
    </style>
        <tr>
            <th>Booking ID</th>
            <th>Room Label</th>
            <th>Tenant Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Transaction Date</th>
            <th>Change</th>
        </tr>
        <?php
                  include("config.php");
                            $sqlquery = "SELECT * FROM booking";
                            if ($result = mysqli_query($conn, $sqlquery)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
         <tr>
                    <td><?= $row['book_id'] ?></td>                    
                    <td><?= $row['room_id'] ?></td>                    
                    <td><?= $row['tenant_id'] ?></td>                    
                    <td><?= $row['book_start_date'] ?></td>                    
                    <td><?= $row['book_end_date'] ?></td>                    
                    <td><?= $row['book_tr_date'] ?></td>                                       
                    <td>
                      <button><a href="del3.php?book_id=<?= $row['book_id'] ?>" style="text-decoration:none" onclick="return confirm('Are you sure?');">Delete</a></button>
                    </td>
                  </tr>
                   <?php
                                }
                                mysqli_free_result($result);
                            }
                            mysqli_close($conn);
                            ?>
    </table>
        <div class="faq-list">
</body>
</html>