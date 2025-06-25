<?php
include 'koneksi.php';
$nama_lama = $_POST['nama_lama'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kondisi = $_POST['kondisi'];
$keterangan = $_POST['keterangan'];
$lat = $_POST['latitude'];
$lng = $_POST['longitude'];

$sql = "UPDATE infrastruktur SET `Nama Infrastruktur`=?, alamat=?, kondisi=?, keterangan=?, latitude=?, longitude=? WHERE `Nama Infrastruktur`=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssdds", $nama, $alamat, $kondisi, $keterangan, $lat, $lng, $nama_lama);

if ($stmt->execute()) {
    echo "Berhasil";
} else {
    http_response_code(500);
    echo "Gagal";
}
?>