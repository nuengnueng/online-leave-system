

<?php
include('../connection/connection.php');
$connection->set_charset("utf8");

$id = $_GET['id'];
$sql = "SELECT*FROM leave_information WHERE id = '$id'";
$query =mysqli_query($connection,$sql);
$data = mysqli_fetch_assoc($query);
if(isset($_POST) && !empty($_POST)){
    $leave_id = $_POST['leave_id'];
    $leave_name = $_POST['leave_name'] ;
    $description = $_POST['description'] ;
    $start = $_POST['start'];
    $end = $_POST['end'] ;
    $phonenumber = $_POST['phonenumber'];
    $postingDate = $_POST['postingDate'];
    $status = $_POST['status'] ;
    $leave_limit = $_POST['leave_limit'];
    $sql_edit = "UPDATE leave_information SET leave_id='$leave_id',leave_name='$leave_name',description='$description',
                                     start='$start',end='$end',phonenumber='$phonenumber',postingDate='$postingDate',status='$status',leave_limit='$leave_limit' WHERE id =
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
<a href="userhome.php"class="btn btn-dark">ย้อนกลับ</a>
<div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
          <h4>แก้ไขการลา</h4>
          <hr>
          <form action="" method="post" id="form" enctype="multipart/form-data">
            <div class="mb-1">
                <label>รหัสประเภทการลา:</label>
                <input type="text" name="leave_id" value="<?=$data['leave_id']?>"><br><br>
                <label>ประเภทการลา :</label>
                <input type="text" name="leave_name" value="<?=$data['leave_name']?>"><br><br>
                <label>รายละเอียดการลา :</label>
                <input type="text" name="description" value="<?=$data['description']?>"><br><br>
                <label>วันที่เริ่มลา :</label>
                <input type="date" name="start" value="<?=$data['start']?>"><br><br>
                <label>วันที่สิ้นสุด :</label>
                <input type="date" name="end" value="<?=$data['end']?>"><br><br>
                <label>เบอร์โทรศัพท์ :</label>
                <input type="text" name="phonenumber" value="<?=$data['phonenumber']?>"><br><br>
                <label>วันที่ทำการลา :</label>
                <input type="date" name="postingDate" value="<?=$data['postingDate']?>"><br><br>
                <label>สถานะ:</label>
                <input type="text" name="status" value="<?=$data['status']?>"><br><br>
                <label>จำกัดการลา:</label>
                <input type="text" name="leave_limit" value="<?=$data['leave_limit']?>"><br><br>
                
                <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
                <input type="reset" name="cancel" value="ยกเลิก" class="btn btn-danger">
            </form>  
            </body>
            </html>

