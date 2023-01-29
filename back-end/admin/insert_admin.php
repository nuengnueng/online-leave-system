<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
if(isset($_POST) && !empty($_POST)){
    $Psn_id = $_POST['Psn_id'];
    $nametitle = $_POST['nametitle'];
    $username = $_POST['username'] ;
    $lastname = $_POST['lastname'] ;
    $phonenumber = $_POST['phonenumber'] ;
    $position = $_POST['position'];
    $affiliation = $_POST['affiliation'] ;
    $employees = $_POST['employees'];
    $password = $_POST['password'] ;
    
    $sql = "INSERT INTO personnel (Psn_id,nametitle,username,lastname,phonenumber,position,affiliation,employees,password)
            VALUES ('$Psn_id','$nametitle','$username','$lastname','$phonenumber','$position','$affiliation','$employees','$password')";
    $query = mysqli_query($connection,$sql);
    if($query){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='list_admin.php';</script>";
        
    }else{
        echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
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
    <script src="dist/sweetalert2.all.min.js"></script>
</head>
<body>
<?php (include '../admin/menu.html');?>
<a href="list_admin.php" class="btn btn-dark">ย้อนกลับ</a>
<div class="container">
      <div class="row">
        <div class="col-md-6"> <br>
          <h4>เพิ่มพนักงาน</h4>
          <hr><br>
          <form action="insert_admin_db.php" method="post" id="form"class="row g-3" enctype="multipart/form-data">
            <div class=" col-md-6">
                <label>รหัสพนักงาน :</label>    
                <input type="text" name="Psn_id" required><br><br>
                <label>คำนำหน้า :</label>
                <select type="text" name="nametitle"  value="<?=$data['nametitle']?>" required>
                <option selected="">-เลือกคำนำหน้า</option>
                <option>นาง</option>
                <option>นาย</option>
                <option>นางสาว</option>  
                </select><br><br>
                <label>ชื่อ :</label>
                <input type="text" name="username"required><br><br>
                <label>นามสกุล :</label>
                <input type="text" name="lastname" required><br><br>
                <label>รหัสผ่าน :</label>
                <input type="password" name="password" required><br><br>
                <label>เบอร์โทรศัพท์ :</label>
                <input type="text" name="phonenumber" required><br><br>
                <label>ตำแหน่ง :</label>
                <select type="text" name="position" value="<?=$data['position']?>" required>
                <option selected="">-เลือกตำแหน่ง</option>
                <option>ปลัดองค์การบริหารส่วนตำบล</option>
                <option>รองปลัดองค์การบริหารส่วนตำบล</option>
                <option>ผู้อำนวยการกองคลัง</option>
                <option>ผู้อำนวยการกองช่าง</option>
                <option>นิติกรชำนาญการ</option>
                <option>หัวหน้าสำนักปลัด</option>
                <option>นักวิชาการตรวจสอบภายในชำนาญการ</option>
                <option>นักจัดการงานทั่วไปชำนาญการ</option>
                <option>นักวิชาการศึกษาปฏิบัติการ</option> 
                <option>นักพัฒนาชุมชนชำนาญการ</option>
                <option>นักวิชาการพัสดุชำนาญการ</option> 
                <option>เจ้าหน้างานป้องกันเเละบรรเทาสาธารณภัยปฏิบัติงาน</option>
                <option>นายช่างโยธาปฏิบัติงาน</option> 
                <option>นักวิเคราะห์นโยบายเเละเเผนชำนาญการ</option>
                <option>ครูอันดับ คศ.2</option> 
                <option>ครูอันดับ คศ.3</option>
                <option>ผู้ช่วยเจ้าพนักงานธุรการ</option> 
                <option>ผู้ช่วยเจ้าพนักงานจัดเก็บรายได้</option>
                <option>ผู้ช่วยครูผู้ดูเเลเด็กเล็ก</option> 
                <option>นักการภารโรง</option>
                <option>นักช่วยนักวิชาการเกษตร</option> 
                <option>ผู้ช่วยเจ้าพนักงานศูนย์เยาวชน</option>
                <option>คนงานทั่วไป</option> 
                <option>ผู้ช่วยพนักงานประปา</option>
                <option>ผุ้ช่วยพนักงานธุรการ(กองช่าง)</option> 
                <option>ผู้ช่วยนักวิชาการสาธารณสุข</option>
                <option>พนักงานจ้างเหมา</option> 
                <option>พนักงานจ้างเหมาขับรถขยะ</option>
                <option>พนักงานจ้างเหมาช่างไฟ</option> 
                <option>พนักงานจ้างเหมาประชาสัมพันธ์</option> 
                </select><br><br>
                <label>สังกัด :</label>
                <select type="text"  name="affiliation"  value="<?=$data['affiliation']?>" required>
                <option selected="">-เลือกสังกัด</option>
                <option>ผู้บริหารท้องถิ่น</option>
                <option>หัวหน้าส่วนราชการ</option>
                <option>สำนักงานปลัด</option>
                <option>กองช่าง</option>
                <option>กองการศึกษา ศาสนาและวัฒนธรรม</option>
                <option>กองคลัง</option>
                <option>หน่วยตรวจสอบภายใน</option>    
                </select><br><br>
                <label>พนักงาน :</label>
                <select type="text" name="employees" value="<?=$data['employees']?>"required>
                <option selected="">-เลือกพนักงาน</option>
                <option>พนักงานส่วนตำบล</option>
                <option>พนักงานจ้าง</option>
                </select><br><br>
            
                <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
                <input type="reset" name="cancel" value="ยกเลิก" class="btn btn-danger">
</form>  
</body>
</html>
        
             
            
            

