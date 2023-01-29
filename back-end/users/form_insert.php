<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
if(isset($_POST) && !empty($_POST)){
  $leave_id = $_POST['leave_id'];
  $leave_name = $_POST['leave_name'] ;
  $description = $_POST['description'] ;
  $start = $_POST['start'];
  $end = $_POST['end'] ;
  $postingDate = $_POST['postingDate'] ;
  $status = $_POST['status'];

  $date1 = date("Ymd_His");
  $numrand = (mt_rand());
  $img = (isset($_POST['img']) ? $_POST['img'] : '');
  $upload = $_FILES['img']['name'];
  if($upload !=''){
    $path ="../img/";
    $type = strrchr($_FILES['img']['name'],".");
    $newname = $numrand.$date1.$type;
    $path_copy = $path.$newname;
    $path_link = "../img/".$newname;

    move_uploaded_file($_FILES['img']['tmp_name'],$path_copy);
  }
   
    $sql = "INSERT INTO leave_information (leave_id,leave_name,description,start,end,postingDate,status,img)
            VALUES ('$leave_id','$leave_name','$description','$start','$end','$postingDate','$status','$newname')";
    $query = mysqli_query($connection,$sql);
    if($query){
      echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
      echo "<script>window.location='../users/userhome.php';</script>";
      
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
    <title>Form Date</title>
    <script src="dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

</head>
<body>
<?php (include '../users/menu.html');?>
<a href="userhome.php" class="btn btn-dark">ย้อนกลับ</a>
<div class="container">
      <div class="row">
        <div class="col-md-4 "> <br>
          <h4>แบบฟอร์มการลา</h4>
          <hr>
          <form action="" method="post" id="form" enctype="multipart/form-data">
            <div class="mb-1">
                <label>รหัสประเภทการลา :</label>
                <select type="text" name="leave_id" value="<?=$data['leave_id']?>"required>
                <option selected="">- เลือกรหัสประเภทการลา</option>
                <option>1111</option>
                <option>2222</option>
                <option>3333</option>
                <option>4444</option>
                <option>5555</option>  
                </select><br><br>
                <label>ชื่อประเภทการลา :</label>
                <select type="text"  name="leave_name" value="<?=$data['leave_name']?>"required>
                <option selected="">- เลือกชื่อประเภทการลา</option>
                <option>ลาป่วย</option>
                <option>ลากิจ</option>
                <option>ลาบวช</option> 
                <option>ลาพักร้อน</option>
                <option>ลาคลอด</option> 
                </select><br><br>
                <label>รายละเอียดการขอลา :</label>
                <input type="text" name="description"required><br><br>
                <label>วันที่เริ่มลา:</label>
                <input type="date" name="start"required><br><br>
                <label>วันที่สิ้นสุด:</label>
                <input type="date" name="end"required><br><br>
                <label>วันที่ทำการลา:</label>
                <input type="date" name="postingDate"required><br><br>
                <div class="form-group">
                  <div class="col-sm-2 control-label">
                     แนบไฟล์:
                </div>
                <div class="col-sm-6">
                  <input type="file"name="img" required class="form-control"
                  accept="image/*">
                  </div>
                </div>
                <label>สถานะ:</label>
                <select type="text" name="status" value="<?=$data['status']?>"required>
                <option selected="">เลือกสถานะ</option>
                <option>รอการอนุมัติ</option> 
                </select><br><br>
              
                
                
 
                <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
                <input type="reset" name="cancel" value="ยกเลิก" class="btn btn-danger">
</div>
     </div>
        </div>
            </div>

            </form>  
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
 
 
 
 
 
