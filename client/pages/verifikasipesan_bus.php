
<!-- session_start();
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
$datapesanbusall = $aksi->getpesanbusall();
if(isset($_POST['Confirm'])){
  $aksi->confirmbus($_POST['id_pesanbus']);
  unset($_POST['Confirm']);
  header("Refresh:1;");
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
                    $dataAllPesanBus = $client->read_all_pesan_bus();
                    foreach ($dataAllPesanBus as $row) {?>
                        
                            <tr>
                                <th scope='row'><?=$row->id_pesanbus?></th>
                                <td><?=$row->id_paketbus?></td>
                                <td><?=$row->nama_bus?></td>
                                <td><?=$row->rute_bus?></td>
                                <td><?=$row->jadwal_bus?></td>
                                <td><?=$row->harga_bus?></td>
                                <td><?=$row->status_pesanbus?></td>

                     
                    <?php
                        if ($row->status_pesanbus == "PROSES VERIFIKASI") {?>
                        
                                <form action='../proses.php?aksi=confirm&id_pesanbus=<?=$row->id_pesanbus?>' enctype='multipart/form-data'>
                                  <input type="hidden" name='aksi' value='confirm'>
                                <td><a href='<?=$row->bukti_bayarbus?>' target='_blank'>Read Bukti</a></td>

                                <td>
                                    <input type='hidden' name='id_pesanbus' value='<?=$row->id_pesanbus?>'>
                                    <input type='submit' value='Confirm' name='Confirm' class='btn btn-primary' >
                                </td>
                                </form>
                          <?php
                        }else if ($row->status_pesanbus == "BELUM BAYAR") {
                            echo "
                                <td>  
                                    USER BELUM BAYAR!
                                </td>
                            ";

                        } else if ($row->status_pesanbus== "SUDAH BAYAR") {
                            echo "
                                <td>
                                    PEMBAYARAN TELAH DI KONFIRMASI!
                                </td>
                            ";
                        }
                    
                        echo "</tr>";
                    }
                    
                    ?>
                  
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