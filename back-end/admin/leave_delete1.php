<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Delete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="dist/sweetalert2.all.min.js"></script>
</head>
<body>
<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
   $ids = $_GET['id'];
   $sql = "DELETE FROM leave_type1 WHERE id = '$ids'";
   if(mysqli_query($connection,$sql)){
    echo "<script> alert('ลบข้อมูลเรียบร้อย');</script>";
    echo "<script>window.location='leave_admin1.php';</script>";
   }else{
    echo "Error:" . $sql ."<br>" . mysqli_error($connection);
    echo "<script>alert('ไม่สามารถลบข้อมูลไม่ได้'); </script>";
        
   }
   mysqli_close($connection);

?>
</body>
</html>