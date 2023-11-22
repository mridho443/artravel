<?php

include "koneksi.php";

$id_paketkombo = $_GET['id'];
$query1 = "DELETE FROM paket_kombo WHERE id_paketkombo='$id_paketkombo'";
$result1 = $koneksi->query($query1);

header("location:../data_paketkombo.php");
?>