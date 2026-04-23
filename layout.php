<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
}

// Active page detect
$current = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
<title>Asset System</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* BODY */
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f4f6fb;
}

/* SIDEBAR */
.sidebar {
    width: 240px;
    height: 100vh;
    position: fixed;
    background: linear-gradient(180deg,#667eea,#764ba2);
    padding: 20px;
    color: white;
}

.sidebar h3 {
    margin-bottom: 30px;
    font-weight: bold;
}

/* SIDEBAR LINKS */
.sidebar a {
    display: block;
    color: white;
    padding: 12px;
    border-radius: 10px;
    margin-bottom: 8px;
    text-decoration: none;
    transition: 0.3s;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.2);
}

.sidebar a.active {
    background: rgba(255,255,255,0.3);
    font-weight: bold;
}

.sidebar a i {
    margin-right: 10px;
}

/* MAIN CONTENT */
.main {
    margin-left: 260px;
    padding: 30px;
}

/* HEADINGS */
h3 {
    color: #2d3748;
    font-weight: 600;
}

/* CARD */
.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

/* BUTTON */
.btn {
    border-radius: 10px;
    padding: 8px 15px;
}

.btn-primary {
    background: linear-gradient(45deg,#667eea,#764ba2);
    border: none;
}

/* TABLE */
table {
    border-radius: 10px;
    overflow: hidden;
}

tr:hover {
    background: #f1f3ff;
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h3>AssetSys</h3>

    <a href="dashboard.php" class="<?= ($current=='dashboard.php')?'active':'' ?>">
        <i class="fas fa-home"></i> Dashboard
    </a>

    <a href="add_asset.php" class="<?= ($current=='add_asset.php')?'active':'' ?>">
        <i class="fas fa-plus-circle"></i> Add Asset
    </a>

    <a href="view_assets.php" class="<?= ($current=='view_assets.php')?'active':'' ?>">
        <i class="fas fa-box"></i> View Assets
    </a>

    <a href="assign_asset.php" class="<?= ($current=='assign_asset.php')?'active':'' ?>">
        <i class="fas fa-link"></i> Assign Asset
    </a>

    <a href="assigned_assets.php" class="<?= ($current=='assigned_assets.php')?'active':'' ?>">
        <i class="fas fa-list"></i> Assigned Assets
    </a>

    <a href="logout.php">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</div>

<!-- MAIN -->
<div class="main">