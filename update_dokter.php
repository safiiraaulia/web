<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];

    $sql = "UPDATE doctors SET name='$name', specialty='$specialty', phone='$phone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: daftar_dokter.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
