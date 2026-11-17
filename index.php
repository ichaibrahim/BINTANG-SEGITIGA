<?php
// Inisialisasi variabel
$tinggi = "";
$pesan_error = "";
$tampilkan_hasil = false;

// Cek apakah form telah disubmit menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_tinggi = trim($_POST["tinggi"]);

    // Validasi: Cek apakah input berupa angka bulat dan berada di rentang 1 sampai 20
    if ($input_tinggi === "" || !is_numeric($input_tinggi) || intval($input_tinggi) != $input_tinggi) {
        $pesan_error = "Masukan tidak valid! Harap masukkan bilangan bulat.";
    } else {
        $tinggi = intval($input_tinggi);
        if ($tinggi < 1 || $tinggi > 20) {
            $pesan_error = "Nilai harus berada di antara 1 sampai 20!";
        } else {
            $tampilkan_hasil = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piramida Segitiga Bintang PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
        }
        .result-container {
            margin-top: 20px;
            background: #272822;
            color: #f8f8f2;
            padding: 20px;
            border-radius: 6px;
            text-align: center;
            overflow-x: auto;
        }
        /* Menggunakan font monospace agar spasi dan bintang simetris */
        pre {
            font-family: "Courier New", Courier, monospace;
            font-size: 18px;
            line-height: 1.2;
            margin: 0;
            display: inline-block;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Generator Segitiga Bintang</h2>

    <!-- Menampilkan Pesan Error jika input tidak valid -->
    <?php if (!empty($pesan_error)): ?>
        <div class="error"><?= htmlspecialchars($pesan_error); ?></div>
    <?php endif; ?>

    <!-- Form Input Tinggi Segitiga -->
    <form method="POST" action="">
        <div class="form-group">
            <label for="tinggi">Masukkan Tinggi Segitiga (1 - 20):</label>
            <input type="number" id="tinggi" name="tinggi" value="<?= htmlspecialchars($tinggi); ?>" min="1" max="20" required>
        </div>
        <button type="submit">Tampilkan Bintang</button>
    </form>

    <!-- Menampilkan Hasil Segitiga Simetris dengan Perulangan Bersarang -->
    <?php if ($tampilkan_hasil): ?>
        <div class="result-container">
            <p>Hasil Segitiga dengan Tinggi: <strong><?= $tinggi; ?></strong></p>
            <pre><?php
                // Perulangan Bersarang (Nested Loop) untuk membentuk piramida simetris
                for ($i = 1; $i <= $tinggi; $i++) {
                    // 1. Perulangan untuk mencetak spasi agar posisi bintang di tengah (simetris)
                    for ($j = 1; $j <= ($tinggi - $i); $j++) {
                        echo " ";
                    }
                    // 2. Perulangan untuk mencetak bintang (*)
                    for ($k = 1; $k <= (2 * $i - 1); $k++) {
                        echo "*";
                    }
                    // Pindah baris
                    echo "\n";
                }
            ?></pre>
        </div>
    <?php endif; ?>
</div>

</body>
</html>