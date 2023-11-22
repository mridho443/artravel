<?php 

include "koneksi.php";
$query3 = ("UPDATE bus SET status_bus='NON ACTIVE'");
$result3 = $koneksi->query($query3);
header("location:../data_bus.php");
?>