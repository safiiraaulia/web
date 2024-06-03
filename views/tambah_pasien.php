<?php 

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Tambah Pasien</title>
</head>
<body>
<div class="container">
    <h2>Tambah Pasien Baru</h2>
    <form action="simpan_pasien.php" method="post">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="age">Umur:</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin:</label>
            <select class="form-control" id="gender" name="gender">
                <option value="male">Laki-laki</option>
                <option value="female">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Alamat:</label>
            <textarea class="form-control" id="address" name="address"></textarea>
        </div>
        <div class="form-group">
            <label for="phone">No. Telepon:</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
