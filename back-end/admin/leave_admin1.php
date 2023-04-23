<?php
include('../connection/connection.php');
$sql = "SELECT*FROM leave_type1";
$query = mysqli_query($connection, $sql);
$connection->set_charset("utf8");


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <?php (include '../admin/menu.html'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
                
                <a href="leave_insert1.php" class="btn btn-primary">+เพิ่มประเภทการลา</a><br><br>
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
                <?php foreach ($query as $data) { ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['leave_name'] ?></td>
                        <td><?php echo $data['leave_limit'] ?></td>
                        <td><a href="edit_leave1.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                        <td><a href="leave_delete1.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm">ลบ</a></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

</body>

</html>