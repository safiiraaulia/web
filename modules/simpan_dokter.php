<?php

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO doctors (name, specialty, phone) VALUES ('$name', '$specialty', '$phone')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data berhasil disimpan');
                window.location.href='../views/daftar_dokter.php';
              </script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
