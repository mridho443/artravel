<?php
include "Client.php";

if ($_POST['aksi'] == 'create_admin') 
{
    $data = array(
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "nama" => $_POST['nama'],
        "email" => $_POST['email'],
        "aksi" => $_POST['aksi']
    );
    $client->create_admin($data);
    header('location:pages/data_admin.php');
} 

else if ($_POST['aksi'] == 'update_admin') 
{
    $data = array(
        "id_user" => $_POST['id_user'],
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "aksi" => $_POST['aksi']
    );
    $client->update_admin($data);
    header('location:pages/data_admin.php');
} 

else if ($_GET['aksi'] == 'delete_admin') 
{
    $data = array(
        "id_user" => $_GET['id_user'],
        "aksi" => $_GET['aksi']
    );
    $client->delete_admin($data);
    header('location:pages/data_admin.php');
}

unset($client, $data);
?>