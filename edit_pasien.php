<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

include 'includes/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM patients WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Pasien tidak ditemukan.";
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Pasien</title>
</head>
<body>
<div class="container">
    <h2>Edit Pasien</h2>
    <form action="update_pasien.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="age">Umur:</label>
            <input type="number" class="form-control" id="age" name="age" value="<?php echo $row['age']; ?>" required>
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin:</label>
            <select class="form-control" id="gender" name="gender">
                <option value="male" <?php echo ($row['gender'] == 'male') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="female" <?php echo ($row['gender'] == 'female') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Alamat:</label>
            <textarea class="form-control" id="address" name="address"><?php echo $row['address']; ?></textarea>
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
