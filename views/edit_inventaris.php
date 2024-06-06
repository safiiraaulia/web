<?php

include '../includes/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM inventory WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Item inventaris tidak ditemukan.";
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Inventaris</title>
</head>
<body>
<div class="container">
    <h2>Edit Inventaris</h2>
    <form action="update_inventaris.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="type">Jenis:</label>
            <input type="text" class="form-control" id="type" name="type" value="<?php echo $row['type']; ?>" required>
        </div>
        <div class="form-group">
            <label for="quantity">Jumlah:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required>
        </div>
        <div class="form-group">
            <label for="location">Lokasi Penyimpanan:</label>
            <input type="text" class="form-control" id="location" name="location" value="<?php echo $row['location']; ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="status" value="<?php echo $row['status']; ?>" required>
        </div>
        <div class="form-group">
            <label for="expiration_date">Tanggal Kadaluarsa:</label>
            <input type="date" class="form-control" id="expiration_date" name="expiration_date" value="<?php echo $row['expiration_date']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
