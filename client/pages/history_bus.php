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

       
            <a href='history_bus_cetak.php' class='btn btn-sm btn-success'><i class='fas fa-fw fa-trash'></i>Cetak History</a>
          

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


</body>

</html>