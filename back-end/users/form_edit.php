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

$id = $_GET['id'];
$sql = "SELECT*FROM leave_information WHERE id = '$id'";
$query =mysqli_query($connection,$sql);
$data = mysqli_fetch_assoc($query);
if(isset($_POST) && !empty($_POST)){
    $leave_id = $_POST['Psn_id'];
    $leave_id = $_POST['nametitle'];
    $leave_id = $_POST['username'];
    $leave_id = $_POST['lastname'];
    $leave_name = $_POST['leave_name'] ;
    $description = $_POST['description'] ;
    $start = $_POST['start'];
    $end = $_POST['end'] ;
    $phonenumber = $_POST['phonenumber'];
    $img = $_POST['img'];
    $sql_edit = "UPDATE leave_information SET Psn_id='$Psn_id',nametitle='$nametitle',username='$username',lastname='$lastname',leave_name='$leave_name',description='$description',
                                     start='$start',end='$end',phonenumber='$phonenumber',img='$img' WHERE id =
                                     '$id' ";
                                     $query_edit = mysqli_query($connection,$sql_edit);
                                     if($query_edit){
                                      echo "<script> alert('อัพเดตข้อมูลเรียบร้อย');</script>";
                                      echo "<script>window.location='userhome.php';</script>";
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
<?php (include '../users/menu.html');?>
<div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
  <a href="userhome.php" class="btn btn-success mb-3">ย้อนกลับ</a>
  <div class="display-6 text-center justify-content-center ">แบบฟอร์มการลา</div><br>
    <form action="" method="post" id="form" enctype="multipart/form-data">
      <div class="formbold-input-flex">
         <div>
          <label for="Psn_id" class="formbold-form-label"> รหัสพนักงาน </label>
          <input
            type="text"
            name="Psn_id"
            value="<?=$data['Psn_id']?>"
            id="Psn_id"
            placeholder="Your ID"
            class="formbold-form-input"
          />
        </div>
        <div>
          <label for="nametitle" class="formbold-form-label"> คำนำหน้า </label>
          <select class="formbold-form-input" name="nametitle" id="nametitle">
            <option value="นาง" <?php if($data['nametitle']=="นาง") echo"selected";?>>นาง</option>
            <option value="นาย" <?php if($data['nametitle']=="นาย") echo"selected";?>>นาย</option>
            <option value="นางสาว" <?php if($data['nametitle']=="นางสาว") echo"selected";?>>นางสาว</option>
            <option value="สิบเอก" <?php if($data['nametitle']=="สิบเอก") echo"selected";?>>สิบเอก</option>
            </select>
        </div>
      </div>

      <div class="formbold-input-flex">
        <div>
            <label for="username" class="formbold-form-label">ชื่อ</label>
            <input
            type="username"
            name="username"
            value="<?=$data['username']?>"
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
            value="<?=$data['lastname']?>"
            id="lastname"
            placeholder="Your lastname"
            class="formbold-form-input"
            />
        </div>
        <div>
            <label for="leave_name" class="formbold-form-label">ชื่อประเภทการลา </label>
            <select class="formbold-form-input"type="text"  name="leave_name">
            <option value="ลาป่วย" <?php if($data['leave_name']=="ลาป่วย") echo"selected";?>>ลาป่วย</option>
            <option value="ลากิจ" <?php if($data['leave_name']=="ลากิจ") echo"selected";?>>ลากิจ</option>
            <option value="ลาบวช"<?php if($data['leave_name']=="ลาบวช") echo"selected";?>>ลาบวช</option> 
            <option value="ลาพักร้อน" <?php if($data['leave_name']=="ลาพักร้อน") echo"selected";?>>ลาพักร้อน</option>
            <option value="ลาคลอด" <?php if($data['leave_name']=="ลาคลอด") echo"selected";?>>ลาคลอด</option> 
            </select>
        </div>
      </div>
      <div class="formbold-mb-3">
        <label for="description" class="formbold-form-label">
          รายละเอียดการขอลา
        </label>
        <input
       
          name="description"
          value="<?php echo $data['description'];?>"
          id="description"
          placeholder="description"
          class="formbold-form-input"
        />
      </div>

      <div class="formbold-mb-3 formbold-input-wrapp">
        <label for="phonenumber" class="formbold-form-label">เบอร์โทรศัพท์</label>

        <div>
          <input
            type="text"
            name="phonenumber"
            value="<?=$data['phonenumber']?>"
            id="phonenumber"
            placeholder="Phone number"
            class="formbold-form-input"
          />
        </div>
      </div>

      <div class="formbold-mb-3">
          <label for="start" class="formbold-form-label"> วันที่เริ่มลา</label>
          <input type="date" name="start" value="<?=$data['start']?>"id="start" class="formbold-form-input" />
      </div>
      <div class="formbold-mb-3">
          <label for="end" class="formbold-form-label">วันที่สิ้นสุด</label>
          <input type="date" name="end" value="<?=$data['end']?>"id="end" class="formbold-form-input" />
      </div>
      <div class="formbold-form-file-flex">
        <label for="img" class="formbold-form-label">
        แนบไฟล์
        </label>
        <input
          type="file"
          name="img"
          value="<?=$data['img']?>"
          accept="image/*"
          id="img"
          class="formbold-form-file"
        />
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
  .formbold-form-input::placeholder,
  select.formbold-form-input,
  .formbold-form-input[type='date']::-webkit-datetime-edit-text,
  .formbold-form-input[type='date']::-webkit-datetime-edit-month-field,
  .formbold-form-input[type='date']::-webkit-datetime-edit-day-field,
  .formbold-form-input[type='date']::-webkit-datetime-edit-year-field {
    color: rgba(83, 99, 135, 0.5);
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

  .formbold-form-file-flex {
    display: flex;
    align-items: center;
    gap: 20px;
  }
  .formbold-form-file-flex .formbold-form-label {
    margin-bottom: 0;
  }
  .formbold-form-file {
    font-size: 14px;
    line-height: 24px;
    color: #536387;
  }
  .formbold-form-file::-webkit-file-upload-button {
    display: none;
  }
  .formbold-form-file:before {
    content: 'Upload file';
    display: inline-block;
    background: #EEEEEE;
    border: 0.5px solid #FBFBFB;
    box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.25);
    border-radius: 3px;
    padding: 3px 12px;
    outline: none;
    white-space: nowrap;
    -webkit-user-select: none;
    cursor: pointer;
    color: #637381;
    font-weight: 500;
    font-size: 12px;
    line-height: 16px;
    margin-right: 10px;
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

