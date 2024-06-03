<?php
include 'header.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<h2>Selamat datang di Dashboard, <?php echo $_SESSION['username']; ?>!</h2>
<?php include 'footer.php'; ?>
