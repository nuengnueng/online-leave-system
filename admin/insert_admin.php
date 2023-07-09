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
    $usertype = $_POST['usertype'] ;
    
    $sql = "INSERT INTO personnel (Psn_id,nametitle,username,lastname,phonenumber,position,affiliation,employees,password,usertype)
            VALUES ('$Psn_id','$nametitle','$username','$lastname','$phonenumber','$position','$affiliation','$employees','$password','$usertype')";
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


<div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
  <a href="list_admin.php" class="btn btn-success mb-3">ย้อนกลับ</a>
  <div class="display-6 text-center justify-content-center ">เพิ่มข้อมูล</div><br>
    <form action="" method="POST">
      <div class="formbold-input-flex">
        <div>
          <label for="Psn_id" class="formbold-form-label"> รหัสพนักงาน </label>
          <input
            type="text"
            name="Psn_id"
            id="Psn_id"
            placeholder="Your ID"
            class="formbold-form-input"
          />
        </div>

        <div>
          <label for="nametitle" class="formbold-form-label"> คำนำหน้า </label>
          <select class="formbold-form-input" name="nametitle" id="nametitle">
            <option selected="">-เลือกคำนำหน้า</option>
            <option value="Mrs">นาง</option>
            <option value="Mr">นาย</option>
            <option value="Miss">นางสาว</option>
            <option value="Sergeant Major">สิบเอก</option>
            <option value="pfc">สิบตรี</option>
            <option value="capt">ร้อยเอก</option>
            <option value="Sub lt">ร้อยตรี</option>
            <option value="mom luang">หม่อมหลวง</option>
            <option value="mom rajawong">หม่อมราชวงศ์</option>
            <option value="mom chao">หม่อมเจ้า</option>
            <option value="professor">ศาสตราจารย์</option>
            <option value="assistat professor">ผู้ช่วยศาสตราจารย์</option>
            <option value="associate professor">รองศาสตราจารย์</option>
            </select>
        </div>
      </div>

      <div class="formbold-input-flex">
        <div>
            <label for="username" class="formbold-form-label">ชื่อ</label>
            <input
            type="username"
            name="username"
            id="username"
            placeholder="Your username"
            class="formbold-form-input"
            />
        </div>
     
        <div>
            <label for="lastname" class="formbold-form-label">นามสกุล</label>
            <input
            type="lastname"
            name="lastname"
            id="lastname"
            placeholder="Your lastname"
            class="formbold-form-input"
            />
        </div>
      </div>
        <div>
            <label for="password" class="formbold-form-label">รหัสผ่าน</label>
            <input
            type="password"
            name="password"
            id="password"
            placeholder="Your password"
            class="formbold-form-input"
            />
        </div>

      <div class="formbold-mb-3 formbold-input-wrapp">
        <label for="phonenumber" class="formbold-form-label">เบอร์โทรศัพท์</label>

        <div>
          <input
            type="text"
            name="phonenumber"
            id="phonenumber"
            placeholder="Phone number"
            class="formbold-form-input"
          />
        </div>
      </div>

      <div class="formbold-mb-3">
          <label for="position" class="formbold-form-label"> ตำแหน่ง </label>
          <select class="formbold-form-input" name="position" id="position">
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
            </select>
      </div>
      <div class="formbold-mb-3">
          <label for="affiliation" class="formbold-form-label"> สังกัด </label>
          <select class="formbold-form-input" name="affiliation" id="affiliation">
                <option selected="">-เลือกสังกัด</option>    
                <option>ผู้บริหารท้องถิ่น</option>
                <option>หัวหน้าส่วนราชการ</option>
                <option>สำนักงานปลัด</option>
                <option>กองช่าง</option>
                <option>กองการศึกษา ศาสนาและวัฒนธรรม</option>
                <option>กองคลัง</option>
                <option>หน่วยตรวจสอบภายใน</option>  
            </select>
      </div>
      <div class="formbold-mb-3">
          <label for="employees" class="formbold-form-label"> พนักงาน </label>
          <select class="formbold-form-input" name="employees" id="employees">
                <option selected="">-เลือกพนักงาน</option>
                <option>พนักงานส่วนตำบล</option>
                <option>พนักงานจ้าง</option>
            </select>
      </div>
      <div class="formbold-mb-3">
          <label for="usertype" class="formbold-form-label"> สถานะผู้ใช้งาน </label>
          <select class="formbold-form-input" name="usertype" id="usertype">
                <option selected="">-เลือกสถานะผู้ใช้งาน</option> 
                <option>user</option>
                <option>admin</option> 
                <option>ผู้ตรวจสอบ</option>
                <option>นายกองค์การบริหารส่วนตำบล</option>
            </select>
      </div>
      <button class="formbold-btn">บันทึกข้อมูล</button>
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
        
             
            
            

