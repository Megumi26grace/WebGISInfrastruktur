<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$kondisi = $_POST['kondisi'];
$keterangan = $_POST['keterangan'];
$lat = $_POST['latitude'];
$lng = $_POST['longitude'];
$alamat = 'Purwosari Baru Kec. Tamban Kab. Barito Kuala'; // default
$foto = 'jpg'; // default

$sql = "INSERT INTO infrastruktur (`Nama Infrastruktur`, `jenis`, `Kondisi`, `Keterangan`, `latitude`, `longitude`, `Alamat`, `Foto`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssddss", $nama, $jenis, $kondisi, $keterangan, $lat, $lng, $alamat, $foto);

if ($stmt->execute()) {
    echo "Sukses";
} else {
    http_response_code(500);
    echo "Gagal";
}
?>