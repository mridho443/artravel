<?php
include "koneksi.php";
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password1 = md5($_POST['password']);
$password = $password1;

$query1 = "SELECT * FROM user where username = '$username'";
$result1 = $koneksi->query($query1);

if(mysqli_num_rows($result1)>0){
        echo "
                <script>
                    alert('Username Sudah Ada!, Registrasi Gagal');
                    window.location.href = ('../pages-register.php');
                </script> 
            ";
}else{
    $query2 = "INSERT INTO user (username, password, email,nama) 
                VALUES ('$username', '$password', '$email', '$name');";
    if($koneksi->query($query2)==true){
    $result2 = $koneksi->query($query1);
    $data = $result2->fetch_array();
    $id_user = $data['id_user'];
    $query3 = "INSERT INTO user_role(id_user, id_role) VALUES ($id_user,3)";
    $result3 = $koneksi->query($query3);
    echo "
        <script>
            alert('Registrasi Berhasil!');
            window.location.href = ('../pages-login.php');
        </script>
    ";
    }else{
        $error = mysqli_error($koneksi);
        echo "
        <script>
            alert('Registrasi Gagal!'{$error});
            window.location.href = ('../pages-register.php');
        </script>
    ";
    }
}
$koneksi->close();
?>