<?php

include "../db.php";

if(isset($_POST['save'])){


$name=$_POST['asset_name'];

$type=$_POST['asset_type'];

$qty=$_POST['quantity'];

$status=$_POST['status'];



$sql="INSERT INTO assets(asset_name,asset_type,quantity,status)

VALUES('$name','$type','$qty','$status')";


mysqli_query($conn,$sql);


echo "Asset Added Successfully";


}


?>


<html>

<head>

<title>Add Asset</title>

<link rel="stylesheet" href="../css/style.css">

</head>


<body>
    
<a href="dashboard.php" class="back-btn">← Back</a>

<div class="form-box">


<h2>💻 Add New Asset</h2>


<form method="post">


<input type="text"
name="asset_name"
placeholder="Asset Name"
required>


<input type="text"
name="asset_type"
placeholder="Asset Type"
required>



<input type="number"
name="quantity"
placeholder="Quantity"
required>



<select name="status">


<option>Available</option>

<option>Assigned</option>


</select>



<button name="save">

Add Asset

</button>


</form>


</div>


</body>

</html>