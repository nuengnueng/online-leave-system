<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
if(isset($_POST) && !empty($_POST)){
    $nametitle = $_POST['nametitle'];
    $username = $_POST['username'] ;
    $lastname = $_POST['lastname'] ;
    $employees = $_POST['employees'];
    $position = $_POST['position'];
    $affiliation = $_POST['affiliation'] ;
    $typeofleave = $_POST['typeofleave'] ;
    $date = $_POST['date'];
    $dateto = $_POST['dateto'];
    $numberofleavedays = $_POST['numberofleavedays'];
    $reason = $_POST['reason'];
    $phonenumber = $_POST['phonenumber'];
   
   
    $sql = "INSERT INTO tb_user (nametitle,username,lastname,employees,position,affiliation,typeofleave,date,dateto,numberofleavedays,reason,phonenumber)
            VALUES ('$nametitle','$username','$lastname','$employees','$position','$affiliation','$typeofleave','$date','$dateto','$numberofleavedays','$reason','$phonenumber')";
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
<h2>แบบฟอร์มการลา</h2>
<form method="post" id="form" enctype="multipart/form-data"
action="">
    <label>คำนำหน้า :</label>
    <select type="text" name="nametitle" value="<?=$data['nametitle']?>">
    <option selected="">คำนำหน้า</option>
    <option>นาง</option>
    <option>นาย</option>
    <option>นางสาว</option>  
    </select><br><br>
    <label>ชื่อ :</label>
    <input type="text" name="username">
    <label>นามสกุล :</label>
    <input type="text" name="lastname"><br><br>
    <label>พนักงาน :</label>
    <select type="text" name="employees" value="<?=$data['employees']?>">
    <option selected="">พนักงาน</option>
    <option>พนักงานส่วนตำบล</option>
    <option>พนักงานจ้าง</option>
    </select><br><br>
    <label>ตำแหน่ง :</label>
    <input type="text" name="position"><br><br>
    <label>สังกัด :</label>
    <select type="text"  name="affiliation" value="<?=$data['affiliation']?>">
    <option selected="">สังกัด</option>
    <option>ผู้บริหารท้องถิ่น</option>
    <option>หัวหน้าส่วนราชการ</option>
    <option>สำนักงานปลัด</option>
    <option>กองช่าง</option>
    <option>กองการศึกษา ศาสนาและวัฒนธรรม</option>
    <option>กองคลัง</option>
    <option>หน่วยตรวจสอบภายใน</option>    
    </select><br><br>
    <label>ประเภทการลา :</label>
    <select type="text" name="typeofleave" value="<?=$data['typeofleave']?>">
    <option selected="">ประเภทการลา</option>
    <option>การลาป่วย</option>
    <option>การลากิจส่วนตัว</option>
    <option>การลาพักผ่อน</option>
    <option>การลาคลอดบุตร</option>
    <option>การลาบวช</option>
    </select><br><br>
    <label>ตั้งแต่:</label>
    <input type="date" name="date">
    <label>ถึง:</label>
    <input type="date" name="dateto"><br><br>
    <label>จำนวนวันที่ลา:</label>
    <input type="text" name="numberofleavedays"><br><br>
    <label>เหตุผล :</label>
    <input type="text" name="reason"><br><br>
    <label>โทรศัพท์:</label>
    <input type="text" name="phonenumber"><br><br>
 
    <input type="submit" value="บันทึก">
    <button><a href="formdate.php">ยกเลิก</a></button>
</form>  
</body>
</html>
 
 
 
 
 

