<?php
session_start();

// Sabhi session variables hata do
$_SESSION = array();

// Session destroy karo
session_destroy();

// Browser cache clear
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Login page par bhejo
header("Location: ../index.php");
exit();
?>