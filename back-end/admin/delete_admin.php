<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php (include '../menu/menu.php');?>
    

<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
if(isset($_POST) && !empty($_POST)){
   // print_r($_POST);
   $id = $_POST['id'];
   $sql = "DELETE FROM tb_admin WHERE id = '$id'";
   $query = mysqli_query($connection,$sql);
   if($query){
    header("Location:list_admin.php");
   }else{
    echo 'การลบพนักงานผิดพลาด';
   }
 
}
 
?>
<form action="" method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>"
    <label>ยืนยันการลบพนักงาน</label>
    <input type="submit" value="ยืนยัน">
    <button><a href="list_admin.php">ยกเลิก</a></button>
</form>
</body>
</html>