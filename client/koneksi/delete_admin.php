<?php 

	include "koneksi.php";

	$id_user = $_GET['id'];
    $query1 = "DELETE FROM user_role WHERE id_user='$id_user'";
    $result1= $koneksi->query($query1);
    $query = "DELETE FROM user WHERE id_user = '$id_user'";
    $result = $koneksi->query($query);

	
    header("location:../data_admin.php");

?>