<?php
include('../connection/connection.php');
$sql = "SELECT*FROM tb_admin";
$query=mysqli_query($connection,$sql);
$connection->set_charset("utf8");
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
    <?php (include '../menu/menu.php');?>
 
<h2>เพิ่มพนักงาน</h2>
<a href="insert_admin.php">เพิ่มพนักงาน<br></a><br>
    <table border="1">
        <tr>
            <td>เลขประจำตัว</td>
            <td>คำนำหน้า</td>
            <td>ชื่อ</td>
            <td>นามสกุล</td>
            <td>รหัสผ่าน</td>
            <td>เบอร์โทรศัพท์</td>
            <td>ตำแหน่ง</td>
            <td>สังกัด</td>
            <td>พนักงาน</td>
            <td>สถานะผู้ใช้</td>
            <td>แก้ไขพนักงาน</td>
            <td>ลบพนักงาน</td>
       
           
        </tr>
 
        <?php foreach($query as $data){?>
        <tr>
           <td><?php echo $data['idnumber']?></td>
            <td><?php echo $data['nametitle']?></td>
            <td><?php echo $data['username']?></td>
            <td><?php echo $data['lastname']?></td>
            <td><?php echo $data['password']?></td>
            <td><?php echo $data['phonenumber']?></td>
            <td><?php echo $data['position']?></td>
            <td><?php echo $data['affiliation']?></td>
            <td><?php echo $data['employees']?></td>
            <td><?php echo $data['urole']?></td>  
            <td><a href="edit_admin.php?id=<?=$data['id']?>">แก้ไข</a></td>
            <td><a href="delete_admin.php?id=<?=$data['id']?>">ลบ</a></td>  
 
        </tr>
 
        <?php } ?>
    </table>
 
</body>
</html>

