<?php
session_start();
include "koneksi/koneksi.php";
$isLogin = $_SESSION['isLoginUser'] ?? "";
if ($isLogin != "logged") {
  header('location: index.php');
}

$id_role = $_SESSION['id_role'];
if ($id_role == 3) {
  header('location: index.php');
}
$id_user = $_SESSION['id_user'];
$nama = $_SESSION['nama'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
include "koneksi/aksi.php";
$aksi = new aksi();
$databusall = $aksi->getbusall();
?>

    <?php include 'header.php'; 

    ?>

  <main id="main" class="main">

<div class="pagetitle">
  <h1>Data Bus</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="users-profile.php">Home</a></li>
      <li class="breadcrumb-item active">Data Bus</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Bus</h5>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">ID Bus</th>
                <th scope="col">Nama Bus</th>
                <th scope="col">Plat Bus</th>
                <th scope="col">Status Bus</th>
              </tr>
            </thead>
            <tbody>
                <?php
                foreach ($databusall as $key => $value) {
                    echo "
                        <tr>
                            <th scope='row'>{$value['id_bus']}</th>
                            <td>{$value['nama_bus']}</td>
                            <td>{$value['plat_bus']}</td>
                            <td>{$value['status_bus']}</td>
                    ";
                    ?>
                    <td align="center">
                        <a href="update_bus.php?id=<?php echo $value['id_bus'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i>Update</a>
                        <a href="koneksi/delete_bus.php?id=<?php echo $value['id_bus'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-fw fa-trash"></i>Delete</a>
                    </td>
                    
                <?php echo "</tr>";  }  ?>
                
                
              
            </tbody>
          </table>
          <a href="koneksi/nonactive_bus.php" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-fw fa-trash"></i>NON ACTIVE ALL</a>
          <!-- End Table with stripped rows -->

        </div >
      </div>

    </div>
  </div>
</section>

</main ><!-- End #main -->

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
</body>

</html>