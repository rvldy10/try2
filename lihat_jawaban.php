<?php
require 'koneksi.php';

$sql = "SELECT * FROM jawaban ORDER BY waktu DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jawaban</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe4e1;
            padding: 20px;
            text-align: center;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background: #ffcccb;
        }
    </style>
</head>
<body>

    <h2>Daftar Jawaban</h2>
    
    <table>
        <tr>
            <th>No</th>
            <th>Jawaban</th>
            <th>Waktu</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['jawaban']}</td>
                        <td>{$row['waktu']}</td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='3'>Belum ada jawaban.</td></tr>";
        }
        $conn->close();
        ?>
    </table>

</body>
</html>
