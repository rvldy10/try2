<?php
require 'koneksi.php'; // Buat file koneksi terpisah untuk kemudahan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jawaban = trim($_POST["jawaban"]);

    if (!empty($jawaban)) {
        $stmt = $conn->prepare("INSERT INTO jawaban (jawaban) VALUES (?)");
        $stmt->bind_param("s", $jawaban);

        if ($stmt->execute()) {
            echo "Jawaban berhasil disimpan!";
        } else {
            echo "Gagal menyimpan jawaban: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Jawaban tidak boleh kosong!";
    }
}

$conn->close();
?>
