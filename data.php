<?php
include 'koneksi.php';

$sql = "SELECT * FROM infrastruktur";
$result = $conn->query($sql);

$features = [];

while ($row = $result->fetch_assoc()) {
    $features[] = [
        "type" => "Feature",
        "properties" => [
            "nama" => $row['Nama Infrastruktur'],
            "kondisi" => $row['Kondisi'],
            "keterangan" => $row['Keterangan'],
            "alamat" => $row['Alamat']
        ],
        "geometry" => [
            "type" => "Point",
            "coordinates" => [
                floatval($row['longitude']),
                floatval($row['latitude'])
            ]
        ]
    ];
}

$geojson = [
    "type" => "FeatureCollection",
    "features" => $features
];

header('Content-Type: application/json');
echo json_encode($geojson, JSON_PRETTY_PRINT);
?>