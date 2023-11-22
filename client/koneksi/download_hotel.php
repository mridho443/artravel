<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $documentId = $_GET['id'];

    $query = "SELECT * FROM pesan_hotel WHERE id_pesanhotel = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $documentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $file_name = $row['file_name'];
        $fileContent = $row['bukti_bayarhotel'];
        $file_type = $row['file_type'];
        $file_size = $row['file_size'];
        header("Content-lenght: $file_size");
        header("Content-type: $file_type");
        header("Content-Disposition: attachment; filename=\"$file_name\"");
        
        echo $fileContent;
        exit;
    }
}

header("Location: ../verifikasipesan_hotel.php");
exit;
?>
