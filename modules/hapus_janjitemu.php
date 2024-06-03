<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

include '../includes/db.php'; ?>

$id = $_GET['id'];
$sql = "DELETE FROM appointments WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: daftar_janjitemu.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
