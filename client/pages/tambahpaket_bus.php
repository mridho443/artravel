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
if (isset($_POST['submittambahpaketbus'])) {
    $aksi->tambahpaket_bus();
    unset($_POST['submittambahpaketbus']);
}
?>
<?php include 'header.php'; 

?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah Paket Bus</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="users-profile.php">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Paket Bus</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">Data Paket Bus</h5>
                            <form action="tambahpaket_bus.php" method="post">
                                <div id="input-container">
                                    <div class="row">
                                        <!-- General Form Elements -->

                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">Bus</label>
                                            <div class="col-sm-10">
                                            <select class="form-select" id="bus" name="id_bus[]" required>
                                                <option selected hidden value=""></option>
                                                <?php
                                                include "koneksi/koneksi.php";

                                                $sql = "SELECT * FROM bus";

                                                $result = $koneksi->query($sql);
                                                $data = array();

                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while ($row = $result->fetch_assoc()) {

                                                        $data[] = array(
                                                            'id_bus' => $row["id_bus"],
                                                            'nama_bus' => $row["nama_bus"],
                                                        );
                                                    }
                                                } else {
                                                    die("Can't get data User from database");
                                                }

                                                $koneksi->close();

                                                foreach ($data as $value){
                                                    echo "<option value='{$value['id_bus']}'>{$value['nama_bus']}</option>";
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">Rute Bus</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="rute_bus[]">
                                            </div>
                                        </div>
                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">Jadwal Bus</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="jadwal_bus[]">
                                            </div>
                                        </div>
                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">Harga Bus</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="harga_bus[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" name="submittambahpaketbus" class="btn btn-primary">Submit Form</button>
                                        <button type="button" id="add-input" class="btn btn-primary">Add new</button>
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

    <script>
        // JavaScript code to dynamically add input fields
        const addInputButton = document.getElementById('add-input');
        const inputContainer = document.getElementById('input-container');

        addInputButton.addEventListener('click', function () {
            const newRow = document.createElement('div');
            newRow.className = 'row';

            newRow.innerHTML = `
                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">Bus</label>
                                            <div class="col-sm-10">
                                            <select class="form-select" id="bus" name="id_bus[]" required>
                                                <option selected hidden value=""></option>
                                                <?php
                                                include "koneksi/koneksi.php";

                                                $sql = "SELECT * FROM bus";

                                                $result = $koneksi->query($sql);
                                                $data = array();

                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while ($row = $result->fetch_assoc()) {

                                                        $data[] = array(
                                                            'id_bus' => $row["id_bus"],
                                                            'nama_bus' => $row["nama_bus"],
                                                        );
                                                    }
                                                } else {
                                                    die("Can't get data User from database");
                                                }

                                                $koneksi->close();

                                                foreach ($data as $value){
                                                    echo "<option value='{$value['id_bus']}'>{$value['nama_bus']}</option>";
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">Rute Bus</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="rute_bus[]">
                                            </div>
                                        </div>
                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">Jadwal Bus</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="jadwal_bus[]">
                                            </div>
                                        </div>
                                        <div class="col-3 mb-3">
                                            <label for="inputText" class="col-sm-12 col-form-label">Harga Bus</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="harga_bus[]">
                                            </div>
                                        </div>
        `;
            inputContainer.appendChild(newRow);
        });
    </script>


</body>

</html>