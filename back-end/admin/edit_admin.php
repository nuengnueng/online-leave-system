

<?php
include('../connection/connection.php');
$connection->set_charset("utf8");

$id = $_GET['id'];
$sql = "SELECT*FROM personnel WHERE id = '$id'";
$query =mysqli_query($connection,$sql);
$data = mysqli_fetch_assoc($query);
if(isset($_POST) && !empty($_POST)){
    $Psn_id = $_POST['Psn_id'];
    $nametitle = $_POST['nametitle'];
    $username = $_POST['username'] ;
    $lastname = $_POST['lastname'] ;
    $password = $_POST['password'] ;
    $phonenumber = $_POST['phonenumber'] ;
    $position = $_POST['position'];
    $affiliation = $_POST['affiliation'] ;
    $employees = $_POST['employees'];
    $sql_edit = "UPDATE personnel SET Psn_id='$Psn_id',nametitle='$nametitle',username='$username',
                                     lastname='$lastname',password='$password',phonenumber='$phonenumber',
                                     position='$position',affiliation='$affiliation',employees='$employees' WHERE id =
                                     '$id' ";
                                     $query_edit = mysqli_query($connection,$sql_edit);
                                     if($query_edit){
                                      echo "<script> alert('อัพเดตข้อมูลเรียบร้อย');</script>";
                                      echo "<script>window.location='list_admin.php';</script>";
                                  }else{
                                      echo "Error:" . $sql . "<br>" . mysql_error($connection);
                                      echo "<script> alert('อัพเดตข้อมูลไม่ได้'); </script>";
                                      
                                  }
                                  mysqli_close($connection);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php (include '../admin/menu.html');?>
<a href="list_admin.php"class="btn btn-dark">ย้อนกลับ</a>
<div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
          <h4>แก้ไขพนักงาน</h4>
          <hr>
          <form action="" method="post" id="form" enctype="multipart/form-data">
            <div class="mb-1">
                <label>เลขประจำตัว :</label>
                <input type="text" name="Psn_id" value="<?=$data['Psn_id']?>"><br><br>
                <label>คำนำหน้า :</label>
                <input type="text" name="nametitle" value="<?=$data['nametitle']?>"><br><br>
                <label>ชื่อ :</label>
                <input type="text" name="username" value="<?=$data['username']?>"><br><br>
                <label>นามสกุล :</label>
                <input type="text" name="lastname" value="<?=$data['lastname']?>"><br><br>
                <label>รหัสผ่าน :</label>
                <input type="password" name="password" value="<?=$data['password']?>"><br><br>
                <label>เบอร์โทรศัพท์ :</label>
                <input type="text" name="phonenumber" value="<?=$data['phonenumber']?>"><br><br>
                <label>ตำแหน่ง :</label>
                <input type="text" name="position" value="<?=$data['position']?>"><br><br>
                <label>สังกัด :</label>
                <input type="text" name="affiliation" value="<?=$data['affiliation']?>"><br><br>
                <label>พนักงาน :</label>
                <input type="text" name="employees" value="<?=$data['employees']?>"><br><br>
                
                <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
                <input type="reset" name="cancel" value="ยกเลิก" class="btn btn-danger">
            </form>  
            </body>
            </html>

