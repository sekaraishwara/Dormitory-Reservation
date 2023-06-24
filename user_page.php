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

      <h1 class="logo me-auto"><a href="user_page.html">Glaze</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="room_user.php">Room</a></li>
          <li><a class="nav-link scrollto" href="registration.php">Registration</a></li>
          <li><a class="nav-link scrollto" href="booking1.php">Booking</a></li>
          <li><a class="nav-link scrollto" href="form_invoice.php">Payments</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="logout.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Log out</span></a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
  <?php 
 
 session_start();
  
 if (!isset($_SESSION['username'])) {
     header("Location: mainpage.php");
 }
  
 ?>
    <div class="container">
      <h1>Hello <?php echo $_SESSION['username']; ?>, Welcome to Rental Room by Glaze</h1>
      <h2>There are various choices of rooms to suit your needs. Book a room now !</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">
          <!-- ======= Contact Section ======= -->
          <section id="contact" class="contact">
        <div class="container">
  
          <div class="section-title">
            <h2>Contact</h2>
          </div>
        </div>
  
        <div class="container">
          <div class="row mt-5">
  
            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>North Cikarang, Bekasi, West Java</p>
                </div>
  
                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>rentalroom@glaze.ac.id</p>
                </div>
  
                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55</p>
                </div>
  
              </div>
  
            </div>
      </section><!-- End Contact Section -->
  
    </main><!-- End #main -->
  
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <!-- Vendor JS Files -->
    <script src="vendor/purecounter/purecounter.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>
  
    <!-- Template Main JS File -->
    <script src="main.js"></script>
  
  </body>
  
  </html>