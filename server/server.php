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
    // $id_barang = $data->id_barang;
    // $nama_barang = $data->nama_barang;
    // $stok_barang = $data->stok_barang;
    // $harga_satuan = $data->harga_satuan;
    $aksi = $data->aksi;

    if ($aksi == 'create_admin') {
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

    unset($postdata,$database);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'read_admin') and (isset($_GET['id_user']))) {
        $id_user = filter($_GET['id_user']);
        $data = $database->read_admin($id_user);
        echo json_encode($data);
    // } elseif($_GET['aksi'] == 'read_all_admin') {
    //     $data = $database->read_all_admin();
    //     echo json_encode($data);
    // }
    }else{
        $data = $database->read_all_admin();
            echo json_encode($data);
    }

    unset($postdata, $data, $id_user, $database);
}