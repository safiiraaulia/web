<?php


include '../includes/db.php';

$id = $_GET['id'];
$sql = "DELETE FROM doctors WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: ../views/daftar_dokter.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
