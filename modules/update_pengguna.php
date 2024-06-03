<?php

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE users SET username='$username', password='$hashed_password' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: ../views/daftar_pengguna.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
