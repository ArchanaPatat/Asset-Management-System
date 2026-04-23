<?php
session_start();
include("config.php");

if(!isset($_SESSION['user'])){
    header("Location: index.php");
}

// Stats
$total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM assets"));
$working = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM assets WHERE status='Working'"));
$damaged = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM assets WHERE status='Damaged'"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

:root {
    --bg-main: #f8f9fc;
    --sidebar-start: #667eea;
    --sidebar-end: #764ba2;
    --primary: #5a67d8;
    --success: #38a169;
    --danger: #e53e3e;
    --text-dark: #2d3748;
}

body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: var(--bg-main);
}

/* Sidebar */
.sidebar {
    width: 240px;
    height: 100vh;
    position: fixed;
    background: linear-gradient(180deg, var(--sidebar-start), var(--sidebar-end));
    padding: 20px;
    color: white;
}

.sidebar h3 {
    margin-bottom: 30px;
}

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

.sidebar a i {
    margin-right: 10px;
}

/* Main */
.main {
    margin-left: 260px;
    padding: 30px;
}

/* Topbar */
.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

/* Cards */
.card {
    border: none;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.card i {
    font-size: 28px;
}

/* Dashboard action cards */
.dashboard-card {
    cursor: pointer;
    text-align: center;
}

.dashboard-card:hover {
    transform: translateY(-8px);
}

h3 {
    color: var(--text-dark);
    font-weight: 600;
}

h6 {
    color: gray;
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h3>AssetSys</h3>

    <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
    <a href="add_asset.php"><i class="fas fa-plus-circle"></i> Add Asset</a>
    <a href="view_assets.php"><i class="fas fa-box"></i> View Assets</a>
    <a href="assign_asset.php"><i class="fas fa-link"></i> Assign Asset</a>
    <a href="assigned_assets.php"><i class="fas fa-list"></i> Assigned Assets</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<!-- MAIN -->
<div class="main">

<!-- TOPBAR -->
<div class="topbar">
    <h3>👋 Hello, <?php echo $_SESSION['user']['name']; ?></h3>
    <input type="text" class="form-control" placeholder="Search..." style="width:220px;">
</div>

<!-- STATS -->
<div class="row g-4 mb-4">

<div class="col-md-4">
<div class="card border-start border-4 border-primary">
    <div class="d-flex justify-content-between">
        <div>
            <h6>Total Assets</h6>
            <h3><?php echo $total; ?></h3>
        </div>
        <i class="fas fa-box text-primary"></i>
    </div>
</div>
</div>

<div class="col-md-4">
<div class="card border-start border-4 border-success">
    <div class="d-flex justify-content-between">
        <div>
            <h6>Working</h6>
            <h3><?php echo $working; ?></h3>
        </div>
        <i class="fas fa-check-circle text-success"></i>
    </div>
</div>
</div>

<div class="col-md-4">
<div class="card border-start border-4 border-danger">
    <div class="d-flex justify-content-between">
        <div>
            <h6>Damaged</h6>
            <h3><?php echo $damaged; ?></h3>
        </div>
        <i class="fas fa-times-circle text-danger"></i>
    </div>
</div>
</div>

</div>

<!-- ACTION CARDS -->
<div class="row g-4">

<div class="col-md-3">
<a href="add_asset.php" class="text-decoration-none">
<div class="card dashboard-card p-4">
<i class="fas fa-plus-circle text-primary mb-2"></i>
<h5>Add Asset</h5>
</div>
</a>
</div>

<div class="col-md-3">
<a href="view_assets.php" class="text-decoration-none">
<div class="card dashboard-card p-4">
<i class="fas fa-box text-success mb-2"></i>
<h5>View Assets</h5>
</div>
</a>
</div>

<div class="col-md-3">
<a href="assign_asset.php" class="text-decoration-none">
<div class="card dashboard-card p-4">
<i class="fas fa-link text-warning mb-2"></i>
<h5>Assign Asset</h5>
</div>
</a>
</div>

<div class="col-md-3">
<a href="assigned_assets.php" class="text-decoration-none">
<div class="card dashboard-card p-4">
<i class="fas fa-list text-danger mb-2"></i>
<h5>Assigned Assets</h5>
</div>
</a>
</div>

</div>

</div>

</body>
</html>