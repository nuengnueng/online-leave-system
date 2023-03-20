<?php
session_start();
echo '<pre>';
print_r($_SESSION);
echo'</pre>';
include('../connection/db.php');

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$lastname = $_SESSION['lastname'];


$sql = "SELECT username, lastname FROM personnel WHERE id = $id ";
$result =mysqli_query($conn,$sql) or die ("Error in query: $sql" . mysqli_error());
$row = mysqli_fetch_assoc($result);
extract($row);

$username = $row['username'];

echo $sql;

echo '<pre>';
print_r($row);
echo '</pre>';