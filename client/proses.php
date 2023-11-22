<?php
include "Client.php";

if ($_POST['aksi'] == 'create_admin') 
{
    $data = array(
        "id_user" => $_POST['id_user'],
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "nama" => $_POST['nama'],
        "email" => $_POST['email'],
        "aksi" => $_POST['aksi']
    );
    $abc->create_admin($data);
    header('location:pages/create_admin.php');
} 

else if ($_POST['aksi'] == 'update_admin') 
{
    $data = array(
        "id_user" => $_POST['id_user'],
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "aksi" => $_POST['aksi']
    );
    $abc->update_admin($data);
    header('location:index.php?page=daftar-data');
} 

else if ($_GET['aksi'] == 'delete_admin') 
{
    $data = array(
        "id_barang" => $_GET['id_barang'],
        "aksi" => $_GET['aksi']
    );
    $abc->delete_admin($data);
    header('location:index.php?page=daftar-data');
}

unset($abc, $data);
?>