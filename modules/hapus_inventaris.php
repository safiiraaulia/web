<?php

include '../includes/db.php';

$id = $_GET['id'];
$sql = "DELETE FROM inventory WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: daftar_inventaris.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
