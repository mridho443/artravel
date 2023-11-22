<?php 

include "koneksi.php";

$id_paketkombo = $_POST['id_paketkombo'];
$rute_kombo = $_POST['rute_kombo'];
$jadwal_kombo = $_POST['jadwal_kombo'];
$harga_kombo = $_POST['harga_kombo'];

$query3 = ("UPDATE paket_kombo SET rute_kombo='$rute_kombo',jadwal_kombo='$jadwal_kombo', harga_kombo='$harga_kombo' where id_paketkombo ='$id_paketkombo'");
$result3 = $koneksi->query($query3);

header("location:../data_paketkombo.php");
?>