<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
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
   
    $sql = "INSERT INTO tb_admin (idnumber,nametitle,username,lastname,password,phonenumber,position,affiliation,employees,urole)
            VALUES ('$idnumber','$nametitle','$username','$lastname','$password','$phonenumber','$position','$affiliation','$employees','$urole')";
    $query = mysqli_query($connection,$sql);
    if($query){
        echo 'เพิ่มข้อมูลเข้าสู่ระบบ';
    }else{
        echo 'ไม่สามารถเพิ่มข้อมูลได้';
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
<h2>เพิ่มพนักงาน</h2>
<form method="post" id="form" enctype="multipart/form-data"
action="">
    <label>Id number :</label>
    <input type="text" name="idnumber"><br>
    <label>Nametitle :</label>
    <select type="text" name="nametitle" value="<?=$data['nametitle']?>">
    <option selected="">คำนำหน้า</option>
    <option>นาง</option>
    <option>นาย</option>
    <option>นางสาว</option>  
    </select><br>
    <label>Username :</label>
    <input type="text" name="username"><br>
    <label>Lastname :</label>
    <input type="text" name="lastname"><br>
    <label>Password :</label>
    <input type="password" name="password"><br>
    <label>Phonenumber :</label>
    <input type="text" name="phonenumber"><br>
    <label>Position :</label>
    <input type="text" name="position"><br>
    <label>Affiliation :</label>
    <select type="text"  name="affiliation" value="<?=$data['affiliation']?>">
    <option selected="">สังกัด</option>
    <option>ผู้บริหารท้องถิ่น</option>
    <option>หัวหน้าส่วนราชการ</option>
    <option>สำนักงานปลัด</option>
    <option>กองช่าง</option>
    <option>กองการศึกษา ศาสนาและวัฒนธรรม</option>
    <option>กองคลัง</option>
    <option>หน่วยตรวจสอบภายใน</option>    
    </select><br>
    <label>Employees :</label>
    <select type="text" name="employees" value="<?=$data['employees']?>">
    <option selected="">พนักงาน</option>
    <option>พนักงานส่วนตำบล</option>
    <option>พนักงานจ้าง</option>
    </select><br>
    <label>Urole :</label>
    <select type="text" name="urole" value="<?=$data['urole']?>">
    <option selected="">สถานะผู้ใช้งาน</option>
    <option>user</option>
    <option>admin</option>  
    </select><br>
 
    <input type="submit" value="บันทึก">
</form>  
</body>
</html>
 
 
 
 

