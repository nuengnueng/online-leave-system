<?php
    require_once'../connection/db.php';
   session_start();
   if(!isset($_SESSION["username"]))
   {
    header("location:../login/login.php");  
   }
?>
<?php
include('../connection/connection.php');
$connection->set_charset("utf8");

if(isset($_SESSION['username'])) {
    $admin_id = $_SESSION['username'];
    $stmt = $conn->query("SELECT * FROM personnel WHERE id = $admin_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
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
<div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
  <a href="list_admin.php" class="btn btn-success mb-3">ย้อนกลับ</a>
  <div class="display-6 text-center justify-content-center ">แก้ไขข้อมูล</div><br>
    <form action="proflie_edit.php" method="POST">
      <div class="formbold-input-flex">
       
        <div>
          <label for="nametitle" class="formbold-form-label"> คำนำหน้า </label>
          <select class="formbold-form-input" name="nametitle"id="nametitle">

            <option value="Mrs"<?php if($row['nametitle']=="Mrs"){echo"selected";}?>>นาง</option>
            <option value="Mr" <?php if($row['nametitle']=="Mr"){echo"selected";}?>>นาย</option>
            <option value="Miss" <?php if($row['nametitle']=="Miss"){echo"selected";}?>>นางสาว</option>
            <option value="Sergeant Major" <?php if($row['nametitle']=="Sergeant Major"){echo"selected";}?>>สิบเอก</option>
            </select>
        </div>
      </div>

      <div class="formbold-input-flex">
        <div>
            <label for="username" class="formbold-form-label">ชื่อ</label>
            <input
            type="text"
            name="username"
            value="<?=$row['username']?>"
            id="username"
            placeholder="Your username"
            class="formbold-form-input"
            />
        </div>
     
        <div>
            <label for="lastname" class="formbold-form-label">นามสกุล</label>
            <input
            type="text"
            name="lastname"
            value="<?=$row['lastname']?>"
            id="lastname"
            placeholder="Your lastname"
            class="formbold-form-input"
            />
        </div>
      </div>
        

      <div class="formbold-mb-3 formbold-input-wrapp">
        <label for="phonenumber" class="formbold-form-label">เบอร์โทรศัพท์</label>

        <div>
          <input
            type="text"
            name="phonenumber"
            value="<?=$row['phonenumber']?>"
            id="phonenumber"
            placeholder="Phone number"
            class="formbold-form-input"
          />
        </div>
      </div>

      <div class="formbold-mb-3">
          <label for="position" class="formbold-form-label"> ตำแหน่ง </label>
          <select class="formbold-form-input" name="position" id="position">
                
                <option value="ปลัด"<?php if($row['position']=="ปลัด"){echo"selected";}?>>ปลัดองค์การบริหารส่วนตำบล</option>
                <option value="รองปลัด"<?php if($row['position']=="รองปลัด"){echo"selected";}?>>รองปลัดองค์การบริหารส่วนตำบล</option>
                <option value="กองคลัง"<?php if($row['position']=="กองคลัง"){echo"selected";}?>>ผู้อำนวยการกองคลัง</option>
                <option value="กองช่าง"<?php if($row['position']=="กองช่าง"){echo"selected";}?>>ผู้อำนวยการกองช่าง</option>
                <option value="นิติกร"<?php if($row['position']=="นิติกร"){echo"selected";}?>>นิติกรชำนาญการ</option>
                <option value="สำนักปลัด"<?php if($row['position']=="สำนักปลัด"){echo"selected";}?>>หัวหน้าสำนักปลัด</option>
                <option value="วิชาการ"<?php if($row['position']=="วิชาการ"){echo"selected";}?>>นักวิชาการตรวจสอบภายในชำนาญการ</option>
                <option  value="นักจัดการ"<?php if($row['position']=="นักจัดการ"){echo"selected";}?>>นักจัดการงานทั่วไปชำนาญการ</option>
                <option value="นักวิชาการ"<?php if($row['position']=="นักวิชาการ"){echo"selected";}?>>นักวิชาการศึกษาปฏิบัติการ</option> 
                <option value="นักพัฒนา"<?php if($row['position']=="นักพัฒนา"){echo"selected";}?>>นักพัฒนาชุมชนชำนาญการ</option>
                <option value="ชำนาญการ"<?php if($row['position']=="ชำนาญการ"){echo"selected";}?>>นักวิชาการพัสดุชำนาญการ</option> 
                <option value="งานป้องกัน"<?php if($row['position']=="งานป้องกัน"){echo"selected";}?>>เจ้าหน้างานป้องกันเเละบรรเทาสาธารณภัยปฏิบัติงาน</option>
                <option value="ช่างโยธา"<?php if($row['position']=="ช่างโยธา"){echo"selected";}?>>นายช่างโยธาปฏิบัติงาน</option> 
                <option value="นักวิเคราะห์"<?php if($row['position']=="นักวิเคราะห์"){echo"selected";}?>>นักวิเคราะห์นโยบายเเละเเผนชำนาญการ</option>
                <option value="คศ.2"<?php if($row['position']=="คศ.2"){echo"selected";}?>>ครูอันดับ คศ.2</option> 
                <option value="คศ.3"<?php if($row['position']=="คศ.3"){echo"selected";}?>>ครูอันดับ คศ.3</option>
                <option value="ธุรการ"<?php if($row['position']=="ธุรการ"){echo"selected";}?>>ผู้ช่วยเจ้าพนักงานธุรการ</option> 
                <option value="เก็บรายได้"<?php if($row['position']=="เก็บรายได้"){echo"selected";}?>>ผู้ช่วยเจ้าพนักงานจัดเก็บรายได้</option>
                <option value="ผู้ช่วยครู"<?php if($row['position']=="ผู้ช่วยครู"){echo"selected";}?>>ผู้ช่วยครูผู้ดูเเลเด็กเล็ก</option> 
                <option value="ภารโรง"<?php if($row['position']=="ภารโรง"){echo"selected";}?>>นักการภารโรง</option>
                <option value="นักวิชาการ"<?php if($row['position']=="นักวิชาการ"){echo"selected";}?>>นักช่วยนักวิชาการเกษตร</option> 
                <option value="ศูนย์เยาวชน"<?php if($row['position']=="ศูนย์เยาวชน"){echo"selected";}?>>ผู้ช่วยเจ้าพนักงานศูนย์เยาวชน</option>
                <option value="คนงานทั่วไป"<?php if($row['position']=="คนงานทั่วไป"){echo"selected";}?>>คนงานทั่วไป</option> 
                <option value="พนักงานประปา"<?php if($row['position']=="พนักงานประปา"){echo"selected";}?>>ผู้ช่วยพนักงานประปา</option>
                <option value="กองช่าง"<?php if($row['position']=="กองช่าง"){echo"selected";}?>>ผู้ช่วยพนักงานธุรการ(กองช่าง)</option> 
                <option value="สาธารณสุข"<?php if($row['position']=="สาธารณสุข"){echo"selected";}?>>ผู้ช่วยนักวิชาการสาธารณสุข</option>
                <option value="จ้างเหมา"<?php if($row['position']=="จ้างเหมา"){echo"selected";}?>>พนักงานจ้างเหมา</option> 
                <option value="ขับรถขยะ"<?php if($row['position']=="ขับรถขยะ"){echo"selected";}?>>พนักงานจ้างเหมาขับรถขยะ</option>
                <option value="ช่างไฟ"<?php if($row['position']=="ช่างไฟ"){echo"selected";}?>>พนักงานจ้างเหมาช่างไฟ</option> 
                <option value="จ้างเหมา"<?php if($row['position']=="จ้างเหมา"){echo"selected";}?>>พนักงานจ้างเหมาประชาสัมพันธ์</option>
            </select>
      </div>
      <div class="formbold-mb-3">
          <label for="affiliation" class="formbold-form-label"> สังกัด </label>
          <select class="formbold-form-input" name="affiliation"id="affiliation">
                    
                <option value="ท้องถิ่น"<?php if($row['position']=="ท้องถิ่น"){echo"selected";}?>>ผู้บริหารท้องถิ่น</option>
                <option value="ส่วนราชการ"<?php if($row['position']=="ส่วนราชการ"){echo"selected";}?>>หัวหน้าส่วนราชการ</option>
                <option value="งานปลัด"<?php if($row['position']=="งานปลัด"){echo"selected";}?>>สำนักงานปลัด</option>
                <option value="กองช่าง" <?php if($row['position']=="กองช่าง"){echo"selected";}?>>กองช่าง</option>
                <option value="กองการศึกษา"<?php if($row['position']=="กองการศึกษา"){echo"selected";}?>>กองการศึกษา ศาสนาและวัฒนธรรม</option>
                <option value="กองคลัง"<?php if($row['position']=="กองคลัง"){echo"selected";}?>>กองคลัง</option>
                <option value="สอบภายใน"<?php if($row['position']=="สอบภายใน"){echo"selected";}?>>หน่วยตรวจสอบภายใน</option>  
            </select>
      </div>
      <div class="formbold-mb-3">
          <label for="employees" class="formbold-form-label"> พนักงาน </label>
          <select class="formbold-form-input" name="employees"id="employees">
               
                <option value="พนักงานส่วนตำบล"<?php if($row['position']=="พนักงานส่วนตำบล"){echo"selected";}?>>พนักงานส่วนตำบล</option>
                <option value="พนักงานจ้าง"<?php if($row['position']=="พนักงานจ้าง"){echo"selected";}?>>พนักงานจ้าง</option>
            </select>
      </div>
      <div class="formbold-mb-3">
          <label for="usertype" class="formbold-form-label"> สถานะผู้ใช้งาน </label>
          <select class="formbold-form-input" name="usertype"id="usertype">
                
                <option value="user"<?php if($row['position']=="user"){echo"selected";}?>>user</option>
                <option value="admin"<?php if($row['position']=="admin"){echo"selected";}?>>admin</option> 
                <option value="ผู้ตรวจสอบ"<?php if($row['position']=="ผู้ตรวจสอบ"){echo"selected";}?>>ผู้ตรวจสอบ</option>
                <option value="นายก"<?php if($row['position']=="นายก"){echo"selected";}?>>นายกองค์การบริหารส่วนตำบล</option>
            </select>
      </div>
      <input type="submit" name="Submit" value="Save" class="formbold-btn"></input>
    </form>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Inter', sans-serif;
  }
  .formbold-mb-3 {
    margin-bottom: 15px;
  }

  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    max-width: 570px;
    width: 100%;
    background: white;
    padding: 40px;
  }

  .formbold-input-wrapp > div {
    display: flex;
    gap: 20px;
  }

  .formbold-input-flex {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
  }
  .formbold-input-flex > div {
    width: 50%;
  }
  .formbold-form-input {
    width: 100%;
    padding: 13px 22px;
    border-radius: 5px;
    border: 1px solid #dde3ec;
    background: #ffffff;
    font-weight: 500;
    font-size: 16px;
    color: #536387;
    outline: none;
    resize: none;
  }
  
  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  .formbold-form-label {
    color: #07074D;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    display: block;
    margin-bottom: 10px;
  }


  .formbold-btn {
    text-align: center;
    width: 100%;
    font-size: 16px;
    border-radius: 5px;
    padding: 14px 25px;
    border: none;
    font-weight: 500;
    background-color: #6a64f1;
    color: white;
    cursor: pointer;
    margin-top: 25px;
  }
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }

  .formbold-w-45 {
    width: 45%;
  }
</style>
            </body>
            </html>

