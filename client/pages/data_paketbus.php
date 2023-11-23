<?php
include "../Client.php";
?>


<?php include 'header.php';

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data paket Bus</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="users-profile.php">Home</a></li>
        <li class="breadcrumb-item active">Data paket Bus</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data paket Bus</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID Paket Bus</th>
                  <th scope="col">ID Bus</th>
                  <th scope="col">Rute Bus</th>
                  <th scope="col">Jadwal Bus</th>
                  <th scope="col">Harga Bus</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $dataPaketBusAll = $client->read_all_paket_bus();
                foreach ($dataPaketBusAll as $row) { ?>

                  <tr>
                    <th scope='row'>
                      <?= $row->id_paketbus ?>
                    </th>
                    <td>
                      <?= $row->id_bus ?>
                    </td>
                    <td>
                      <?= $row->rute_bus ?>
                    </td>
                    <td>
                      <?= $row->jadwal_bus ?>
                    </td>
                    <td>
                      <?= $row->harga_bus ?>
                    </td>



                    <td align="center">
                      <a href="update_bus.php?id_paketbus=<?= $row->id_paketbus ?>" class="btn btn-sm btn-warning"><i
                          class="fas fa-fw fa-edit"></i>Update</a>
                      <a href="../proses.php?aksi=delete_paket_bus&id_paketbus=<?= $row->id_paketbus ?>" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure?')"><i class="fas fa-fw fa-trash"></i>Delete</a>
                    </td>

                    <?php echo "</tr>";
                } ?>



              </tbody>
            </table>
            <!-- End Table with stripped rows -->

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