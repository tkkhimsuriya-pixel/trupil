<?php

include "../db.php";


if(isset($_POST['save'])){


$name=$_POST['name'];

$email=$_POST['email'];

$phone=$_POST['phone'];

$department=$_POST['department'];



$sql="INSERT INTO employees(name,email,phone,department)

VALUES('$name','$email','$phone','$department')";


mysqli_query($conn,$sql);


echo "Employee Added Successfully";


}


?>


<html>

<head>

<title>Add Employee</title>

<link rel="stylesheet" href="../css/style.css">

</head>


<body>

    <div class="back-container">
    <a href="dashboard.php" class="back-btn">← Back</a>
    </div>


<div class="form-box">


<h2>👨‍💼 Add Employee</h2>


<form method="post">
 


<input type="text"
name="name"
placeholder="Employee Name"
required>


<input type="email"
name="email"
placeholder="Email"
required>


<input type="text"
name="phone"
placeholder="Phone Number"
required>



<input type="text"
name="department"
placeholder="Department"
required>

<input type="text"
name="salary"
placeholder="emp salary"
required>

<button name="save">

Save Employee

</button>


</form>


</div>


</body>

</html>