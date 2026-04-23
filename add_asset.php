<?php
include("config.php");

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    mysqli_query($conn,"INSERT INTO assets(asset_name,category,status) VALUES('$name','$category','$status')");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Asset</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<a href="dashboard.php" class="btn btn-light mb-3">
    <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>

<h3>Add Asset</h3>

<div class="container mt-4">


<form method="POST">
<input type="text" name="name" class="form-control mb-2" placeholder="Asset Name" required>
<input type="text" name="category" class="form-control mb-2" placeholder="Category" required>

<select name="status" class="form-control mb-2">
<option>Working</option>
<option>Damaged</option>
</select>

<button name="add" class="btn btn-success">Add</button>
</form>

</div>

</body>
</html>