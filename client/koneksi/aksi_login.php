<?php
    session_start();
    include "koneksi.php";
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $aksi = $_GET['aksi'];

    if ($aksi == "in") {
        $query1 = "SELECT * FROM user where username = '$username' AND password = '$password';";
        $result1 = $koneksi->query($query1);
        
        if (mysqli_num_rows($result1) == 1) {
            $data = $result1->fetch_array();
            $id_user = $data['id_user'];
            $query2 = "SELECT * FROM user_role where id_user = '$id_user'";
            $result2 = $koneksi->query($query2);
            $data2 = $result2->fetch_array();
            $_SESSION['id_role'] = $data2['id_role'];
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['isLoginUser'] = 'logged';
            header("location:../users-profile.php");
        } else {
            $_SESSION["status"] = 'gagal';
            header("location:../pages-login.php");
        }
    }else if($aksi == "out"){
        unset($_SESSION['username']);
        unset($_SESSION['id_user']);
        unset($_SESSION['nama']);
        unset($_SESSION['email']);
        unset($_SESSION['isLoginUser']);
        header("location:../index.php");
    }
?>