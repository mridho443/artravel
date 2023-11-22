<?php

include "koneksi.php";

$id_pesanbus = $_GET['id'];
$query1 = "DELETE FROM pesan_bus WHERE id_pesanbus='$id_pesanbus'";
$result1 = $koneksi->query($query1);

header("location:../history_bus.php");
?>