<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include "../db.php";

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header("Location: view_asset.php");
    exit();
}

$id = (int)$_GET['id'];

// Asset Image निकालें (यदि image column है)
$result = mysqli_query($conn,"SELECT image FROM assets WHERE id=$id");

if(mysqli_num_rows($result)>0){

    $row = mysqli_fetch_assoc($result);

    if(!empty($row['image']) && file_exists("../uploads/".$row['image'])){
        unlink("../uploads/".$row['image']);
    }
}

// Database से Delete
mysqli_query($conn,"DELETE FROM assets WHERE id=$id");

header("Location: view_asset.php");
exit();

?>