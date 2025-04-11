<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Your Choice</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .logo {
            width: 200px;
            margin-bottom: 10px;
            display: block;
        }
        .title {
            color: #e91e63;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
            align-self: flex-start;
        }
        .subtitle {
            align-self: flex-start;
            margin-top: 0;
        }
        .option {
            display: flex;
            align-items: center;
            padding: 15px; /* Tambah padding untuk memberi ruang */
            border: 2px solid #f8bbd0;
            border-radius: 10px;
            margin: 10px 0;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
            box-sizing: border-box; /* Pastikan padding tidak menambah ukuran elemen */
        }
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ffe3ec; /* Sama dengan background halaman */
            border: none;
            cursor: pointer;
            padding: 5px;
            border-radius: 50%;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background-color: #f8cdd9; /* Warna hover yang sedikit lebih gelap */
        }

        .logout-btn img {
            width: 30px;
            height: 30px;
        }
        .option img {
            width: 40px;
            margin-right: 10px;
        }
        .option.selected {
            border-color: #e91e63;
            background-color: #ffe3ec;
        }
        .button {
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
        .button:hover {
            background-color: #d81b60;
        }
        a .option {
            color: black;
        }
    </style>
    <script>
        function selectOption(element) {
            document.querySelectorAll('.option').forEach(option => {
                option.classList.remove('selected');
            });
            element.classList.add('selected');
        }
    </script>
</head>
<body>
    <!-- Tombol Logout -->
    <form action="logout.php" method="post">
        <button class="logout-btn" type="submit">
            <img src="logout.png" alt="Logout">
        </button>
    </form>

    <div class="container">
        <img src="logoheader.png" alt="Mom and Baby Logo" class="logo">
        <h1 class="title">Make Your Choice</h1>
        <p class="subtitle">1 goal selected</p>
        <div class="option" onclick="selectOption(this, null)">
            <img src="trackingperiod.png" alt="Track My Period">
            Track my period
        </div>

        <div class="option" onclick="selectOption(this, null)">
            <img src="pregnancytracking.png" alt="Pregnancy Tracking">
            Pregnancy Tracking
        </div>
        <div class="option" onclick="selectOption(this, null)">
            <img src="childgrowth.png" alt="Child Growth">
            Child Growth
        </div>
        <div class="option" onclick="selectOption(this, 'pengingat.php')">
            <img src="importantschedule.png" alt="important schedule">
            Important Schedule
        </div>
    </div>
    
    <script>
        function selectOption(element, route = null) {
            document.querySelectorAll('.option').forEach(option => {
                option.classList.remove('selected');
            });
            element.classList.add('selected');

            if (route) {
                window.location.href = route;
            } else {
                alert("Fitur ini sedang dalam pengembangan.");
            }
        }
    </script>

</body>
</html>
