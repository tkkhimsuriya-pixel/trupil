
<?php
session_start();
include "db.php";

$error = "";

if(isset($_POST['login']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['admin']=$username;
        header("Location: admin/dashboard.php");
        exit();
    }
    else
    {
        $error = "❌ Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>IT Asset Management System</title>

<link rel="stylesheet" href="css/style.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}


body{
    margin:0;
    padding:20px;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#2563eb,#1e3a8a);
    overflow:auto;
}

.login-box{
    width:400px;
    background:#fff;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
    text-align:center;
}

.logo{
    width:80px;
    height:80px;
    border-radius:50%;
    object-fit:cover;
    display:block;
    margin:0 auto 10px;
}


h2{

color:#2563eb;

margin-bottom:5px;

}

p{

color:#666;

margin-bottom:20px;

}

input{
    width:100%;
    padding:10px;
    margin:6px 0;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
}


button{
    width:100%;
    padding:10px;
    font-size:16px;
    border:none;
    border-radius:8px;
    background:#2563eb;
    color:white;
}



button:hover{

background:#1d4ed8;

}

.error{

background:#ffe5e5;

color:red;

padding:10px;

border-radius:8px;

margin-bottom:15px;

}

.options{

display:flex;

justify-content:space-between;

font-size:14px;

margin:10px 0 20px;

}

.footer{

margin-top:20px;

font-size:13px;

color:#888;

}

</style>

</head>

<body>

 


<div class="login-box">

<img src="image/tk8.png"
     class="logo"
     alt="Logo"
     onerror="this.src='image/logo.png';">

<h2>IT Asset Management System</h2>

<p>Welcome Administrator</p>

<?php
if($error!="")
{
echo "<div class='error'>$error</div>";
}
?>

<form method="post">
    <hr>

<p>
Don't have an account?
<a href="register.php">Register Here</a>
</p>

<input
type="text"
name="username"
placeholder="👤 Username"
required>

<input
type="password"
id="password"
name="password"
placeholder="🔒 Password"
required>

<div class="options">

<label>
<input type="checkbox" onclick="showPassword()">
Show Password
</label>

<a href="#">Forgot Password?</a>

</div>

<label>
<input type="checkbox">
Remember Me
</label>

<br><br>

<button type="submit" name="login">
🔐 Login
</button>

</form>

<div class="footer">

© 2026 IT Asset Management System

<br>

Developed by TK Khimsuriya

</div>

</div>

<script>

function showPassword(){

var x=document.getElementById("password");

if(x.type==="password")
{
x.type="text";
}
else
{
x.type="password";
}

}

</script>

</body>
</html>