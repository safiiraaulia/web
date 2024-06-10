<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];

    $sql = "UPDATE doctors SET name='$name', specialty='$specialty', phone='$phone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data berhasil diperbarui');
                window.location.href='../views/daftar_dokter.php';
              </script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
