<?php
include('../connection/connection.php');
$sql = "SELECT*FROM leave_information where status='2' ";
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
    <title>Bootstrap Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    
<?php (include '../Prime Minister/menu.html');?>
    <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3> อนุญาตการลา </h3>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>รหัสพนักงาน</th>
                                <th>คำนำหน้า</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>ประเภทการลา</th>
                                <th>รายละเอียดการขอลา</th>
                                <th>วันที่เริ่มลา</th>
                                <th>วันที่สิ้นสุด</th>
                                <th>จำนวนวันลา</th>
                                <th>แนบไฟล์</th>
                                <th>อนุมัติ</th>
                                <th>ไม่อนุมัติ</th>
                            
                            </tr>
                            </thead>
                            <tbody>
 
        <?php foreach($query as $data){?>
        <tr>
           <td><?php echo $data['Psn_id']?></td>
           <td><?php echo $data['nametitle']?></td>
           <td><?php echo $data['username']?></td>
           <td><?php echo $data['lastname']?></td>
            <td><?php echo $data['leave_name']?></td>
            <td><?php echo $data['description']?></td>
            <td><?php echo $data['start']?></td>
            <td><?php echo $data['end']?></td>
            <td><?php echo $data['id']?></td>
            <?php echo "<td>"."<img src='../img/".$data['img']."' width='100'>"."</td>";?> 
            <td><a href="prime_confirm.php?id=<?=$data['id']?>"class="btn btn-primary " onclick=" return confirn('คุณต้องการอนุมัติใช่หรือไม่')">อนุมัติ</a></td> 
            <td><a href="prime_confirm.php?id=<?=$data['id']?>"class="btn btn-warning  " onclick=" return confirn('คุณต้องการอนุมัติใช่หรือไม่')">ไม่อนุมัติ</a></td>  
            
        </tr>
  
        <?php } ?>
        </tbody>
    </table>
 
</body>
</html>
