<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
 
$_SESSION["USER_ID"]='';
 
echo("<script> top.location.href='../'</script>");

