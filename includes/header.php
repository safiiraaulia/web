<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Dashboard</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="modules/logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <?php include 'includes/sidebar.php'; ?>
        </div>
        <div class="col-md-9">
