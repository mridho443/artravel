<?php 

include "koneksi.php";

$id_user = $_POST['id_user'];
$username = $_POST['username'];
$email = $_POST['email'];

$query = ("UPDATE user SET username = '$username', email='$email' where id_user ='$id_user' ");
$result = $koneksi->query($query);
header("location:../data_admin.php");
?>