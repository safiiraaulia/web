<?php

include '../includes/db.php';

$id = $_GET['id'];
$sql = "DELETE FROM patients WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $message = "Data telah berhasil dihapus";
    echo "<script>
            alert('$message');
            window.location.href='../views/daftar_pasien.php';
          </script>";
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
