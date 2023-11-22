<?php

include "koneksi.php";

$id_pakethotel = $_GET['id'];
$query1 = "DELETE FROM paket_hotel WHERE id_pakethotel='$id_pakethotel'";
$result1 = $koneksi->query($query1);

header("location:../data_pakethotel.php");
?>