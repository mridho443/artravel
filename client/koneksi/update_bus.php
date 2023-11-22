<?php 

include "koneksi.php";

$id_bus = $_POST['id_bus'];
$nama_bus = $_POST['nama_bus'];
$plat_bus = $_POST['plat_bus'];
$status_bus = $_POST['status_bus'];

$query3 = ("UPDATE bus SET nama_bus='$nama_bus',plat_bus='$plat_bus', status_bus='$status_bus' where id_bus ='$id_bus'");
$result3 = $koneksi->query($query3);
header("location:../data_bus.php");
?>