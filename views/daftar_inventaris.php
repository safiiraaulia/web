<?php 

include '../includes/db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Daftar Inventaris</title>
</head>
<body>
<div class="container">
    <h2>Daftar Inventaris</h2>
    <a href="tambah_inventaris.php" class="btn btn-primary mb-2">Tambah Inventaris</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Kadaluarsa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM inventory";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['type']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['expiration_date']}</td>
                        <td>
                            <a href='edit_inventaris.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                            <a href='hapus_inventaris.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Tidak ada data inventaris.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
