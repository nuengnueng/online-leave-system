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
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
 <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">
</script>
 <script>    
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head>
<body>
    <?php (include '../admin/menu.html');?>
    <div class="container"> 
            <div class="row">
                <div class="col-md-12"> <br>
                <a class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลผู้ใช้ระบบ</a><br><br>
                    <a href="insert_admin.php" class="btn btn-primary">+เพิ่มพนักงาน</a><br><br>
                    <a href="leave_admin.php" class="btn btn-primary">+ประเภทการลา พนักงานส่วนตำบล</a>
                    <a href="leave_admin1.php" class="btn btn-primary">+ประเภทการลา พนักงานจ้าง</a> 
            </div>
                </div>
    </div>

                    
<?php echo "<table id='example' class='display' cellspacing='0' border='1'>"; ?>
<?php echo"
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
                                <th>สถานะผู้ใช้งาน</th>
                                <th>แก้ไขพนักงาน</th>
                                <th>ลบพนักงาน</th>
                        
                            
                            </tr>
                        </thead>
                        ";?>
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
            <td><?php echo $data['usertype']?></td>
            <td><a href="edit_admin.php?id=<?=$data['id']?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
            <td><a href="delete_admin.php?id=<?=$data['id']?>"class="btn btn-danger btn-sm"data-bs-toggle="modal" data-bs-target="#modalCart<?php echo $data['Psn_id']?>">ลบ</a></td>  
 
        </tr>
 <!-- Modal -->
<div class="modal fade" id="modalCart<?php echo $data['Psn_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลบข้อมูลพนักงาน</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php echo $data['username']?>
      <?php echo $data['lastname']?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <a href="delete_admin.php?id=<?=$data['id']?>"class="btn btn-danger btn-sm" >ตกลง</a>
      </div>
    </div>
  </div>
</div>
        <?php } ?>
        </tbody>
    </table>
 
</body>
</html>
