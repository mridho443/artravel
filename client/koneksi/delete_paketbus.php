<?php

include "koneksi.php";

$id_paketbus = $_GET['id'];
$query1 = "DELETE FROM paket_bus WHERE id_paketbus='$id_paketbus'";
$result1 = $koneksi->query($query1);

header("location:../data_paketbus.php");


?>