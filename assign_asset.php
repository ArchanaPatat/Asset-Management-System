<?php
include("layout.php");
include("config.php");

// Insert data
if(isset($_POST['assign'])){
    $asset_id = $_POST['asset_id'];
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];

    $query = "INSERT INTO assignments (asset_id, user_id, assign_date)
              VALUES ('$asset_id','$user_id','$date')";

    if(mysqli_query($conn, $query)){
        $msg = "Asset Assigned Successfully";
    } else {
        $msg = "Error!";
    }
}

// Fetch assets
$assets = mysqli_query($conn, "SELECT * FROM assets");

// Fetch users
$users = mysqli_query($conn, "SELECT * FROM users");
?>

<!-- BACK BUTTON -->
<a href="dashboard.php" class="btn btn-light mb-3">
    <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>

<h3>Assign Asset</h3>

<?php if(isset($msg)) echo "<p class='text-success'>$msg</p>"; ?>

<form method="POST" class="card p-4 shadow-sm">

    <!-- Asset Dropdown -->
    <label>Choose Asset</label>
    <select name="asset_id" class="form-control mb-3" required>
        <option value="">Select Asset</option>
        <?php while($row = mysqli_fetch_assoc($assets)){ ?>
            <option value="<?php echo $row['asset_id']; ?>">
                <?php echo $row['asset_name']; ?>
            </option>
        <?php } ?>
    </select>

    <!-- User Dropdown -->
    <label>Select User</label>
    <select name="user_id" class="form-control mb-3" required>
        <option value="">Select User</option>
        <?php while($row = mysqli_fetch_assoc($users)){ ?>
            <option value="<?php echo $row['id']; ?>">
                <?php echo $row['name']; ?>
            </option>
        <?php } ?>
    </select>

    <!-- Date -->
    <label>Assign Date</label>
    <input type="date" name="date" class="form-control mb-3" required>

    <!-- Button -->
    <button name="assign" class="btn btn-primary">Assign</button>

</form>

</div>
</body>
</html>