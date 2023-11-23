
<!-- session_start();
include "koneksi/koneksi.php";
$isLogin = $_SESSION['isLoginUser'] ?? "";
if ($isLogin != "logged") {
    header('location: index.php'); 

}
$id_role = $_SESSION['id_role'];
$id_user = $_SESSION['id_user'];
$nama = $_SESSION['nama'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
include "koneksi/aksi.php";
$aksi = new aksi();
$databus = $aksi->getpaket_bus();
if(isset($_POST['submitpesanbus'])){
    $aksi->pesanbus($id_user,$_POST['id_paketbus']);
    unset($_POST['submitpesanbus']);
} -->
<?php
include "../Client.php";
?>

<?php include 'header.php'; 

?>


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
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID Paket Bus</th>
                    <th scope="col">Nama Bus</th>
                    <th scope="col">Plat Bus</th>
                    <th scope="col">Rute Bus</th>
                    <th scope="col">Jadwal Bus</th>
                    <th scope="col">Harga Bus</th>
                    <th scope="col">Pesan</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $dataAllPaketBus = $client->read_all_paket_bus();
                    foreach($dataAllPaketBus as $row){ ?>
                        
                        <tr>
                            <th scope='row'><?= $row->id_paketbus?></th>
                            <td><?= $row->nama_bus?></td>
                            <td><?= $row->plat_bus?></td>
                            <td><?= $row->rute_bus?></td>
                            <td><?= $row->jadwal_bus?></td>
                            <td><?= $row->harga_bus?></td>
                        
                            <td>
                                <form action='../proses.php' method='post'>
                                    <input type='hidden' name='aksi' value='create_pesan_bus'>
                                    <input type='hidden' name='id_paketbus' value='<?= $row->id_paketbus?>'>
                                    <button type='submit' name='submitpesanbus' class='btn btn-primary'>Pesan</button>
                                </form>
                            </td>
                        
                        </tr>
                        
                        
                        

                   <?php }?> 
                    
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div >
          </div>

        </div>
      </div>
    </section>

  </main ><!-- End #main -->

    <a  href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
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