<?php 

include "koneksi.php";

$id_paketbus = $_POST['id_paketbus'];
$rute_bus = $_POST['rute_bus'];
$jadwal_bus = $_POST['jadwal_bus'];
$harga_bus = $_POST['harga_bus'];

$query3 = ("UPDATE paket_bus SET rute_bus='$rute_bus',jadwal_bus='$jadwal_bus', harga_bus='$harga_bus' where id_paketbus ='$id_paketbus'");
$result3 = $koneksi->query($query3);

header("location:../data_paketbus.php");
?>