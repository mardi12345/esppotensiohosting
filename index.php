<?php
require("koneksi.php"); // Memanggil file koneksi.php untuk koneksi ke database
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="5">
    <style>
        #wntable {
            border-collapse: collapse;
            width: 50%;
        }
        #wntable td, #wntable th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #wntable tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        #wntable tr:hover {
            background-color: #ddd;
        }
        #wntable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #00A8A9;
            color: white;
        }
    </style>
</head>
<body>
    <div id="cards" class="cards" align="center">
        <h1>Data Potensiometer</h1>
        <table id="wntable">
            <tr>
                <th>No</th>
                <th>Data 1</th>
                <th>Data 2</th>
                <th>Waktu</th>
            </tr>
            <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM datasensor ORDER BY id DESC");
            if (mysqli_num_rows($sql) == 0) {
                echo '<tr><td colspan="4">Data Tidak Ada.</td></tr>'; // Jika tidak ada entri di database
            } else {
                $no = 1; // Penomoran data
                while ($row = mysqli_fetch_assoc($sql)) { // Fetch query yang sesuai ke dalam array
                    echo '
                    <tr>
                        <td>' . $no . '</td>
                        <td>' . $row['data1'] . '</td>
                        <td>' . $row['data2'] . '</td>
                        <td>' . $row['waktu'] . '</td>
                    </tr>
                    ';
                    $no++;
                }
            }
            ?>
        </table>
    </div>
</body>
</html>
