<?php

include "../db.php";

if(isset($_GET['id'])){


$id=$_GET['id'];


// allocation delete

mysqli_query($conn,

"DELETE FROM allocation WHERE id=$id"

);


// asset status available

header("Location:view_allocation.php");


}


?>