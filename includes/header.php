<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #5e7263;
            color: #fff;
        }
        .navbar-brand {
            color: #fff !important;
        }
        .sidebar {
            background-color: #92ac98;
            color: #fff;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            overflow-y: auto;
            transition: all 0.3s;
        }
        .sidebar .list-group-item {
            background-color: #9db7a3;
            color: #fff;
            border: none;
        }
        .sidebar .list-group-item:hover {
            background-color: #637a68;
        }
        .content {
            margin-left: 250px; /* Default state */
            padding: 20px;
            transition: all 0.3s;
        }
        .card {
            background-color: #e9f5ee;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card:hover{
            background-color: #a5c2ab;

        }
        .card h5 {
            color: #486d51;
        }
        .footer {
            background-color: #35523d;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler:focus {
            outline: none;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                padding-top: 60px;
                left: -250px;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" onclick="toggleSidebar()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Dashboard</a>
    </nav>
    <div id="sidebar" class="sidebar">
        <div class="text-center mb-4">
            <img src="includes/res/Medical-Logo-Design-Symbol-Icon-on-transparent-background-PNG.png" alt="Hospital Logo" style="width: 100px;">
            <h4>HOSPITALITY</h4>
        </div>
        <div class="list-group">
            <a href="index.php" class="list-group-item list-group-item-action active">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="views/daftar_pengguna.php" class="list-group-item list-group-item-action">
                <i class="fas fa-users"></i> Pengguna
            </a>
            <a href="views/daftar_pasien.php" class="list-group-item list-group-item-action">
                <i class="fas fa-procedures"></i> Pasien
            </a>
            <a href="views/daftar_dokter.php" class="list-group-item list-group-item-action">
                <i class="fas fa-user-md"></i> Dokter
            </a>
            <a href="views/daftar_janjitemu.php" class="list-group-item list-group-item-action">
                <i class="fas fa-calendar-check"></i> Janji Temu
            </a>
            <a href="views/daftar_obat.php" class="list-group-item list-group-item-action">
                <i class="fas fa-pills"></i> Obat
            </a>
        </div>
    </div>
    
<footer class="footer">
    <p>&copy; 2024 Hospitality. All rights reserved.</p>
</footer>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            var content = document.querySelector(".list-group");
            if (sidebar.style.left === "0px") {
                sidebar.style.left = "-250px";
                content.style.marginLeft = "0";
            } else {
                sidebar.style.left = "0px";
                content.style.marginLeft = "250px";
            }
        }
    </script>
</body>
</html>