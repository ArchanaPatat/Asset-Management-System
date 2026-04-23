<?php
include("config.php");

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM assets WHERE asset_id=$id");

header("Location: view_assets.php");
?>