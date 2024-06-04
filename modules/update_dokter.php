<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];

    // Pastikan variabel di escape untuk mencegah SQL injection
    $id = $conn->real_escape_string($id);
    $name = $conn->real_escape_string($name);
    $specialty = $conn->real_escape_string($specialty);
    $phone = $conn->real_escape_string($phone);

    $sql = "UPDATE doctors SET name='$name', specialty='$specialty', phone='$phone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: ../views/daftar_dokter.php');
        exit; // Pastikan untuk menambahkan exit setelah header
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
