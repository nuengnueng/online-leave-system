<?php
include('../connection/connection.php');
$sql = "SELECT*FROM personnel";
$query=mysqli_query($connection,$sql);
$connection->set_charset("utf8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php (include '../admin/menu.html');?>
    <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <a href="insert_admin.php" class="btn btn-primary">+เพิ่มพนักงาน</a> 
                    <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">ข้อมูลผู้ใช้ระบบ </a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>รหัสพนักงาน</th>
                                <th>คำนำหน้า</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>ตำแหน่ง</th>
                                <th>สังกัด</th>
                                <th>พนักงาน</th>
                                <th>แก้ไขพนักงาน</th>
                                <th>ลบพนักงาน</th>
                        
                            
                            </tr>
                            </thead>
                            <tbody>
 
        <?php foreach($query as $data){?>
        <tr>
           <td><?php echo $data['Psn_id']?></td>
            <td><?php echo $data['nametitle']?></td>
            <td><?php echo $data['username']?></td>
            <td><?php echo $data['lastname']?></td>
            <td><?php echo $data['phonenumber']?></td>
            <td><?php echo $data['position']?></td>
            <td><?php echo $data['affiliation']?></td>
            <td><?php echo $data['employees']?></td> 
            <td><a href="edit_admin.php?id=<?=$data['id']?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
            <td><a href="delete_admin.php?id=<?=$data['id']?>"class="btn btn-danger btn-sm">ลบ</a></td>  
 
        </tr>
 
        <?php } ?>
        </tbody>
    </table>
 
</body>
</html>
