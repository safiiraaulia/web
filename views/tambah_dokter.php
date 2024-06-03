<?php 

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

include 'includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Tambah Dokter</title>
</head>
<body>
<div class="container">
    <h2>Tambah Dokter Baru</h2>
    <form action="simpan_dokter.php" method="post">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="specialty">Spesialisasi:</label>
            <input type="text" class="form-control" id="specialty" name="specialty" required>
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
