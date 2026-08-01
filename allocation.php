<?php
include "../db.php";

if(isset($_POST['assign']))
{
    $employee_id = $_POST['employee_id'];
    $asset_id = $_POST['asset_id'];
    $assign_date = $_POST['assign_date'];

    mysqli_query($conn,"INSERT INTO allocation(employee_id,asset_id,assign_date)
    VALUES('$employee_id','$asset_id','$assign_date')");

    echo "<script>alert('Asset Assigned Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Assign Asset</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../css/style.css">


</head>

<body>
    <a href="dashboard.php" class="back-btn">← Back</a>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card">

<div class="card-header">
💻 Assign Asset
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label class="form-label">
Employee
</label>

<select name="employee_id" class="form-select" required>

<option value="">Select Employee</option>

<?php

$result=mysqli_query($conn,"SELECT * FROM employees");

while($row=mysqli_fetch_assoc($result))
{
?>

<option value="<?php echo $row['id']; ?>">

<?php echo $row['id']." - ".$row['name']; ?>

</option>

<?php
}
?>

</select>

</div>


<div class="mb-3">

<label class="form-label">
Asset
</label>

<select name="asset_id" class="form-select" required>

<option value="">Select Asset</option>

<?php

$result=mysqli_query($conn,"SELECT * FROM assets WHERE status='Available'");

while($row=mysqli_fetch_assoc($result))
{
?>

<option value="<?php echo $row['id']; ?>">

<?php echo $row['id']." - ".$row['asset_name']; ?>

</option>

<?php
}
?>

</select>

</div>


<div class="mb-3">

<label class="form-label">
Assign Date
</label>

<input
type="date"
name="assign_date"
class="form-control"
required>

</div>

<div class="d-grid">

<button
type="submit"
name="assign"
class="btn btn-custom">

Assign Asset

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>