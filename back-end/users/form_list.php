
<?php
include('../connection/connection.php');
if(isset($_SESSION['username'])) {
    $username_id = $_SESSION['username'];
    $stmt = $conn->query("SELECT * FROM personnel WHERE id = $username_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $Psn_id = $row['Psn_id'];
    
$sql = "SELECT*,DATEDIFF(end , start) as sumdate FROM leave_information  WHERE Psn_id = '$Psn_id'
ORDER BY Psn_id ASC" ;
$query=mysqli_query($connection,$sql);
$connection->set_charset("utf8");
}
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
                                <th>รหัสพนักงาน</th>
                                <th>คำนำหน้า</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>ประเภทการลา</th>
                                <th>รายละเอียดการขอลา</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>วันที่เริ่มลา</th>
                                <th>วันที่สิ้นสุด</th>
                                <th>จำนวนวันที่ลา</th>
                                <th>แนบไฟล์</th>
                                <th>สถานะ</th>
                                <th>แก้ไขข้อมูลการลา</th>
                                <th>ลบข้อมูลการลา</th>
                        
                            
                            </tr>
                            </thead>
                            <tbody>
 
        <?php foreach($query as $data){?>
        <tr>
        <?php echo "<td>" .$data["Psn_id"] .  "</td> ";?>
           <td><?php echo $data['nametitle']?></td>
           <td><?php echo $data['username']?></td>
           <td><?php echo $data['lastname']?></td>
            <td><?php echo $data['leave_name']?></td>
            <td><?php echo $data['description']?></td>
            <td><?php echo $data['phonenumber']?></td>
            <td><?php echo date('d/m/Y ',strtotime($data["start"]))?></td>
            <td><?php echo date('d/m/Y ',strtotime($data["end"]))?></td>   
            <?php echo "<td>";
            $sm = $data["postingDate"];
                echo '';
                echo $sm;
                echo ' วัน';
                echo "</td>"; ?>   


                
            <?php echo "<td>"."<img src='../img/".$data['img']."' width='100'>"."</td>";?>
            <!-- <td><?php echo $data['status']?> </td> -->
            <?php 
                if($data['status']=='1'){ 
                    echo "<td> รอดำเนินการ 0/2 </td>";
                }
                if($data['status']=='2'){
                    echo "<td> รอดำเนินการ 1/2 </td>";
                }
                if($data['status']=='3'){
                    echo "<td> อนุญาต  </td>";
                }
                if($data['status']=='4'){
                    echo "<td> ไม่อนุญาต </td>";
                }
            
            ?>
            <td><a href="form_edit.php?id=<?=$data['id']?>" class="btn btn-warning ">แก้ไข</a></td>
            <td><a href="form_delete.php?id=<?=$data['id']?>"class="btn btn-danger ">ลบ</a></td>  
 
        </tr>
 
        <?php } ?>
        </tbody>
    </table>
    

</body>
</html>
