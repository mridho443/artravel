<?php
include "../Client.php";
?>
<?php include 'header.php'; 
?>

<?php
$row = $client->read_bus($_GET['id_bus']);
?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Update Bus</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="users-profile.php">Home</a></li>
                    <li class="breadcrumb-item active">Update bus</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">Update Bus</h5>
                            <form action="../proses.php" method="post">
                            <input type="hidden" name="aksi" value="update_bus">
                                <div id="input-container">
                                    <div class="row">
                                        <!-- General Form Elements -->

                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">ID Bus</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="id_bus" value="<?= $row->id_bus ?>" readonly>
                                            </div>
                                        </div>
                                       
                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">Nama Bus</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_bus" value="<?= $row->nama_bus ?>">
                                            </div>
                                        </div>

                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">Plat Bus</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="plat_bus" value="<?= $row->plat_bus ?>">
                                            </div>
                                        </div>
                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">Status Bus</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="status_bus" value="<?= $row->status_bus ?>">
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