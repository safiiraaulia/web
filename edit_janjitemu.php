<?php
include 'includes/db.php';

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
    <form action="update_janjitemu.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="patient_id">Pasien:</label>
            <select class="form-control" id="patient_id" name="patient_id">
                <?php
                include 'includes/db.php';
                $sql = "SELECT id, name FROM patients";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($patient = $result->fetch_assoc()) {
                        $selected = ($patient['id'] == $row['patient_id']) ? 'selected' : '';
                        echo "<option value='{$patient['id']}' $selected>{$patient['name']}</option>";
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
                    while($doctor = $result->fetch_assoc()) {
                        $selected = ($doctor['id'] == $row['doctor_id']) ? 'selected' : '';
                        echo "<option value='{$doctor['id']}' $selected>{$doctor['name']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="appointment_date">Tanggal Janji Temu:</label>
            <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" value="<?php echo date('Y-m-d\TH:i', strtotime($row['appointment_date'])); ?>" required>
        </div>
        <div class="form-group">
            <label for="reason">Alasan:</label>
            <textarea class="form-control" id="reason" name="reason"><?php echo $row['reason']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
