<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: views/login.php');
    exit;
}

include 'includes/header.php';
?>

<h2>Selamat datang di Dashboard, <?php echo $_SESSION['username']; ?>!</h2>

<?php include 'includes/footer.php'; ?>
