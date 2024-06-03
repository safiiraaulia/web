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
    <title>Tambah Janji Temu</title>
</head>
<body>
<div class="container">
    <h2>Tambah Janji Temu Baru</h2>
    <form action="simpan_janjitemu.php" method="post">
        <div class="form-group">
            <label for="patient_id">Pasien:</label>
            <select class="form-control" id="patient_id" name="patient_id">
                <?php
                $sql = "SELECT id, name FROM patients";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="doctor_id">Dokter:</label>
            <select class="form-control" id="doctor_id" name="doctor_id">
                <?php
                $sql = "SELECT id, name FROM doctors";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="appointment_date">Tanggal Janji Temu:</label>
            <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
        </div>
        <div class="form-group">
            <label for="reason">Alasan:</label>
            <textarea class="form-control" id="reason" name="reason"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
