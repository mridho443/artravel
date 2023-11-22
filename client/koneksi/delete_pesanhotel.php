<?php

include "koneksi.php";

$id_pesanhotel = $_GET['id'];
$query1 = "DELETE FROM pesan_hotel WHERE id_pesanhotel='$id_pesanhotel'";
$result1 = $koneksi->query($query1);

header("location:../history_hotel.php");
?>