<?php
include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Daftar Pengguna</title>
</head>
<body>
<div class="container">
    <h2>Daftar Pengguna</h2>
    <a href="tambah_pengguna.php" class="btn btn-primary mb-2">Tambah Pengguna</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                        <td>
                            <a href='edit_pengguna.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                            <a href='../modules/hapus_pengguna.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data pengguna.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
