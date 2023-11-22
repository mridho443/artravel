<?php 

include "koneksi.php";

$id_pakethotel = $_POST['id_pakethotel'];
$jadwal_hotel = $_POST['jadwal_hotel'];
$harga_hotel = $_POST['harga_hotel'];

$query3 = ("UPDATE paket_hotel SET jadwal_hotel='$jadwal_hotel', harga_hotel='$harga_hotel' where id_pakethotel ='$id_pakethotel'");
$result3 = $koneksi->query($query3);

header("location:../data_pakethotel.php");
?>