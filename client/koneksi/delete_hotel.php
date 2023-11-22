<?php

include "koneksi.php";

$id_hotel = $_GET['id'];
$query1 = "DELETE FROM hotel WHERE id_hotel='$id_hotel'";
$result1 = $koneksi->query($query1);

header("location:../data_hotel.php");


?>