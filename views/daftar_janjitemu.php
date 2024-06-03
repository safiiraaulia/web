<?php 

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

include 'includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Daftar Janji Temu</title>
</head>
<body>
<div class="container">
    <h2>Daftar Janji Temu</h2>
    <a href="tambah_janjitemu.php" class="btn btn-primary mb-2">Tambah Janji Temu</a>
    <table class="table table-bordered">
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
                            <a href='hapus_janjitemu.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>
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
</body>
</html>
