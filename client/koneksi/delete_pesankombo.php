<?php

include "koneksi.php";

$id_pesankombo = $_GET['id'];
$query1 = "DELETE FROM pesan_kombo WHERE id_pesankombo='$id_pesankombo'";
$result1 = $koneksi->query($query1);

header("location:../history_kombo.php");
?>