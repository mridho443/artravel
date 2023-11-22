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
if (isset($_POST['submittambahadmin'])) {
  $aksi->tambah_admin();
  unset($_POST['submittambahadmin']);
}
$id_user = $_GET['id'];
  $query = "SELECT * FROM user where id_user = '$id_user'";
  $result = $koneksi->query($query);
  $data = $result->fetch_assoc();
?>
<?php include 'header.php'; 

?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="users-profile.php">Home</a></li>
          <li class="breadcrumb-item active">Update Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section ">
      <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-body">
              <h5 class="card-title">Data Admin</h5>
              <form action="koneksi/update_admin.php" method="post">
                <div id="input-container2">
                  <div class="row">
                    <!-- General Form Elements -->

                    <div class="col-3 mb-3">
                      <label for="inputText" class="col-sm-12 col-form-label">ID User</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_user" value="<?php echo $data['id_user'] ?>" readonly>
                      </div>
                    </div>

                    <div class="col-3 mb-3">
                      <label for="inputText" class="col-sm-12 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="username"  value="<?php echo $data['username'] ?>">
                      </div>
                    </div>

                    <div class="col-3 mb-3">
                      <label for="inputEmail" class="col-sm-12 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" name="email"  value="<?php echo $data['email'] ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

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
</body>

</html>