<?php
include('../connection/connection.php');
$sql = "SELECT*FROM leave_type";
$query = mysqli_query($connection, $sql);
$connection->set_charset("utf8");


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page leave admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <?php (include '../admin/menu.html'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
                
                <a href="leave_insert.php" class="btn btn-primary">+เพิ่มประเภทการลา</a><br><br>
            </div>
        </div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>ชื่อประเภทการลา</th>
                    <th>จำนวนวันที่ลาได้</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 0;
                 foreach ($query as $data) { 
                    $num++;
                    ?>
                    <tr>
                        <th><?php echo $num ?></th>
                        <td><?php echo $data['leave_name'] ?></td>
                        <td><?php echo $data['leave_limit'] ?></td>
                        <td><a href="edit_leave.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                        <td><a href="leave_delete.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"data-bs-toggle="modal" data-bs-target="#modalCart<?php echo $data['id']?>">ลบ</a></td>

                    </tr>
                     <!-- Modal -->
<div class="modal fade" id="modalCart<?php echo $data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลบประเภทการลา</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php echo $data['leave_name']?>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <a href="leave_delete.php?id=<?=$data['id']?>"class="btn btn-danger btn-sm" >ตกลง</a>
      </div>
    </div>
  </div>
</div>
                <?php } ?>
            </tbody>
        </table>

    </div>

</body>

</html>