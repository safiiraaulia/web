<?php


include '../includes/db.php'; ?>

$id = $_GET['id'];
$sql = "SELECT * FROM doctors WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Dokter tidak ditemukan.";
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Dokter</title>
</head>
<body>
<div class="container">
    <h2>Edit Dokter</h2>
    <form action="update_dokter.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="specialty">Spesialisasi:</label>
            <input type="text" class="form-control" id="specialty" name="specialty" value="<?php echo $row['specialty']; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">No. Telepon:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
