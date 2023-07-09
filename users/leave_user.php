<?php
include('../connection/connection.php');

$sql = "SELECT id, leave_name FROM leave_type ";
$query1 = mysqli_query($connection, $sql);
$connection->set_charset("utf8");
?>
<?php
if (isset($_POST['id'])) {
    $selectedLeaveId = $_POST['id'];

    // คำสั่ง SQL สำหรับเลือกข้อมูลจากตาราง leave_type โดยใช้เงื่อนไขที่ระบุจาก select option
    $sql = "SELECT personnel.Psn_id, personnel.username, personnel.lastname, personnel.employees, leave_type.leave_name, leave_type.leave_limit, IFNULL(SUM(leave_information.postingDate), 0) AS Leave_Use, leave_type.leave_limit - IFNULL(SUM(leave_information.postingDate), 0) AS Total
            FROM personnel
            INNER JOIN leave_information ON personnel.Psn_id = leave_information.Psn_id
            INNER JOIN leave_type ON leave_type.id = leave_information.id
            WHERE leave_type.id = '$selectedLeaveId'
            GROUP BY personnel.Psn_id, personnel.username, personnel.lastname, personnel.employees, leave_type.leave_name, leave_type.leave_limit";

    $query = mysqli_query($connection, $sql);
    $connection->set_charset("utf8");
    }

mysqli_close($connection);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>
<body>
<form action="" method="post">
    <div class="mb-2">
        <div class="col-sm-2">
            <select name="id" class="form-control" required>
                <option value="">-เลือกประเภทการลา</option>
                <?php foreach($query1 as $row) { ?>
                    <option value="<?=$row['id'];?>"><?=$row['leave_name'];?></option>
                <?php } ?> 
            </select>
        </div>
    </div>
    <div class="d-grid gap-2 col-sm-2 mb-3">
        <button type="submit" class="btn btn-primary">ค้นหา</button>
    </div>
</form>
</body>
</html>

