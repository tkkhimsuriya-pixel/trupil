<?php

include "../db.php";


session_start();

include "../db.php";
$admin = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT id, username, email FROM admin WHERE username='".$_SESSION['admin']."'"
    )
);

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

// Total Assets
$asset = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM assets")
);

// Total Employees
$employee = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM employees")
);

// Total Assigned Assets
$assign = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM allocation")
);

?>


<!DOCTYPE html>

<html>

<head>


<title>IT Asset Management Dashboard</title>


<link rel="stylesheet" href="../css/style.css">


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>



<body>
  



<div class="header">



<img src="../image/tk7.png" class="rounded-circle Logo" alt="Logo">


<h1>
IT Asset Management System
</h1>



<button onclick="darkMode()" class="dark-btn">

🌙 Dark Mode

</button>



</div>





<div class="sidebar">


<a href="dashboard.php">
🏠 Dashboard
</a>


<a href="add_asset.php">
💻 Add Asset
</a>


<a href="view_asset.php">
📋 View Asset
</a>


<a href="add_employee.php">
👨‍💼 Add Employee
</a>


<a href="view_employee.php">
👥 Employees
</a>


<a href="allocation.php">
🔄 Assign Asset
</a>


<a href="view_allocation.php">
📊 Reports
</a>


<a href="logout.php">
🚪 Logout
</a>


</div>






<div class="main">



<div class="welcome">
    


<h2>
👋 Welcome Admin
</h2>


<p>
Manage your IT Assets and Employees easily
</p>


</div>





<div class="profile-box">

<h3>👤 Admin Profile</h3>

<p><strong>ID:</strong> <?php echo $admin['id']; ?></p>

<p><strong>Username:</strong> <?php echo $admin['username']; ?></p>

<p><strong>Email:</strong> <?php echo $admin['email']; ?></p>

<p id="time"></p>

</div>






<div class="cards">



<div class="card">


<h2>
💻 Assets
</h2>


<h1>

<?php echo $asset; ?>

</h1>


<p>
Total Devices
</p>


</div>





<div class="card">


<h2>
👨‍💼 Employees
</h2>


<h1>

<?php echo $employee; ?>

</h1>


<p>
Total Employees
</p>


</div>





<div class="card">


<h2>
🔄 Assigned
</h2>


<h1>

<?php echo $assign; ?>

</h1>


<p>
Active Allocation
</p>


</div>


</div>







<div class="chart-box">


<h2>
📊 Asset Report
</h2>


<canvas id="myChart"></canvas>


</div>








<div class="activity">


<h2>
🔔 Recent Activity
</h2>


<div class="activity-item">
💻 New Asset Added
</div>


<div class="activity-item">
👨‍💼 Employee Registered
</div>


<div class="activity-item">
🔄 Asset Assigned
</div>


<div class="activity-item">
📊 Report Generated
</div>


</div>








<div class="progress-box">


<h2>
📈 System Overview
</h2>


<p>Assets</p>

<div class="bar">

<div class="asset-bar"></div>

</div>



<p>Employees</p>

<div class="bar">

<div class="employee-bar"></div>

</div>



<p>Assigned</p>

<div class="bar">

<div class="assign-bar"></div>

</div>



</div>







</div>






<script>


const ctx = document.getElementById('myChart');


new Chart(ctx,{


type:'doughnut',


data:{


labels:[

'Assets',

'Employees',

'Assigned'

],


datasets:[{


data:[

<?php echo $asset; ?>,

<?php echo $employee; ?>,

<?php echo $assign; ?>

]


}]


},


options:{


responsive:true


}


});





function darkMode(){


document.body.classList.toggle("dark");


}





function showTime(){


let d=new Date();


document.getElementById("time").innerHTML=

"📅 "+d.toLocaleString();


}


setInterval(showTime,1000);


showTime();



</script>







<footer>


© 2026 IT Asset Management System


</footer>



</body>

</html> 