<?php
include("config.php");
$data = mysqli_query($conn,"SELECT * FROM assets");
?>

<!DOCTYPE html>
<html>
<head>
<title>Assets</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<a href="dashboard.php" class="btn btn-light mb-3">
    <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>

<h3>All Assets</h3>

<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Name</th>
<th>Category</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?php echo $row['asset_id']; ?></td>
<td><?php echo $row['asset_name']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['status']; ?></td>
<td>
<a href="delete_asset.php?id=<?php echo $row['asset_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>