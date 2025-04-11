<?php
include 'koneksi.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($password !== $konfirmasi) {
        $error = "Konfirmasi password tidak sesuai!";
    } else {
        // Cek apakah email sudah digunakan
        $cek = $conn->prepare("SELECT email FROM profile WHERE email = ?");
        $cek->bind_param("s", $email);
        $cek->execute();
        $cek->store_result();

        if ($cek->num_rows > 0) {
            $error = "Email sudah terdaftar!";
        } else {
            $stmt = $conn->prepare("INSERT INTO profile (nama, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama, $email, $password);

            if ($stmt->execute()) {
                echo "<script>
                    window.onload = function() {
                        document.getElementById('toast').classList.add('show');
                        setTimeout(function() {
                            window.location.href = 'login.php';
                        }, 3000);
                    }
                </script>";
            }          
             else {
                $error = "Pendaftaran gagal. Coba lagi.";
            }

            $stmt->close();
        }

        $cek->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Masuk</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #ffe3ec;
            flex-direction: column;
            width: 100vw;
        }
        .container {
            width: 90%;
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 15px;
            text-align: left;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex; /* Pastikan terlihat */
            flex-direction: column;
            align-items: center;
        }
        .back-button {
            position: absolute;
            top: 10px;
            left: 20px;
            background-color:rgb(229, 44, 115);
            color: white;
            padding: 8px 14px;
            border: none;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #d81b60;
        }
        .option img {
            width: 40px;
            margin-right: 10px;
        }
        .logo {
            width: 200px;
            margin-bottom: 10px;
            display: block;
        }
        h2 {
            color: #c42158;
        }
        label {
            display: block;
            text-align: left;
            margin-top: 10px;
            font-weight: bold;
            font-size: 14px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-right: 60px;
            border: 1px solid #eee;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            background-color: #e91e63;
            color: white;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #d81b60;
        }
        .toggle-link {
            margin-top: 10px;
            cursor: pointer;
            color: #c42158;
            text-decoration: none;
        }
        .msg {
            margin-top: 10px;
            font-size: 14px;
        }
        .error { color: red; }
        .success { color:rgb(139, 216, 255); }
    </style>
</head>
<body>
    <a href="landing_page.html" class="back-button">← Kembali</a>
    <div class="container">
            <img src="logoheader.png" alt="Mom and Baby Logo" class="logo">
            <h2>Daftar</h2>
            <form action="" method="post">
                <label for="nama">Nama</label>
                <input type="text" name="nama" required>

                <label for="email">Email</label>
                <input type="email" name="email" required>

                <label for="password">Kata Sandi</label>
                <input type="password" name="password" required>

                <label for="konfirmasi">Konfirmasi Kata Sandi</label>
                <input type="password" name="konfirmasi" required>

                <button class="btn" type="submit">Daftar</button>
            </form>
            <p class="toggle-link">
                <a href="login.php" style="text-decoration: none; color: #e91e63;" >Sudah Punya Akun? Masuk</a></p>

            <?php if ($error): ?>
                <p class="msg error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <?php if ($success): ?>
                <p class="msg success"><?= htmlspecialchars($success) ?></p>
            <?php endif; ?>
    </div>
    <div id="toast">🎉 Registrasi berhasil! Silakan login...</div>
</body>
</html>
