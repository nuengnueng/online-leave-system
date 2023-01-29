<?php
    require_once'../connection/db.php';
   session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php (include '../users/menu.html');?>
    <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                <span class="self-center text-xl text-gray font-Sarabun whitespace-nowrap dark:text-white">จำนวนวันที่ลาไปแล้ว</span>
<table class="table table-striped  table-hover table-responsive table-bordered">
  <tr>
    <th>No.</th>
    <th>รหัสพนักงาน</th>
    <th>ชื่อ</th>
    <th>นามสกุล</th>
    <th>ลาป่วย (วัน)</th>
    <th>ลากิจ (วัน)</th>
    <th>ลาพักร้อน (วัน)</th>
    <th>ลาคลอด (วัน)</th>
    <th>ลาบวช (วัน)</th>
    <th>ไม่อนุมัติ</th>
  </tr>
  <tr>
</body>
</html>
          
</body>
</html>