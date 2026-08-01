<?php

include "../db.php";


$search="";


if(isset($_GET['search'])){

$search=$_GET['search'];

}


$result=mysqli_query($conn,

"SELECT * FROM assets 

WHERE asset_name LIKE '%$search%'

OR asset_type LIKE '%$search%'"

);


?>


<!DOCTYPE html>

<html>

<head>

<title>View Assets</title>

<link rel="stylesheet" href="../css/style.css">

</head>


<body>


    <a href="dashboard.php" class="back-btn">← Back</a>


<h1>💻 Asset List</h1>




<form method="GET" style="margin-bottom:20px;">
    <input type="text" name="search" placeholder="🔍 Search Asset..."
           value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"
           style="padding:10px; width:300px; border-radius:5px;">

    <button type="submit">Search</button>
</form>



<table>


<tr>

<th>ID</th>

<th>Name</th>

<th>Type</th>

<th>Quantity</th>

<th>Status</th>

<th>Action</th>


</tr>




<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>
<?php echo $row['id']; ?>
</td>


<td>
<?php echo $row['asset_name']; ?>
</td>


<td>
<?php echo $row['asset_type']; ?>
</td>


<td>
<?php echo $row['quantity']; ?>
</td>


<td>
<?php echo $row['status']; ?>
</td>


<td>

<a href="delete_asset.php?id=<?php echo $row['id']; ?>">
Delete
</a>


</td>


</tr>


<?php } ?>


</table>


</body>

</html>