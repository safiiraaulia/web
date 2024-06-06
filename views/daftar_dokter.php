<?php 

include '../includes/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Daftar Dokter</title>
</head>
<body>
<div class="container">
    <h2>Daftar Dokter</h2>
    <a href="../views/tambah_dokter.php" class="btn btn-primary mb-2">Tambah Dokter</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Spesialis</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM doctors";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['specialty']}</td>
                        <td>{$row['phone']}</td>
                        <td>
                            <a href='edit_dokter.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                            <a href='hapus_dokter.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data dokter.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
