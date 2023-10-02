<?php
session_start();

include "admin/html/functions.php";

if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $data = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

  if (mysqli_num_rows($data)) {
    $_SESSION["login"] = true;
    header("Location: admin/html/admin.php");
  } else {
    echo "<script>
    alert('Username atau password salah! Silahkan coba kembali.');
    </script>";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tubes - 217006084</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- icon -->
  <script src="https://kit.fontawesome.com/e79081b769.js" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet">
</head>

<body>

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logoo.png" alt="">
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#" id="show-login">Login</a></li>
          <li><a href="#about">About</a></li>
        </ul>
      </nav>

      <!-- Pop Up Login-->
      <form method="POST" action="" class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
          <h2>Login</h2>
          <div class="form-element">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan Username">
          </div>
          <div class="form-element">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password">
          </div>
          <button type="submit" name="login" class="btn" onclick="validateForm()">Login</button>
        </div>
      </form>


      <!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to <span>Zakatify!</span></h2>
          <p>Jangan memandang zakat sebagai sebuah beban, melainkan suatu hak orang lain yang memang harus kita keluarkan untuk meraih keberkahan.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#box" class="btn-get-started">Get Started</a>
            <a href="https://youtu.be/KV2wVOKo6pk" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Apa Itu Zakat?</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/zakat.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div id="box" class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <img src="assets/img/dashboard.png" alt="" class="img-box">
              <h4 class="title"><a href="#" class="stretched-link">Dashboard</a></h4>
            </div>
          </div>

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <img src="assets/img/pengumpulan.png" alt="" class="img-box">
              <h4 class="title"><a href="" class="stretched-link">Pengumpulan Zakat</a></h4>
            </div>
          </div>

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <img src="assets/img/distribusi.png" alt="" class="img-box">
              <h4 class="title"><a href="" class="stretched-link">Distribusi Zakat</a></h4>
            </div>
          </div>

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <img src="assets/img/utilities.png" alt="" class="img-box">
              <h4 class="title"><a href="" class="stretched-link">Utility</a></h4>
            </div>
          </div>

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/login.js"></script>

</body>

</html>