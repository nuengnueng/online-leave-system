<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
if(isset($_POST) && !empty($_POST)){
    $id = $_POST['id'];
    $leave_name = $_POST['leave_name'];
    $leave_limit = $_POST['leave_limit'] ;
 
   
    
    $sql = "INSERT INTO leave_type1 (id,leave_name,leave_limit)
            VALUES ('$id','$leave_name','$leave_limit')";
    $query = mysqli_query($connection,$sql);
    if($query){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='leave_admin1.php';</script>";
        
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="dist/sweetalert2.all.min.js"></script>
</head>
<body>
<?php (include '../admin/menu.html');?>
<div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
  <a href="leave_admin1.php" class="btn btn-success mb-3">ย้อนกลับ</a>
  <div class="display-6 text-center justify-content-center ">เพิ่มประเภทการลา</div><br><br>
    <form action="" method="POST">
      <div class="formbold-input-flex">
        <div>
          <label for="id" class="formbold-form-label"> No. </label>
          <input
            type="text"
            name="id"
            id="id"
            placeholder="Your ID"
            class="formbold-form-input"
          />
        </div>
        <div class="formbold-input-flex">
        <div>
            <label for="leave_name" class="formbold-form-label">ชื่อประเภทการลา</label>
            <input
            type="text"
            name="leave_name"
            id="leave_name"
            placeholder="ประเภทการลา"
            class="formbold-form-input"
            />
        </div>
        <div>
            <label for="leave_limit" class="formbold-form-label">จำนวนวันที่ลาได้</label>
            <input
            type="text"
            name="leave_limit"
            id="leave_limit"
            placeholder="จำนวนวันที่ลาได้"
            class="formbold-form-input"
            />
        </div>
      </div><br><br>
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
    width: 90%;
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
    width: 15%;
    font-size: 16px;
    border-radius: 5px;
    padding: 1px 2px;
    border: none;
    font-weight: 20;
    background-color: #6a64f1;
    color: white;
    cursor: pointer;
    margin-top: 50px;
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