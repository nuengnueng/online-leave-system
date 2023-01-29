<?php
    require_once'../connection/db.php';
   session_start();
   if(!isset($_SESSION["username"]))
   {
    header("location:../users/login.php");  
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE USER</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
<div>
    <?php
        if(isset($_SESSION['username'])) {
            $username_id = $_SESSION['username'];
            $stmt = $conn->query("SELECT * FROM personnel WHERE id = $username_id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        ?>
<?php (include '../users/menu.html');?>
<h1>ยินดีต้อนรับคุณ, <?php echo $row['username'] ?></h1>

</div>
<div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                <span class="self-center text-xl text-gray font-Sarabun whitespace-nowrap dark:text-white">รายการทั้งหมด</span>
<table class="table table-striped  table-hover table-responsive table-bordered">
  <tr>
    <th>No.</th>
    <th>รหัสประเภทการลา</th>
    <th>ชื่อประเภทการลา</th>
    <th>จำนวนวันที่ลาได้</th>
    <th>ใช้วันลา/วัน</th>
  </tr>
  <tr>
    <td>1</td>
    <td>1111</td>
    <td>ลาป่วย</td>
    <td>30</td>
    <td>0</td>
  </tr>
  <tr>
    <td>2</td>
    <td>2222</td>
    <td>ลากิจ</td>
    <td>7</td>
    <td>0</td>
  </tr>
  <tr>
    <td>3</td>
    <td>3333</td>
    <td>ลาพักร้อน</td>
    <td>7</td>
    <td>0</td>
  </tr>
  <tr>
    <td>4</td>
    <td>4444</td>
    <td>ลาคลอด</td>
    <td>90</td>
    <td>0</td>
  </tr>
  <tr>
    <td>5</td>
    <td>5555</td>
    <td>ลาบวช</td>
    <td>90</td>
    <td>0</td>
  </tr>
  <tr>
    <td>No.</td>
    <td>รหัสประเภทการลา</td>
    <td>ชื่อประเภทการลา</td>
    <td>จำนวนวันที่ลาได้</td>
    <td>ใช้วันลา/วัน</td>
  </tr>
</table>
<?php (include '../users/form_list.php');?>
</body>
</html>