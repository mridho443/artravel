<?php
use LDAP\Result;
class aksi
{
    function edit_profile()
    {
        include "koneksi.php";
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $name = mysqli_real_escape_string($koneksi, $_POST['name']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);

        $query = "UPDATE user SET nama='$name', email='$email' WHERE username='$username'";
        $result = mysqli_query($koneksi, $query);
        if ($result) {
            echo "
                <script>
                    window.location.href = ('./users-profile.php');
                </script>
            ";
            $_SESSION['nama'] = $_POST['name'];
            $_SESSION['email'] = $_POST['email'];

        } else {
            $duar = mysqli_error($koneksi);
            echo "
                <script>
                    alert('Gagal mengubah data: {$duar}');
                    window.location.href = ('./users-profile.php');
                </script>
            ";
        }
        $koneksi->close();

    }

    function ubahpass($id_user){
        include 'koneksi.php';
        $password = md5($_POST['newpassword']);
        $query = "UPDATE user SET password='$password' WHERE id_user='$id_user'";
        $result = $koneksi->query($query);
    }

    function tambah_admin()
    {
        include 'koneksi.php';
        $usernames = $_POST['username'];
        $passwords = $_POST['password'];
        $namas = $_POST['nama'];
        $emails = $_POST['email'];
        for ($i = 0; $i < count($namas); $i++) {
            $username = $usernames[$i];
            $password = md5($passwords[$i]);
            $nama = $namas[$i];
            $email = $emails[$i];
            $query1 = "INSERT INTO user (username,password,nama,email) VALUES ('$username','$password','$nama','$email')";
            if ($koneksi->query($query1) == true) {
                $query2 = "SELECT * FROM user where username = '$username'";
                $result2 = $koneksi->query($query2);
                $data = $result2->fetch_array();
                $id_user = $data['id_user'];
                $query3 = "INSERT INTO user_role(id_user, id_role) VALUES ($id_user,2)";
                $result3 = $koneksi->query($query3);
                
            }

        }
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
        $koneksi->close();
    }

    function tambah_bus()
    {
        include 'koneksi.php';
        $nama_buss = $_POST['nama_bus'];
        $plat_buss = $_POST['plat_bus'];
        $status_buss = $_POST['status_bus'];
        for ($i = 0; $i < count($nama_buss); $i++) {
            $nama_bus = $nama_buss[$i];
            $plat_bus = $plat_buss[$i];
            $status_bus = $status_buss[$i];
            $query1 = "INSERT INTO bus (nama_bus,plat_bus,status_bus) VALUES ('$nama_bus','$plat_bus','$status_bus')";
            $result1 = $koneksi->query($query1);
            
        }
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
        $koneksi->close();
    }

    function tambah_hotel()
    {
        include 'koneksi.php';
        $nama_hotels = $_POST['nama_hotel'];
        $alamat_hotels = $_POST['alamat_hotel'];
        $status_hotels = $_POST['status_hotel'];
        for ($i = 0; $i < count($nama_hotels); $i++) {
            $nama_hotel = $nama_hotels[$i];
            $alamat_hotel = $alamat_hotels[$i];
            $status_hotel = $status_hotels[$i];
            $query1 = "INSERT INTO hotel (nama_hotel,alamat_hotel,status_hotel) VALUES ('$nama_hotel','$alamat_hotel','$status_hotel')";
            $result1 = $koneksi->query($query1);
        }
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
        $koneksi->close();
    }

    function tambahpaket_bus()
    {
        include 'koneksi.php';
        $id_buss = $_POST['id_bus'];
        $rute_buss = $_POST['rute_bus'];
        $jadwal_buss = $_POST['jadwal_bus'];
        $harga_buss = $_POST['harga_bus'];
        for ($i = 0; $i < count($id_buss); $i++) {
            $id_bus = $id_buss[$i];
            $rute_bus = $rute_buss[$i];
            $jadwal_bus = $jadwal_buss[$i];
            $harga_bus = $harga_buss[$i];
            $query1 = "INSERT INTO paket_bus (id_bus,rute_bus,jadwal_bus,harga_bus) VALUES ('$id_bus','$rute_bus','$jadwal_bus','$harga_bus')";
            $result1 = $koneksi->query($query1);
        }
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
        $koneksi->close();

    }

    function tambahpaket_hotel()
    {
        include 'koneksi.php';
        $id_hotels = $_POST['id_hotel'];
        $jadwal_hotels = $_POST['jadwal_hotel'];
        $harga_hotels = $_POST['harga_hotel'];
        for ($i = 0; $i < count($id_hotels); $i++) {
            $id_hotel = $id_hotels[$i];
            $jadwal_hotel = $jadwal_hotels[$i];
            $harga_hotel = $harga_hotels[$i];
            $query1 = "INSERT INTO paket_hotel (id_hotel,jadwal_hotel,harga_hotel) VALUES ('$id_hotel','$jadwal_hotel','$harga_hotel')";
            $result1 = $koneksi->query($query1);
        }
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
        $koneksi->close();

    }

    function tambahpaket_kombo()
    {
        include 'koneksi.php';
        $id_buss = $_POST['id_bus'];
        $id_hotels = $_POST['id_hotel'];
        $rute_kombos = $_POST['rute_kombo'];
        $jadwal_kombos = $_POST['jadwal_kombo'];
        $harga_kombos = $_POST['harga_kombo'];
        for ($i = 0; $i < count($id_buss); $i++) {
            $id_bus = $id_buss[$i];
            $id_hotel = $id_hotels[$i];
            $rute_kombo = $rute_kombos[$i];
            $jadwal_kombo = $jadwal_kombos[$i];
            $harga_kombo = $harga_kombos[$i];
            $query1 = "INSERT INTO paket_kombo (id_bus,id_hotel,rute_kombo,jadwal_kombo,harga_kombo) VALUES ('$id_bus','$id_hotel','$rute_kombo','$jadwal_kombo','$harga_kombo')";
            $result1 = $koneksi->query($query1);
        }
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
        $koneksi->close();

    }

    function getpaket_bus()
    {
        include 'koneksi.php';

        $query1 = "SELECT id_paketbus, nama_bus, plat_bus, rute_bus, jadwal_bus, harga_bus from paket_bus JOIN bus ON paket_bus.id_bus = bus.id_bus";
        $result1 = $koneksi->query($query1);
        $data = array();
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'id_paketbus' => $row["id_paketbus"],
                    'nama_bus' => $row["nama_bus"],
                    'plat_bus' => $row["plat_bus"],
                    'rute_bus' => $row["rute_bus"],
                    'jadwal_bus' => $row["jadwal_bus"],
                    'harga_bus' => $row["harga_bus"],

                );
            }
        } else {
            die("Data Kosong/Gagal");
        }
        $koneksi->close();
        return $data;
    }

    function pesanbus($id_user, $id_paketbus)
    {
        include 'koneksi.php';

        $query1 = "INSERT INTO pesan_bus (id_user,id_paketbus,status_pesanbus) VALUES ('$id_user','$id_paketbus','BELUM BAYAR')";
        $result1 = $koneksi->query($query1);
        $koneksi->close();
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
    }

    function getpaket_hotel()
    {
        include 'koneksi.php';

        $query1 = "SELECT id_pakethotel, nama_hotel,alamat_hotel, jadwal_hotel, harga_hotel from paket_hotel JOIN hotel ON paket_hotel.id_hotel = hotel.id_hotel";
        $result1 = $koneksi->query($query1);
        $data = array();
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'id_pakethotel' => $row["id_pakethotel"],
                    'nama_hotel' => $row["nama_hotel"],
                    'alamat_hotel' => $row["alamat_hotel"],
                    'jadwal_hotel' => $row["jadwal_hotel"],
                    'harga_hotel' => $row["harga_hotel"],
                );
            }
        } else {
            die("Data Kosong/Gagal");
        }
        $koneksi->close();
        return $data;
    }

    function pesanhotel($id_user, $id_pakethotel)
    {
        include 'koneksi.php';

        $query1 = "INSERT INTO pesan_hotel (id_user,id_pakethotel,status_pesanhotel) VALUES ('$id_user','$id_pakethotel','BELUM BAYAR')";
        $result1 = $koneksi->query($query1);
        $koneksi->close();
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
    }

    function getpaket_kombo()
    {
        include 'koneksi.php';

        $query1 = "SELECT id_paketkombo, nama_bus,nama_hotel,rute_kombo, jadwal_kombo, harga_kombo from paket_kombo JOIN bus ON paket_kombo.id_bus = bus.id_bus JOIN hotel ON paket_kombo.id_hotel = hotel.id_hotel";
        $result1 = $koneksi->query($query1);
        $data = array();
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'id_paketkombo' => $row["id_paketkombo"],
                    'nama_bus' => $row["nama_bus"],
                    'nama_hotel' => $row["nama_hotel"],
                    'rute_kombo' => $row["rute_kombo"],
                    'jadwal_kombo' => $row["jadwal_kombo"],
                    'harga_kombo' => $row["harga_kombo"],
                );
            }
        } else {
            die("Data Kosong/Gagal");
        }
        $koneksi->close();
        return $data;
    }

    function pesankombo($id_user, $id_paketkombo)
    {
        include 'koneksi.php';

        $query1 = "INSERT INTO pesan_kombo (id_user,id_paketkombo,status_pesankombo) VALUES ('$id_user','$id_paketkombo','BELUM BAYAR')";
        $result1 = $koneksi->query($query1);
        $koneksi->close();
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
    }

    function getpesanbus($id_user)
    {
        include 'koneksi.php';

        $query1 = "SELECT pesan_bus.id_pesanbus, pesan_bus.id_paketbus, rute_bus, jadwal_bus, harga_bus, status_pesanbus, bukti_bayarbus, nama_bus FROM pesan_bus
            JOIN paket_bus ON pesan_bus.id_paketbus = paket_bus.id_paketbus
            JOIN bus ON bus.id_bus = paket_bus.id_bus
            WHERE id_user = '$id_user'";

        $result1 = $koneksi->query($query1);
        $data = array();
            while ($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'id_pesanbus' => $row["id_pesanbus"],
                    'id_paketbus' => $row["id_paketbus"],
                    'nama_bus' => $row["nama_bus"],
                    'rute_bus' => $row["rute_bus"],
                    'jadwal_bus' => $row["jadwal_bus"],
                    'harga_bus' => $row["harga_bus"],
                    'status_pesanbus' => $row["status_pesanbus"],
                    'bukti_bayarbus' => $row["bukti_bayarbus"],
                );
            }
        
        $koneksi->close();
        return $data;
    }

    function uploadbuktibus($id_pesanbus) {
        include 'koneksi.php';
        $file_size = $_FILES["file"]["size"];
        $file_type = $_FILES["file"]["type"];
        $file_name = $_FILES["file"]["name"];
        if($file_size <= 2000000){
        $file_content = file_get_contents($_FILES["file"]["tmp_name"]);
        $encoded_file_content = $file_content;
        $status_pesanbus = "PROSES VERIFIKASI";
        $query1 = "UPDATE pesan_bus SET bukti_bayarbus = ?, status_pesanbus = ?, file_type = '$file_type', file_name = '$file_name', file_size = '$file_size' WHERE id_pesanbus = ?";
        $stmt = $koneksi->prepare($query1);
        $stmt->bind_param("ssi", $encoded_file_content, $status_pesanbus, $id_pesanbus);
        $stmt->execute();
        $stmt->close();
        $koneksi->close();
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
        }else{
            echo "
                <script>
                    alert('Unggahan Maximal 2MB');
                    window.location.href = ('./history_bus.php');
                </script>
            ";
        }
    }

    function getpesanhotel($id_user)
    {
        include 'koneksi.php';

        $query1 = "SELECT pesan_hotel.id_pesanhotel, pesan_hotel.id_pakethotel, nama_hotel, jadwal_hotel, harga_hotel, status_pesanhotel, bukti_bayarhotel FROM pesan_hotel 
            JOIN paket_hotel ON pesan_hotel.id_pakethotel = paket_hotel.id_pakethotel 
            JOIN hotel ON hotel.id_hotel = paket_hotel.id_hotel 
            WHERE id_user ='$id_user'";

        $result1 = $koneksi->query($query1);
        $data = array();
            while ($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'id_pesanhotel' => $row["id_pesanhotel"],
                    'id_pakethotel' => $row["id_pakethotel"],
                    'nama_hotel' => $row["nama_hotel"],
                    'jadwal_hotel' => $row["jadwal_hotel"],
                    'harga_hotel' => $row["harga_hotel"],
                    'status_pesanhotel' => $row["status_pesanhotel"],
                    'bukti_bayarhotel' => $row["bukti_bayarhotel"],
                );
            }
        
        $koneksi->close();
        return $data;
    }

    function uploadbuktihotel($id_pesanhotel) {
        include 'koneksi.php';
        $file_size = $_FILES["file"]["size"];
        $file_type = $_FILES["file"]["type"];
        $file_name = $_FILES["file"]["name"];
        if($file_size <= 2000000){
        $file_content = file_get_contents($_FILES["file"]["tmp_name"]);
        $encoded_file_content = $file_content;
        $status_pesanhotel = "PROSES VERIFIKASI";
        $query1 = "UPDATE pesan_hotel SET bukti_bayarhotel = ?, status_pesanhotel = ?, file_type = '$file_type', file_name = '$file_name', file_size = '$file_size' WHERE id_pesanhotel = ?";
        $stmt = $koneksi->prepare($query1);
        $stmt->bind_param("ssi", $encoded_file_content, $status_pesanhotel, $id_pesanhotel);
        $stmt->execute();
        $stmt->close();
        $koneksi->close();
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
        }else{
            echo "
                <script>
                    alert('Unggahan Maximal 2MB');
                    window.location.href = ('./history_hotel.php');
                </script>
            ";
        }
    }

    function getpesankombo($id_user)
    {
        include 'koneksi.php';

        $query1 = "SELECT pesan_kombo.id_pesankombo, pesan_kombo.id_paketkombo, nama_bus, nama_hotel, rute_kombo, jadwal_kombo, harga_kombo, status_pesankombo, bukti_bayarkombo FROM pesan_kombo
            JOIN paket_kombo ON pesan_kombo.id_paketkombo = paket_kombo.id_paketkombo
            JOIN bus ON bus.id_bus = paket_kombo.id_bus
            JOIN hotel ON hotel.id_hotel = paket_kombo.id_hotel
            WHERE id_user = '$id_user'";

        $result1 = $koneksi->query($query1);
        $data = array();
            while ($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'id_pesankombo' => $row["id_pesankombo"],
                    'id_paketkombo' => $row["id_paketkombo"],
                    'nama_bus' => $row["nama_bus"],
                    'nama_hotel' => $row["nama_hotel"],
                    'rute_kombo' => $row["rute_kombo"],
                    'jadwal_kombo' => $row["jadwal_kombo"],
                    'harga_kombo' => $row["harga_kombo"],
                    'status_pesankombo' => $row["status_pesankombo"],
                    'bukti_bayarkombo' => $row["bukti_bayarkombo"],
                );
            }
        
        $koneksi->close();
        return $data;
    }

    function uploadbuktikombo($id_pesankombo) {
        include 'koneksi.php';
        $file_size = $_FILES["file"]["size"];
        $file_type = $_FILES["file"]["type"];
        $file_name = $_FILES["file"]["name"];
        if($file_size <= 2000000){
        $file_content = file_get_contents($_FILES["file"]["tmp_name"]);
        $encoded_file_content = $file_content;
        $status_pesankombo = "PROSES VERIFIKASI";
        $query1 = "UPDATE pesan_kombo SET bukti_bayarkombo = ?, status_pesankombo = ?, file_type = '$file_type', file_name = '$file_name', file_size = '$file_size' WHERE id_pesankombo = ?";
        $stmt = $koneksi->prepare($query1);
        $stmt->bind_param("ssi", $encoded_file_content, $status_pesankombo, $id_pesankombo);
        $stmt->execute();
        $stmt->close();
        $koneksi->close();
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
        }else{
            echo "
                <script>
                    alert('Unggahan Maximal 2MB');
                    window.location.href = ('./history_kombo.php');
                </script>
            ";
        }
    }

    function getpesanbusall()
    {
        include 'koneksi.php';

        $query1 = "SELECT pesan_bus.id_pesanbus, pesan_bus.id_paketbus, rute_bus, jadwal_bus, harga_bus, status_pesanbus, bukti_bayarbus, nama_bus FROM pesan_bus
            JOIN paket_bus ON pesan_bus.id_paketbus = paket_bus.id_paketbus
            JOIN bus ON bus.id_bus = paket_bus.id_bus";

        $result1 = $koneksi->query($query1);
        $data = array();
            while ($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'id_pesanbus' => $row["id_pesanbus"],
                    'id_paketbus' => $row["id_paketbus"],
                    'nama_bus' => $row["nama_bus"],
                    'rute_bus' => $row["rute_bus"],
                    'jadwal_bus' => $row["jadwal_bus"],
                    'harga_bus' => $row["harga_bus"],
                    'status_pesanbus' => $row["status_pesanbus"],  
                );
            }
        
        $koneksi->close();
        return $data;
    }

    function getpesanhotelall()
    {
        include 'koneksi.php';

        $query1 = "SELECT pesan_hotel.id_pesanhotel, pesan_hotel.id_pakethotel, alamat_hotel, jadwal_hotel, harga_hotel, status_pesanhotel, bukti_bayarhotel, nama_hotel FROM pesan_hotel
            JOIN paket_hotel ON pesan_hotel.id_pakethotel = paket_hotel.id_pakethotel
            JOIN hotel ON hotel.id_hotel = paket_hotel.id_hotel";

        $result1 = $koneksi->query($query1);
        $data = array();
            while ($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'id_pesanhotel' => $row["id_pesanhotel"],
                    'id_pakethotel' => $row["id_pakethotel"],
                    'nama_hotel' => $row["nama_hotel"],
                    'alamat_hotel' => $row["alamat_hotel"],
                    'jadwal_hotel' => $row["jadwal_hotel"],
                    'harga_hotel' => $row["harga_hotel"],
                    'status_pesanhotel' => $row["status_pesanhotel"],  
                );
            }
        
        $koneksi->close();
        return $data;
    }

    function getpesankomboall()
    {
        include 'koneksi.php';

        $query1 = "SELECT pesan_kombo.id_pesankombo, pesan_kombo.id_paketkombo, rute_kombo, jadwal_kombo, harga_kombo, status_pesankombo, bukti_bayarkombo FROM pesan_kombo
            JOIN paket_kombo ON pesan_kombo.id_paketkombo = paket_kombo.id_paketkombo
            JOIN bus ON bus.id_bus = paket_kombo.id_bus
            JOIN hotel ON hotel.id_hotel = paket_kombo.id_hotel";

        $result1 = $koneksi->query($query1);
        $data = array();
            while ($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'id_pesankombo' => $row["id_pesankombo"],
                    'id_paketkombo' => $row["id_paketkombo"],
                    'rute_kombo' => $row["rute_kombo"],
                    'jadwal_kombo' => $row["jadwal_kombo"],
                    'harga_kombo' => $row["harga_kombo"],
                    'status_pesankombo' => $row["status_pesankombo"],  
                );
            }
        
        $koneksi->close();
        return $data;
    }


    function confirmbus($id_pesanbus){
        include 'koneksi.php';
        $query1 = "UPDATE pesan_bus SET status_pesanbus = 'SUDAH BAYAR' WHERE id_pesanbus = '$id_pesanbus'";
        $result1 = $koneksi->query($query1);
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
    }

    function confirmhotel($id_pesanhotel){
        include 'koneksi.php';
        $query1 = "UPDATE pesan_hotel SET status_pesanhotel = 'SUDAH BAYAR' WHERE id_pesanhotel = '$id_pesanhotel'";
        $result1 = $koneksi->query($query1);
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
    }

    function confirmkombo($id_pesankombo){
        include 'koneksi.php';
        $query1 = "UPDATE pesan_kombo SET status_pesankombo = 'SUDAH BAYAR' WHERE id_pesankombo = '$id_pesankombo'";
        $result1 = $koneksi->query($query1);
        echo "
                <script>
                    alert('Berhasil');
                </script>
                ";
    }
    
    function getadminall(){
        include 'koneksi.php';
        $query1 = "SELECT * FROM user
            JOIN user_role ON user.id_user = user_role.id_user
            WHERE id_role = 2";

        $result = $koneksi->query($query1);
        $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'id_user' => $row["id_user"],
                    'username' => $row["username"],
                    'email' => $row["email"], 
                );
            }
        
        $koneksi->close();
        return $data;
    }
    
    function getbusall(){
        include 'koneksi.php';
        $query1 = "SELECT * FROM bus";

        $result = $koneksi->query($query1);
        $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'id_bus' => $row["id_bus"],
                    'nama_bus' => $row["nama_bus"],
                    'plat_bus' => $row["plat_bus"], 
                    'status_bus' => $row["status_bus"], 
                );
            }
        
        $koneksi->close();
        return $data;
    }

    function gethotelall(){
        include 'koneksi.php';
        $query1 = "SELECT * FROM hotel";

        $result = $koneksi->query($query1);
        $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'id_hotel' => $row["id_hotel"],
                    'nama_hotel' => $row["nama_hotel"],
                    'alamat_hotel' => $row["alamat_hotel"],
                    'status_hotel' => $row["status_hotel"],
                );
            }
        
        $koneksi->close();
        return $data;
    }

    function getpaketbusall(){
        include 'koneksi.php';
        $query1 = "SELECT * FROM paket_bus";

        $result = $koneksi->query($query1);
        $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'id_paketbus' => $row["id_paketbus"],
                    'id_bus' => $row["id_bus"],
                    'rute_bus' => $row["rute_bus"],
                    'jadwal_bus' => $row["jadwal_bus"],
                    'harga_bus' => $row["harga_bus"],
                );
            }
        
        $koneksi->close();
        return $data;
    }

    function getpakethotelall(){
        include 'koneksi.php';
        $query1 = "SELECT * FROM paket_hotel";

        $result = $koneksi->query($query1);
        $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'id_pakethotel' => $row["id_pakethotel"],
                    'id_hotel' => $row["id_hotel"],
                    'jadwal_hotel' => $row["jadwal_hotel"],
                    'harga_hotel' => $row["harga_hotel"],
                );
            }
        
        $koneksi->close();
        return $data;
    }

    function getpaketkomboall(){
        include 'koneksi.php';
        $query1 = "SELECT * FROM paket_kombo";

        $result = $koneksi->query($query1);
        $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'id_paketkombo' => $row["id_paketkombo"],
                    'id_bus' => $row["id_bus"],
                    'id_hotel' => $row["id_hotel"],
                    'rute_kombo' => $row["rute_kombo"],
                    'jadwal_kombo' => $row["jadwal_kombo"],
                    'harga_kombo' => $row["harga_kombo"],
                );
            }
        
        $koneksi->close();
        return $data;
    }

}

?>