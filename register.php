<?php
session_start();
include "db.php";

$msg="";

if(isset($_POST['register']))
{
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    $check=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username'");

    if(mysqli_num_rows($check)>0)
    {
        $msg="<div style='color:red;'>Username Already Exists!</div>";
    }
    else
    {
        mysqli_query($conn,"INSERT INTO admin(username,email,password)
        VALUES('$username','$email','$password')");

        $msg="<div style='color:green;'>Registration Successful</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Admin Registration</title>

<style>

body{
background:linear-gradient(135deg,#2563eb,#1e3a8a);
font-family:Arial;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.box{
width:420px;
background:#fff;
padding:25px;
border-radius:15px;
box-shadow:0 0 15px rgba(0,0,0,.3);
}

input{
width:100%;
padding:10px;
margin:8px 0;
border:1px solid #ccc;
border-radius:6px;
}

button{
width:100%;
padding:10px;
background:#2563eb;
color:white;
border:none;
border-radius:6px;
cursor:pointer;
}

button:hover{
background:#1d4ed8;
}

</style>

</head>

<body>

<div class="box">

<h2 align="center">Admin Registration</h2>

<?php echo $msg; ?>

<form method="post">

<input type="text"
name="username"
placeholder="Username"
required>

<input type="email"
name="email"
placeholder="Email"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button name="register">
Register
</button>

</form>

<br>

<center>

<a href="login.php">
Already have an account? Login
</a>

</center>

</div>

</body>
</html>