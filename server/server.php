<?php
error_reporting(1);
include "Database.php";
$database = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}

if ($_SERVER['REQUEST METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow_Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}
$postdata = file_get_contents("php://input");

function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    $aksi = $data->aksi;

    //LOGIN
    if ($aksi == 'login') {

        $data = $database->login($data->username, $data->password);
        echo json_encode($data);
    } elseif ($aksi == 'logout') {
        echo "
        <script>
            alert('zzzz xxxx');
        </script>
        ";
    } elseif ($aksi == 'register') {
        $dataUser = array(
            'username' => $data->username,
            'password' => $data->password,
            'nama' => $data->nama,
            'email' => $data->email,
        );
        echo "
        <script>
            alert('tes');
        </script>
        ";

        $data = $database->register($dataUser);
        echo json_encode($data);
    }
    //ADMIN
    elseif ($aksi == 'create_admin') {
        $dataAdmin = array(
            'username' => $data->username,
            'password' => $data->password,
            'nama' => $data->nama,
            'email' => $data->email,
        );

        $database->create_admin($dataAdmin);
    } elseif ($aksi == 'update_admin') {
        $dataAdmin = array(
            'username' => $data->username,
            'email' => $data->email,
            'id_user' => $data->id_user,
        );
        $database->update_admin($dataAdmin);
    } elseif ($aksi == 'delete_admin') {
        $database->delete_admin($data->id_user);
    }

    //BUS
    elseif ($aksi == 'create_bus') {
        $dataBus = array(
            'nama_bus' => $data->nama_bus,
            'plat_bus' => $data->plat_bus,
            'status_bus' => $data->status_bus,
        );
        $database->create_bus($dataBus);
    } elseif ($aksi == 'update_bus') {
        $dataBus = array(
            'nama_bus' => $data->nama_bus,
            'plat_bus' => $data->plat_bus,
            'status_bus' => $data->status_bus,
            'id_bus' => $data->id_bus,
        );
        $database->update_bus($dataBus);
    } elseif ($aksi == 'delete_bus') {
        $database->delete_bus($data->id_bus);
    }

    //PAKET BUS
    elseif ($aksi == 'create_paket_bus') {
        $dataPaketBus = array(
            'id_bus' => $data->id_bus,
            'rute_bus' => $data->rute_bus,
            'jadwal_bus' => $data->jadwal_bus,
            'harga_bus' => $data->harga_bus,

        );
        $database->create_paket_bus($dataPaketBus);
    } elseif ($aksi == 'update_paket_bus') {
        $dataPaketBus = array(
            'id_paketbus' => $data->id_paketbus,
            'rute_bus' => $data->rute_bus,
            'jadwal_bus' => $data->jadwal_bus,
            'harga_bus' => $data->harga_bus,
        );
        $database->update_paket_bus($dataPaketBus);
    } elseif ($aksi == 'delete_paket_bus') {
        $database->delete_paket_bus($data->id_paketbus);
    }

    //PESAN BUS
    elseif ($aksi == 'create_pesan_bus') {
        $dataPesanBus = array(
            'id_user' => $data->id_user,
            'id_paketbus' => $data->id_paketbus,
        );

        $database->create_pesan_bus($dataPesanBus);
    } elseif ($aksi == 'update_bukti_pesan_bus') {
        $dataPesanBus = array(
            'id_pesanbus' => $data->id_pesanbus,
            'bukti_bayarbus' => $data->bukti_bayarbus,

        );
        $database->update_bukti_pesan_bus($dataPesanBus);
    }elseif ($aksi == 'delete_pesanbus') {
        $database->delete_pesanbus($data->id_pesanbus);
    }elseif ($aksi == 'confirm') {
        $database->confirm($data->id_pesanbus);
    }
    // } elseif ($aksi == 'update_pesan_bus') {
    //     $dataPesanBus = array(
    //         'id_user' => $data->id_user,
    //         'id_paketbus' => $data->id_paketbus,
    //     );
    //     $database->update_pesan_bus($dataPesanBus);
    // } elseif ($aksi == 'delete_pesan_bus') {
    //     $database->delete_pesan_bus($data->id_pesanbus);
    // }


    unset($postdata, $database, $dataAdmin, $dataBus, $dataPaketBus);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //ADMIN
    if ($_GET['aksi'] == 'read_all_admin') {
        $data = $database->read_all_admin();
        echo json_encode($data);
    } elseif (($_GET['aksi'] == 'read_admin') and (isset($_GET['id_user']))) {
        $id_user = filter($_GET['id_user']);
        $data = $database->read_admin($id_user);
        echo json_encode($data);
    }

    //BUS
    elseif ($_GET['aksi'] == 'read_all_bus') {
        $data = $database->read_all_bus();
        echo json_encode($data);
    } elseif (($_GET['aksi'] == 'read_bus') and (isset($_GET['id_bus']))) {
        $id_bus = filter($_GET['id_bus']);
        $data = $database->read_bus($id_bus);
        echo json_encode($data);
    }

    //PAKET BUS
    elseif ($_GET['aksi'] == 'read_all_paket_bus') {
        $data = $database->read_all_paket_bus();
        echo json_encode($data);
    } elseif (($_GET['aksi'] == 'read_paket_bus') and (isset($_GET['id_paketbus']))) {
        $id_paketbus = filter($_GET['id_paketbus']);
        $data = $database->read_paket_bus($id_paketbus);
        echo json_encode($data);
    }

    //PESAN BUS
    elseif ($_GET['aksi'] == 'read_all_pesan_bus') {
        $data = $database->read_all_pesan_bus();
        echo json_encode($data);
    } elseif (($_GET['aksi'] == 'read_pesan_bus') and (isset($_GET['id_user']))) {
        $id_user = filter($_GET['id_user']);
        $data = $database->read_pesan_bus($id_user);
        echo json_encode($data);
    }

    //DOWNLOAD
    // elseif (($_GET['aksi'] == 'download') and (isset($_GET['id_pesanbus']))) {
    //     $id_pesanbus = filter($_GET['id_pesanbus']);
    //     $data = $database->download($id_pesanbus);
    //     echo json_encode($data);
    // }

    unset($postdata, $data, $id_user, $database);
}