<?php
include('../connection/connection.php');
$sql = "SELECT*FROM leave_information";
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
    
 
    <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3> ข้อมูลการลา </h3>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>รหัสประเภทการลา</th>
                                <th>ประเภทการลา</th>
                                <th>รายละเอียดการขอลา</th>
                                <th>วันที่เริ่มลา</th>
                                <th>วันที่สิ้นสุด</th>
                                <th>วันที่่ทำการลา</th>
                                <th>สถานะ</th>
                                <th>แนบไฟล์</th>
                                <th>แก้ไขข้อมูลการลา</th>
                                <th>ลบข้อมูลการลา</th>
                        
                            
                            </tr>
                            </thead>
                            <tbody>
 
        <?php foreach($query as $data){?>
        <tr>
           <td><?php echo $data['leave_id']?></td>
            <td><?php echo $data['leave_name']?></td>
            <td><?php echo $data['description']?></td>
            <td><?php echo $data['start']?></td>
            <td><?php echo $data['end']?></td>
            <td><?php echo $data['postingDate']?></td>
            <td><?php echo $data['status']?></td>
            <?php echo "<td>"."<img src='../img/".$data['img']."' width='100'>"."</td>";?>
            <td><a href="form_edit.php?id=<?=$data['id']?>" class="btn btn-warning ">แก้ไข</a></td>
            <td><a href="form_delete.php?id=<?=$data['id']?>"class="btn btn-danger ">ลบ</a></td>  
 
        </tr>
 
        <?php } ?>
        </tbody>
    </table>
 
</body>
</html>
