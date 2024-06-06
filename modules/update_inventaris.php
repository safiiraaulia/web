<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $expiration_date = $_POST['expiration_date'];

    $sql = "UPDATE inventory SET name='$name', type='$type', quantity=$quantity, location='$location', status='$status', expiration_date='$expiration_date' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: ../views/daftar_inventaris.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
