<?php

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO doctors (name, specialty, phone) VALUES ('$name', '$specialty', '$phone')";
    if ($conn->query($sql) === TRUE) {
        header('Location: daftar_dokter.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
