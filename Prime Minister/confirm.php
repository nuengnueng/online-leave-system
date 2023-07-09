
<?php
include('../connection/connection.php');
$sql = "SELECT*FROM leave_information where status='3' ";
$query=mysqli_query($connection,$sql);
$connection->set_charset("utf8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
   $ids = $_GET['id'];
   $sql = "SELECT*FROM leave_information where status='4' ";
   if(mysqli_query($connection,$sql)){
    echo "<script> alert('ยืนยัน');</script>";
    echo "<script>window.location='main.php';</script>";
   }
   mysqli_close($connection);

?>