<?php 

include "koneksi.php";

$id_hotel = $_POST['id_hotel'];
$nama_hotel = $_POST['nama_hotel'];
$alamat_hotel = $_POST['alamat_hotel'];
$status_hotel = $_POST['status_hotel'];

$query3 = ("UPDATE hotel SET nama_hotel='$nama_hotel',alamat_hotel='$alamat_hotel', status_hotel='$status_hotel' where id_hotel ='$id_hotel'");
$result3 = $koneksi->query($query3);
header("location:../data_hotel.php");
?>