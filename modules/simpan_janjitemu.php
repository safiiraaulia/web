<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

include '../includes/db.php'; ?>

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, reason) VALUES ($patient_id, $doctor_id, '$appointment_date', '$reason')";
    if ($conn->query($sql) === TRUE) {
        header('Location: daftar_janjitemu.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
