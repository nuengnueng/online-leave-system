
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<?php (include '../inspector/menu.html');?>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">ตรวจสอบการลาพนักงาน</a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
<table class="table table-striped  table-hover table-responsive table-bordered">
        <thead>
                <tr>
                    <th>รหัสประเภทการลา</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>ชื่อประเภทการลา</th>
                    <th>รายละเอียดการขอลา</th>
                    <th>วันที่เริ่มลา</th>
                    <th>วันที่สิ้นสุด</th>
                    <th>ลาตั้งแต่</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>วันที่ทำการลา</th>
                    <th>สถานะ</th>
                                
                        
                            
                </tr>
        </thead>
    </table>
   
</body>
</html>