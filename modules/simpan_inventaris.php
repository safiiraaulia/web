<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $expiration_date = $_POST['expiration_date'];

    $sql = "INSERT INTO inventory (name, type, quantity, location, status, expiration_date) VALUES ('$name', '$type', $quantity, '$location', '$status', '$expiration_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data berhasil disimpan');
                window.location.href='../views/daftar_inventaris.php';
              </script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }    
}

$conn->close();
?>
