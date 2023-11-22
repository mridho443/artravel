<?php

include "koneksi.php";

$id_user = $_GET['id'];
$query1 = "DELETE FROM pesan_bus WHERE id_user='$id_user' and status_pesanbus='SUDAH BAYAR'";
$result1 = $koneksi->query($query1);

header("location:../history_bus.php");

?>