<?php
include('../connection/connection.php');
$connection->set_charset("utf8");

$id = $_GET['id'];
$sql = "SELECT*FROM leave_type WHERE id = '$id'";
$query =mysqli_query($connection,$sql);
$data = mysqli_fetch_assoc($query);
if(isset($_POST) && !empty($_POST)){
    
    $leave_name = $_POST['leave_name'];
    $leave_limit = $_POST['leave_limit'] ;
    if(intval($leave_limit)< 1){
      echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
    }else{
    $sql_edit = "UPDATE leave_type SET id ='$id',leave_name ='$leave_name',leave_limit='$leave_limit'
                                      WHERE id =
                                     '$id' ";
                                     $query_edit = mysqli_query($connection,$sql_edit);
                                     if($query_edit){
                                      echo "<script> alert('อัพเดตข้อมูลเรียบร้อย');</script>";
                                      echo "<script>window.location='leave_admin.php';</script>";
                                  }else{
                                      echo "Error:" . $sql . "<br>" .mysqli_error($connection);
                                      echo "<script> alert('อัพเดตข้อมูลไม่ได้'); </script>";
                                      
                                  }
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
    <title>Page edit</title>
</head>
<body>
<?php (include '../admin/menu.html');?>
<div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
  <a href="leave_admin.php" class="btn btn-success mb-3">ย้อนกลับ</a>
  <div class="display-4 text-center justify-content-center ">แก้ไขข้อมูล</div><br><br>
    <form action="" method="POST">
      <div class="formbold-input-flex">
        
        <div class="formbold-input-flex">
        <div>
            <label for="leave_name" class="formbold-form-label">ชื่อประเภทการลา</label>
            <input
            type="leave_name"
            name="leave_name"
            value="<?=$data['leave_name']?>"
            id="leave_name"
            placeholder="Your leave_name"
            class="formbold-form-input"
            />
        </div>
        <div>
            <label for="leave_limit" class="formbold-form-label">จำนวนวันที่ลาได้</label>
            <input
            type="leave_limit"
            name="leave_limit"
            value="<?=$data['leave_limit']?>"
            id="leave_limit"
            placeholder="Your leave_limit"
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
    width: 100%;
    padding: 13px 22px;
    border-radius: 5px;
    border: 1px solid #dde3ec;
    background: #ffffff;
    font-weight: 500;
    font-size: 18px;
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
    width: 10%;
    font-size: 16px;
    border-radius: 5px;
    padding: 1px 2px;
    border: none;
    font-weight: 20;
    background-color: #6a64f1;
    color: white;
    cursor: pointer;
    margin-top: 45px;
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