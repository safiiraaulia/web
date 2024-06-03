<?php 
include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Tambah Janji Temu</title>
</head>
<body>
<div class="container">
    <h2>Tambah Janji Temu Baru</h2>
    <form action="../modules/simpan_janjitemu.php" method="post">
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
            <label for="appointment_datetime">Tanggal dan Jam Janji Temu:</label>
            <input type="datetime-local" class="form-control" id="appointment_datetime" name="appointment_datetime" required>
        </div>
        <div class="form-group">
            <label for="reason">Alasan:</label>
            <textarea class="form-control" id="reason" name="reason"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const appointmentDateTimeInput = document.getElementById('appointment_datetime');
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    const hours = String(today.getHours()).padStart(2, '0');
    const minutes = String(today.getMinutes()).padStart(2, '0');
    const minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

    appointmentDateTimeInput.min = minDateTime;
});
</script>
</body>
</html>
