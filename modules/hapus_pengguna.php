<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

include '../includes/db.php';

if (!isset($_GET['id'])) {
    echo "ID pengguna tidak diberikan.";
    exit;
}

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: ../views/daftar_pengguna.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
