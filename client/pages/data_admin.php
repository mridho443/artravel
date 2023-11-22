<?php
include "../Client.php";
?>
<?php include 'header.php'; ?>


<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="users-profile.php">Home</a></li>
        <li class="breadcrumb-item active">Data Admin</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Admin</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID User</th>
                  <th scope="col">Username</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $dataAdminAll = $client->read_all_admin();

                foreach ($dataAdminAll as $row) { ?>

                  <tr>
                    <td>
                      <?= $row->id_user ?>
                    </td>
                    <td>
                      <?= $row->username ?>
                    </td>
                    <td>
                      <?= $row->nama ?>
                    </td>
                    <td>
                      <?= $row->email ?>
                    </td>



                    <td align="center">
                      <a href="update_admin.php?id_user=<?= $row->id_user ?>" class="btn btn-sm btn-warning"><i
                          class="fas fa-fw fa-edit"></i>Update</a>
                      <a href="../proses.php?aksi=delete_admin&id_user=<?= $row->id_user ?>" class="btn btn-sm btn-danger"
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

<?php
unset($client);
?>