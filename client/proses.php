<?php
include "Client.php";
session_start();
//AUTHENTICATION
if ($_POST['aksi'] == 'login') {
    $result = $client->login($_POST['username'], $_POST['password']);
    if ($result == false) {
        
        header('location:pages/pages-login.php');
    } else {
        $_SESSION['id_role'] = $result->id_role;
        $_SESSION['id_user'] = $result->id_user;
        $_SESSION['username'] = $result->username;
        $_SESSION['nama'] = $result->nama;
        $_SESSION['email'] = $result->email;
        header('location:pages/users-profile.php');
    }
} elseif ($_GET['aksi'] == 'logout') {
    header('location:pages/pages-login.php');
} elseif ($_POST['aksi'] == 'register') {
    $dataUser = array(
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "nama" => $_POST['nama'],
        "email" => $_POST['email'],
        "aksi" => $_POST['aksi']
    );
    
    $result = $client->register($dataUser);
    if ($result == true) {
        echo "
        <script>
            alert('Register Berhasil');
        </script>
        ";
        header('location:pages/pages-login.php');
    } else {
        echo "
        <script>
            alert('Register Gagal');
        </script>
        ";
        header('location:pages/pages-login.php');
    }
}

//ADMIN
if ($_POST['aksi'] == 'create_admin') {
    $data = array(
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "nama" => $_POST['nama'],
        "email" => $_POST['email'],
        "aksi" => $_POST['aksi']
    );
    $client->create_admin($data);
    header('location:pages/data_admin.php');
} elseif ($_POST['aksi'] == 'update_admin') {
    $data = array(
        "id_user" => $_POST['id_user'],
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "aksi" => $_POST['aksi']
    );
    $client->update_admin($data);
    header('location:pages/data_admin.php');
} elseif ($_GET['aksi'] == 'delete_admin') {
    $data = array(
        "id_user" => $_GET['id_user'],
        "aksi" => $_GET['aksi']
    );
    $client->delete_admin($data);
    header('location:pages/data_admin.php');
}

//bus
elseif ($_POST['aksi'] == 'create_bus') {
    $data = array(
        "nama_bus" => $_POST['nama_bus'],
        "plat_bus" => $_POST['plat_bus'],
        "status_bus" => $_POST['status_bus'],
        "aksi" => $_POST['aksi']
    );
    $client->create_bus($data);
    header('location:pages/data_bus.php');
} elseif ($_POST['aksi'] == 'update_bus') {
    $data = array(
        "id_bus" => $_POST['id_bus'],
        "nama_bus" => $_POST['nama_bus'],
        "plat_bus" => $_POST['plat_bus'],
        "status_bus" => $_POST['status_bus'],
        "aksi" => $_POST['aksi']
    );
    $client->update_bus($data);
    header('location:pages/data_bus.php');
} elseif ($_GET['aksi'] == 'delete_bus') {
    $data = array(
        "id_bus" => $_GET['id_bus'],
        "aksi" => $_GET['aksi']
    );
    $client->delete_bus($data);
    header('location:pages/data_bus.php');
}

//PAKET BUS
elseif ($_POST['aksi'] == 'create_paket_bus') {
    $data = array(
        "id_bus" => $_POST['id_bus'],
        "rute_bus" => $_POST['rute_bus'],
        "jadwal_bus" => $_POST['jadwal_bus'],
        "harga_bus" => $_POST['harga_bus'],
        "aksi" => $_POST['aksi']
    );
    $client->create_paket_bus($data);
    header('location:pages/data_paketbus.php');
} elseif ($_POST['aksi'] == 'update_paket_bus') {
    $data = array(
        "id_paketbus" => $_POST['id_paketbus'],
        "rute_bus" => $_POST['rute_bus'],
        "jadwal_bus" => $_POST['jadwal_bus'],
        "harga_bus" => $_POST['harga_bus'],
        "aksi" => $_POST['aksi']
    );
    $client->update_paket_bus($data);
    header('location:pages/data_paketbus.php');
} elseif ($_GET['aksi'] == 'delete_paket_bus') {
    $data = array(
        "id_paketbus" => $_GET['id_paketbus'],
        "aksi" => $_GET['aksi']
    );
    $client->delete_paket_bus($data);
    // header('location:pages/data_paketbus.php');
} 

//PESAN BUS
elseif($_POST['aksi'] == 'create_pesan_bus'){
    
    $data = array(
        "id_user" => $_SESSION['id_user'],
        "id_paketbus" => $_POST['id_paketbus'],
        "aksi" => $_POST['aksi']
    );
    $client->create_pesan_bus($data);
    header('location:pages/history_bus.php');
} elseif($_POST['aksi'] == 'update_bukti_pesan_bus'){
    $data = array(
        "id_pesanbus" => $_POST['id_pesanbus'],
        "bukti_bayarbus" => $_POST['bukti_bayarbus'],
        "aksi" => $_POST['aksi']
    );
   
    $client->update_bukti_pesan_bus($data);
    header('location:pages/history_bus.php');
}elseif($_GET['aksi'] == 'delete_pesanbus'){
    $data = array(
        "id_pesanbus" => $_GET['id_pesanbus'],
        "aksi" => $_GET['aksi']
    );
   
    $client->delete_pesanbus($data);
    header('location:pages/history_bus.php');
}
elseif($_GET['aksi'] == 'confirm'){
    $data = array(
        "id_pesanbus" => $_GET['id_pesanbus'],
        "aksi" => $_GET['aksi']
    );
   
    $client->confirm($data);
    header('location:pages/verifikasipesan_bus.php');
}

//DOWNLOAD
// elseif ($_GET['aksi'] == 'download') {
//     $id_pesanbus = $_GET['id_pesanbus'];
//     $data = $client->download($id_pesanbus);

//     echo "
//     <script>
//         alert('$id_pesanbus');
//     </script>
//     ";
//     // header('location:pages/verifikasipesan_bus.php');
// } 

unset($client, $data);
?>