<?php

include "koneksi.php";

$id_bus = $_GET['id'];
$query1 = "DELETE FROM bus WHERE id_bus='$id_bus'";
$result1 = $koneksi->query($query1);

header("location:../data_bus.php");


?>