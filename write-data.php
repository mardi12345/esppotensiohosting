<?php
// Variabel database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dblatihan";

// Koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil data dari URL
$data1 = isset($_GET["data1"]) ? $_GET["data1"] : null;
$data2 = isset($_GET["data2"]) ? $_GET["data2"] : null;

// Validasi data
if ($data1 !== null && $data2 !== null) {
    // Prepare the SQL statement
    $sql = "INSERT INTO datasensor (data1, data2) VALUES ('$data1', '$data2')";

    // Eksekusi query
    $result = mysqli_query($conn, $sql);

    // Cek hasil
    if ($result) {
        echo "Data successfully inserted!";
    } else {
        die("Invalid query: " . mysqli_error($conn));
    }
} else {
    echo "Missing data1 or data2 in the request.";
}

// Tutup koneksi
mysqli_close($conn);
?>
