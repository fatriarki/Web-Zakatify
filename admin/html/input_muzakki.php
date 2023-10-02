<?php
include "functions.php";

if (isset($_POST['submit'])) {

  // cek data berhasil ditambahkan atau tidak
  if (tambah_muzakki($_POST) > 0) {
    header('location:data_muzakki.php');
  } else {
    echo "
    <script>
      alert('GAGAL!');
      document.location.href = 'input_muzakki.php';
    </script>
    ";
  }
}

?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Data - Muzakki</title>

  <meta name="description" content="" />

  <!-- Font Awesome  -->
  <script src="https://kit.fontawesome.com/e79081b769.js" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder"><img src="../../assets/img/logo.png" alt="" height="40" width="120"></span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
            <a href="admin.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <!-- Master Data -->
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
          </li>

          <li class="menu-item">
            <a href="data_mustahik.php" class="menu-link">
              <i class="fa-regular fa-lemon"></i>
              <span>⠀⠀</span>
              <div data-i18n="Misc">Mustahik</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="data_muzakki.php" class="menu-link">
              <i class="fa-brands fa-codepen"></i>
              <span>⠀⠀</span>
              <div data-i18n="Misc">Muzakki</div>
            </a>
          </li>

          <!-- Pengumpulan Zakat -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Pengumpulan Zakat Fitrah</span></li>
          <!-- Forms -->
          <li class="menu-item">
            <a href="data_pengumpulan.php" class="menu-link">
              <i class="fa-solid fa-hand-holding-dollar"></i>
              <span>⠀⠀</span>
              <div data-i18n="Form Elements">Data Pengumpulan</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
              <i class="fa-solid fa-file-pdf"></i>
              <span>⠀⠀</span>
              <div data-i18n="Form Layouts">Laporan Pengumpulan</div>
            </a>
          </li>

          <!-- Distribusi Zakat -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Distribusi Zakat Fitrah</span></li>

          <!-- Tables -->
          <li class="menu-item">
            <a href="distribusi_warga.php" class="menu-link">
              <i class="fa-solid fa-hand-holding-hand"></i>
              <span>⠀⠀</span>
              <div data-i18n="Tables">Distribusi Warga</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="distribusi_lainnya.php" class="menu-link">
              <i class="fa-solid fa-hand-holding-hand"></i>
              <span>⠀⠀</span>
              <div data-i18n="Tables">Distribusi Lainnya</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="tables-basic.html" class="menu-link">
              <i class="fa-solid fa-file-pdf"></i>
              <span>⠀⠀</span>
              <div data-i18n="Tables">Laporan Distribusi Zakat</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">


              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/mann.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="logout.php">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="data_muzakki.php">Data Muzakki</a> /</span> Input Data Muzakki</h4>

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">

              <!-- Basic with Icons -->
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Input Data Muzakki</h5>
                  </div>
                  <div class="card-body">
                    <form action="" method="POST">
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" required />
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="jumlah_tanggungan">Jumlah Tanggungan</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="jumlah_tanggungan" id="jumlah_tanggungan" class="form-control" placeholder="Masukkan Tanggungan" required />
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="keterangan">Keterangan</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <select class="form-select" id="exampleFormControlSelect1" name="keterangan" aria-label="Default select example">
                              <option hidden selected>Pilih keterangan</option>
                              <option value="Warga Tetap">Warga Tetap</option>
                              <option value="Warga Ngontrak">Warga Ngontrak</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row justify-content-end">
                        <div class="col-sm-10">
                          <button type="submit" name="submit" style="width:100px;" class="btn btn-sm btn-outline-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- / Content -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>