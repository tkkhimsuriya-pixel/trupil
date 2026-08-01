<?php

include "../db.php";

$result=mysqli_query($conn,

"SELECT 
allocation.id,
employees.name,
assets.asset_name,
allocation.assign_date

FROM allocation

JOIN employees 
ON allocation.employee_id=employees.id

JOIN assets 
ON allocation.asset_id=assets.id"

);


?>


<html>

<head>

<title>Reports</title>

<link rel="stylesheet" href="../css/style.css">

</head>


<body>
    <a href="dashboard.php" class="back-btn">← Back</a>


<h1>📊 Asset Allocation Report</h1>


</a>
<a href="export_excel.php" class="btn btn-success">
📊 Export Excel
</a>


<table>


<tr>

<th>ID</th>

<th>Employee</th>

<th>Asset</th>

<th>Date</th>

</tr>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['asset_name']; ?></td>

<td><?php echo $row['assign_date']; ?></td>


</tr>


<?php } ?>


</table>


</body>

</html>