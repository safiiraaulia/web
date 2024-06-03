<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_datetime = $_POST['appointment_datetime'];
    $reason = $_POST['reason'];

    // Ubah format tanggal dan waktu sebelum dimasukkan ke dalam database
    $formatted_datetime = date('Y-m-d H:i:s', strtotime($appointment_datetime));

    $sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, reason) VALUES ($patient_id, $doctor_id, '$formatted_datetime', '$reason')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../views/daftar_janjitemu.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
