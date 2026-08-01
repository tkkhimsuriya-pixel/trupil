<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include "../db.php";

if(!isset($_GET['id'])){
    header("Location: view_asset.php");
    exit();
}

$id = (int)$_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM assets WHERE id=$id");

if(mysqli_num_rows($result)==0){
    die("Asset Not Found");
}

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $asset_name = mysqli_real_escape_string($conn,$_POST['asset_name']);
    $category   = mysqli_real_escape_string($conn,$_POST['category']);
    $brand      = mysqli_real_escape_string($conn,$_POST['brand']);
    $serial_no  = mysqli_real_escape_string($conn,$_POST['serial_no']);
    $status     = mysqli_real_escape_string($conn,$_POST['status']);

    mysqli_query($conn,"UPDATE assets SET

    asset_name='$asset_name',
    category='$category',
    brand='$brand',
    serial_no='$serial_no',
    status='$status'

    WHERE id=$id");

    header("Location:view_asset.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Asset</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Edit Asset</h3>

</div>

<div class="card-body">

<form method="POST">

<label>Asset Name</label>

<input
type="text"
name="asset_name"
class="form-control mb-3"
value="<?php echo htmlspecialchars($row['asset_name']); ?>"
required>

<label>Category</label>

<input
type="text"
name="category"
class="form-control mb-3"
value="<?php echo htmlspecialchars($row['category']); ?>"
required>

<label>Brand</label>

<input
type="text"
name="brand"
class="form-control mb-3"
value="<?php echo htmlspecialchars($row['brand']); ?>"
required>

<label>Serial No</label>

<input
type="text"
name="serial_no"
class="form-control mb-3"
value="<?php echo htmlspecialchars($row['serial_no']); ?>"
required>

<label>Status</label>

<select name="status" class="form-select mb-4">

<option value="Available" <?php if($row['status']=="Available") echo "selected"; ?>>Available</option>

<option value="Allocated" <?php if($row['status']=="Allocated") echo "selected"; ?>>Allocated</option>

<option value="Maintenance" <?php if($row['status']=="Maintenance") echo "selected"; ?>>Maintenance</option>

<option value="Scrap" <?php if($row['status']=="Scrap") echo "selected"; ?>>Scrap</option>

</select>

<button
type="submit"
name="update"
class="btn btn-success">

Update Asset

</button>

<a href="view_asset.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</body>

</html>