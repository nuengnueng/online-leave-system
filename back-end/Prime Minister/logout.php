<?php
include('../connection/connection.php');
$connection->set_charset("utf8");

session_start();
session_destroy();
header("location:../Prime Minister/login.php");
 
?>

   