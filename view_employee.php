<?php

include "../db.php";


$result=mysqli_query($conn,"SELECT * FROM employees");


?>


<html>

<head>

<title>Employees</title>

<link rel="stylesheet" href="../css/style.css">

</head>


<body>


<h1>👥 Employee List</h1>



<table>


<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>Department</th>



</tr>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td><?php echo $row['id']; ?></td>


<td><?php echo $row['name']; ?></td>


<td><?php echo $row['email']; ?></td>


<td><?php echo $row['phone']; ?></td>


<td><?php echo $row['department']; ?></td>


</tr>


<?php } ?>


</table>


</body>

</html>