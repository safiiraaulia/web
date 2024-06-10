<?php 
include '../includes/db.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Daftar Janji Temu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }

        h2 {
            font-size: 2.5em;
            font-weight: 700;
            color: #white;
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-left: 665px;
            margin-top: 30px;
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
        .container {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }
        .table {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .table th, .table td {
            vertical-align: middle;
            padding: 12px 15px;
            text-align: center;
        }
        .table thead th {
            background-color: #85988a;
            color: #fff;
            border: none;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f3f4f6;
        }
        .table tbody tr:hover {
            background-color: #d1e7dd;
        }
        .btn {
            border-radius: 50px;
        }
        .btn-primary {
            background-color: #8ba291;
            border: none;
        }
        .btn-primary:hover {
            background-color: #486d51;
        }
        .btn-warning {
            background-color: #ffcc00;
            border: none;
        }
        .btn-warning:hover {
            background-color: #e6b800;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .action-buttons a {
            margin: 0 5px;
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
            .container {
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
    <h2>Daftar Janji Temu</h2>
</nav>
<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered" style="margin-right: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Tanggal Janji Temu</th>
                <th>Alasan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT a.id, p.name AS patient_name, d.name AS doctor_name, a.appointment_date, a.reason
                FROM appointments a
                JOIN patients p ON a.patient_id = p.id
                JOIN doctors d ON a.doctor_id = d.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['patient_name']}</td>
                        <td>{$row['doctor_name']}</td>
                        <td>{$row['appointment_date']}</td>
                        <td>{$row['reason']}</td>
                        <td>
                            <a href='edit_janjitemu.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                            <a href='../modules/hapus_janjitemu.php?id={$row['id']}' class='btn btn-danger' onclick='return confirmDelete()'>Hapus</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data janji temu.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
    </div>
    <a href="../views/tambah_janjitemu.php" class="btn btn-primary mb-3" style="margin-left:500px;margin-right:400px;margin-top:30px;" >Tambah Janji Temu</a>
</div>
<div id="sidebar" class="sidebar">
    <div class="text-center mb-4">
        <img src="../includes/res/Medical-Logo-Design-Symbol-Icon-on-transparent-background-PNG.png" alt="Hospital Logo" style="width: 100px;">
        <h4>HOSPITALITY</h4>
    </div>
    <div class="list-group">
        <a href="../index.php" class="list-group-item list-group-item-action active">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="../views/daftar_pasien.php" class="list-group-item list-group-item-action">
            <i class="fas fa-procedures"></i> Pasien
        </a>
        <a href="../views/daftar_dokter.php" class="list-group-item list-group-item-action">
            <i class="fas fa-user-md"></i> Dokter
        </a>
        <a href="../views/daftar_janjitemu.php" class="list-group-item list-group-item-action">
            <i class="fas fa-calendar-check"></i> Janji Temu
        </a>
        <a href="../views/daftar_inventaris.php" class="list-group-item list-group-item-action">
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
        var content = document.querySelector(".container");
        if (sidebar.style.left === "0px") {
            sidebar.style.left = "-250px";
            content.style.marginLeft = "0";
        } else {
            sidebar.style.left = "0px";
            content.style.marginLeft = "250px";
        }
    }

    function confirmDelete() {
    var confirmation = confirm("Apakah Anda yakin ingin menghapus data?");
    return confirmation;
}
</script>
</body>
</html>