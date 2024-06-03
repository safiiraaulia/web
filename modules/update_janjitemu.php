<?php

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $reason = $_POST['reason'];

    $sql = "UPDATE appointments SET patient_id=$patient_id, doctor_id=$doctor_id, appointment_date='$appointment_date', reason='$reason' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: daftar_janjitemu.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
