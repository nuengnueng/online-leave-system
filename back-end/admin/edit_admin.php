

<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
$id = $_GET['id'];
$sql = "SELECT*FROM tb_admin WHERE id = '$id'";
$query =mysqli_query($connection,$sql);
$data = mysqli_fetch_assoc($query);
if(isset($_POST) && !empty($_POST)){
    $idnumber = $_POST['idnumber'];
    $nametitle = $_POST['nametitle'];
    $username = $_POST['username'] ;
    $lastname = $_POST['lastname'] ;
    $password = $_POST['password'] ;
    $phonenumber = $_POST['phonenumber'] ;
    $position = $_POST['position'];
    $affiliation = $_POST['affiliation'] ;
    $employees = $_POST['employees'];
    $urole = $_POST['urole'] ;
    $sql_edit = "UPDATE tb_admin SET idnumber='$idnumber',nametitle='$nametitle',username='$username',
                                     lastname='$lastname',password='$password',phonenumber='$phonenumber',
                                     position='$position',affiliation='$affiliation',employees='$employees',urole='$urole' WHERE id =
                                     '$id' ";
                                     $query_edit = mysqli_query($connection,$sql_edit);
                                     if($query_edit){
                                        echo 'อัปเดตข้อมูลสำเร็จ';
                                     }else{
                                        echo'อัปเดตข้อมูลไม่สำเร็จ';
                                     }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Insert</title>
</head>
<body>
<?php (include '../menu/menu.php');?>
<a href="list_admin.php">ย้อนกลับ</a>
<h2>แก้ไขพนักงาน</h2>
<form method="post" id="form" enctype="multipart/form-data"
action="">
    <label>Id number :</label>
    <input type="text" name="idnumber" value="<?=$data['idnumber']?>"><br>
    <label>Nametitle :</label>
    <input type="text" name="nametitle" value="<?=$data['nametitle']?>"><br>
    <label>Username :</label>
    <input type="text" name="username" value="<?=$data['username']?>"><br>
    <label>Lastname :</label>
    <input type="text" name="lastname" value="<?=$data['lastname']?>"><br>
    <label>Password :</label>
    <input type="password" name="password" value="<?=$data['password']?>"><br>
    <label>Phonenumber :</label>
    <input type="text" name="phonenumber" value="<?=$data['phonenumber']?>"><br>
    <label>Position :</label>
    <input type="text" name="position" value="<?=$data['position']?>"><br>
    <label>Affiliation :</label>
    <input type="text" name="affiliation" value="<?=$data['affiliation']?>"><br>
    <label>Employees :</label>
    <input type="text" name="employees" value="<?=$data['employees']?>"><br>
    <label>Urole :</label>
    <input type="text" name="urole" value="<?=$data['urole']?>"><br>
    <input type="submit" value="บันทึก">
</form>  
</body>
</html>

