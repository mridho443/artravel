<?php
include "../Client.php";
?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile - AR Travel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
</head>



<body>
  <!-- ======= Header ======= -->

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">AR travel</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php echo $_SESSION['username'] ?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>
                <?php echo $_SESSION['username'] ?>
              </h6>
              <span>

              </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../proses.php?aksi=logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-heading">Pages</li>

      <!-- START Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <?php
      if ($_SESSION['id_role'] == '1') {
        echo '
      <li class="nav-item">
        <a class="nav-link collapsed" href="tambah_admin.php">
          <i class="bi bi-person-plus"></i>
          <span>Tambah Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="data_admin.php">
          <i class="bi bi-person-plus"></i>
          <span>Data Admin</span>
        </a>
      </li>
      ';
      }
      ?>

      <?php
      if ($_SESSION['id_role'] == '1' || $_SESSION['id_role'] == '2') {
        echo '
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tambah_bus_hotel_paket" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clipboard-plus"></i><span>Tambah Bus</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tambah_bus_hotel_paket" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tambah_bus.php">
              <i class="bi bi-circle"></i><span>Tambah Bus</span>
            </a>
          </li>

        </ul>
      </li><!-- End Tambah bus, hotel dan Paket Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#data_bus_hotel_paket" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clipboard-plus"></i><span>Data Bus</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="data_bus_hotel_paket" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="data_bus.php">
              <i class="bi bi-circle"></i><span>Data Bus</span>
            </a>
          </li>

        </ul>
      </li><!-- End Data bus, hotel dan Paket Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tambahpaket_bus_hotel_paket" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clipboard-plus"></i><span>Tambah Paket Bus</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tambahpaket_bus_hotel_paket" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tambahpaket_bus.php">
              <i class="bi bi-circle"></i><span>Tambah Paket Bus</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tambah bus, hotel dan Paket Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#datapaket_bus_hotel_paket" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clipboard-plus"></i><span>Data Paket Bus</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="datapaket_bus_hotel_paket" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="data_paketbus.php">
              <i class="bi bi-circle"></i><span>Data Paket Bus</span>
            </a>
          </li>

        </ul>
      </li><!-- End data bus, hotel dan Paket Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#verifikasipesan_bus_hotel_paket" data-bs-toggle="collapse"
          href="#">
          <i class="bi bi-clipboard-check"></i><span>Verifikasi Bus</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="verifikasipesan_bus_hotel_paket" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="verifikasipesan_bus.php">
              <i class="bi bi-circle"></i><span>Verifikasi Pesan Bus</span>
            </a>
          </li>

        </ul>
      </li><!-- End Tambah bus, hotel dan Paket Nav -->
      ';
      }
      ?>
      <?php
      if ($_SESSION['id_role'] == 3) {
        echo '
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pesan_bus_hotel_paket" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart-plus"></i><span>Pesan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pesan_bus_hotel_paket" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="pesan_bus.php">
              <i class="bi bi-circle"></i><span>Pesan Bus</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End pesan bus, hotel dan Paket Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#log_bus_hotel_paket" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart-plus"></i><span>History Pemesanan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="log_bus_hotel_paket" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="history_bus.php">
              <i class="bi bi-circle"></i><span>History Bus</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End pesan bus, hotel dan Paket Nav -->
      ';
      }

      ?>
    </ul>

  </aside><!-- End Sidebar-->



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Pesan Bus</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="users-profile.php">Home</a></li>
        <li class="breadcrumb-item active">Pesan Bus</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pesan Bus</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable" id="example">
              <thead>
                <tr>
                  <th scope="col">ID Pesan Bus</th>
                  <th scope="col">ID Paket Bus</th>
                  <th scope="col">Nama Bus</th>
                  <th scope="col">Rute Bus</th>
                  <th scope="col">Jadwal Bus</th>
                  <th scope="col">Harga Bus</th>
                  <th scope="col">Status Pesan Bus</th>
                  <th scope="col">Bukti Bayar Bus</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $dataPesanBus = $client->read_pesan_bus($_SESSION['id_user']);
                foreach ($dataPesanBus as $row) { ?>

                  <tr>
                    <th scope='row'><?= $row->id_pesanbus ?></th>
                    <td><?= $row->id_paketbus ?></td>
                    <td><?= $row->nama_bus ?></td>
                    <td><?= $row->rute_bus ?></td>
                    <td><?= $row->jadwal_bus ?></td>
                    <td><?= $row->harga_bus ?></td>
                    <td><?= $row->status_pesanbus ?></td>

                    <?php

                    if ($row->status_pesanbus == "BELUM BAYAR") { ?>

                      <form  action='../proses.php' method='post' enctype='multipart/form-data'>
                        
                        <td>
                          <input type='text' name='bukti_bayarbus'>
                        </td>
                        <td>
                        <input type="hidden" name='aksi' value="update_bukti_pesan_bus">
                          <input type='hidden' name='id_pesanbus' value='<?=$row->id_pesanbus?>'>
                          <input type='submit' value='upload' name='submituploadbukti' class='btn btn-primary'>
                        </td>
                      </form>
                    <?php
                    } else if ($row->status_pesanbus== "PROSES VERIFIKASI") {?>
                     
                                <td>
                                    MOHON TUNGGU, SEDANG DALAM PROSES VERIFIKASI!
                                </td>
                                <td>
                                <a href='../proses.php?aksi=delete_pesanbus&id_pesanbus=<?=$row->id_pesanbus?>' class='btn btn-sm btn-danger'><i class='fas fa-fw fa-trash'></i>Delete</a>
                                </td>
                            <?php


                    } else if ($row->status_pesanbus == "SUDAH BAYAR") {
                      echo "
                                <td>
                                    PEMBAYARAN BERHASIL, SELAMAT MENIKMATI LIBURAN ANDA!
                                </td>
                            ";
                    }

                    echo "</tr>
                        
                         ";
                }

                ?>
                  <?php
                  echo "  </tbody>
                          </table>
                         
              <!-- End Table with stripped rows -->
              ";
                  ?>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>


<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>





</body>

</html>