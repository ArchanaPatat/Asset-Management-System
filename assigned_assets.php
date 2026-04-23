<?php
include("layout.php");
include("config.php");

// JOIN QUERY
$query = "
SELECT a.asset_name, u.name, ass.assign_date
FROM assignments ass
JOIN assets a ON ass.asset_id = a.asset_id
JOIN users u ON ass.user_id = u.id
";

$data = mysqli_query($conn, $query);
?>

<!-- BACK BUTTON -->
<a href="dashboard.php" class="btn btn-light mb-3">
    <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>

<h3>Assigned Assets</h3>

<div class="card p-3 shadow-sm">

<table class="table table-hover">

<tr>
<th>Asset</th>
<th>User</th>
<th>Date</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?php echo $row['asset_name']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['assign_date']; ?></td>
</tr>
<?php } ?>

</table>

</div>

</div>
</body>
</html>