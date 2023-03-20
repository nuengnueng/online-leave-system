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
                <a class="navbar-brand">ข้อมูลผู้ใช้ระบบ</a>
                    <a href="insert_admin.php" class="btn btn-primary">+เพิ่มพนักงาน</a> 
                    <a href="leave_admin.php" class="btn btn-primary">+ประเภทการลา</a> 
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
            <td><a href="delete_admin.php?id=<?=$data['id']?>"class="btn btn-danger btn-sm">ลบ</a></td>  
 
        </tr>
 
        <?php } ?>
        </tbody>
    </table>
 
</body>
</html>
