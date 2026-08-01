<?php

include "../db.php";

$id=$_GET['id'];

$data=mysqli_query($conn,
"SELECT * FROM employees WHERE id=$id");

$row=mysqli_fetch_assoc($data);


if(isset($_POST['update'])){

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$department=$_POST['department'];


mysqli_query($conn,

"UPDATE employees SET
name='$name',
email='$email',
phone='$phone',
department='$department'
WHERE id=$id"

);


header("location:view_employee.php");

}

?>


<html>

<head>
<link rel="stylesheet" href="../css/style.css"></head>

<body>


<h2>Edit Employee</h2>


<form method="post">


<input type="text" name="name"
value="<?php echo $row['name']; ?>">


<input type="email" name="email"
value="<?php echo $row['email']; ?>">


<input type="text" name="phone"
value="<?php echo $row['phone']; ?>">


<input type="text" name="department"
value="<?php echo $row['department']; ?>">


<button name="update">
Update
</button>


</form>


</body>
</html>