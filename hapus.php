<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$sql = "DELETE FROM infrastruktur WHERE `Nama Infrastruktur` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nama);
if ($stmt->execute()) {
    echo "Berhasil";
} else {
    http_response_code(500);
    echo "Gagal";
}
?>