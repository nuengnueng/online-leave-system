<?php
include('../connection/connection.php');
$connection->set_charset("utf8");

$id = $_GET['id'];
$sql = "SELECT*FROM leave_type WHERE id = '$id'";
$query =mysqli_query($connection,$sql);
$data = mysqli_fetch_assoc($query);
if(isset($_POST) && !empty($_POST)){
    $id = $_POST['id'];
    $leave_name = $_POST['leave_name'];
    $leave_limit = $_POST['leave_limit'] ;
    $sql_edit = "UPDATE leave_type SET id='$id',leave_name='$leave_name',leave_limit='$leave_limit',
                                      WHERE id =
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
    <title>Document</title>
</head>
<body>
<?php (include '../admin/menu.html');?>
<div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
  <a href="list_admin.php" class="btn btn-success mb-3">ย้อนกลับ</a>
  <div class="display-6 text-center justify-content-center ">แก้ไขข้อมูล</div><br>
    <form action="insert_admin_db.php" method="POST">
      <div class="formbold-input-flex">
        <div>
          <label for="id" class="formbold-form-label"> No. </label>
          <input
            type="text"
            name="id"
            value="<?=$data['id']?>"
            id="id"
            placeholder="Your ID"
            class="formbold-form-input"
          />
        </div>
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

</body>
</html>