<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "leave_online_system";
 
    //create connection
    $connection = mysqli_connect($servername,$username,$password,$db);
 
    // check connection
    if (!$connection) {
        die("Connection failed" . mysqli_connect_error());
    }
    //echo "connection successfully";
    $connection->set_charset("utf8");
 
 
?>

