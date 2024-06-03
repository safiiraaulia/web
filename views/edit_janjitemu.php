<?php

include '../includes/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM appointments WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Janji temu tidak ditemukan.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Janji Temu</title>
</head>
<body>
<div class="container">
    <h2>Edit Janji Temu</h2>
    <form action="../modules/update_janjitemu.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="patient_name">Nama Pasien:</label>
            <input type="text" class="form-control" id="patient_name" name="patient_name" value="<?php echo $row['patient_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="doctor_name">Nama Dokter:</label>
            <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="<?php echo $row['doctor_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="appointment_date">Tanggal Janji Temu:</label>
            <input type="date" class="form-control" id="appointment_date" name="appointment_date" value="<?php echo $row['appointment_date']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Janji Temu</button>
    </form>
</div>
</body>
</html>
