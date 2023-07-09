<?php
include('../connection/connection.php');

$sql = "SELECT id, leave_name FROM leave_type ";
$query1 = mysqli_query($connection, $sql);
$connection->set_charset("utf8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานการลา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">
    </script>
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

    // // แสดงตาราง
    // echo "<table>";
    // echo "<tr>";
    // echo "<th>Psn_id</th>";
    // echo "<th>username</th>";
    // echo "<th>lastname</th>";
    // echo "<th>employees</th>";
    // echo "<th>leave_name</th>";
    // echo "<th>leave_limit</th>";
    // echo "<th>Leave_Use</th>";
    // echo "<th>Total</th>";
    // echo "</tr>";

    // while ($row = mysqli_fetch_assoc($query)) {
    //     $Psn_id = $row['Psn_id'];
    //     $username = $row['username'];
    //     $lastname = $row['lastname'];
    //     $employees = $row['employees'];
    //     $leave_name = $row['leave_name'];
    //     $leave_limit = $row['leave_limit'];
    //     $Leave_Use = $row['Leave_Use'];
    //     $Total = $row['Total'];

    //     echo "<tr>";
    //     echo "<td>$Psn_id</td>";
    //     echo "<td>$username</td>";
    //     echo "<td>$lastname</td>";
    //     echo "<td>$employees</td>";
    //     echo "<td>$leave_name</td>";
    //     echo "<td>$leave_limit</td>";
    //     echo "<td>$Leave_Use</td>";
    //     echo "<td>$Total</td>";
    //     echo "</tr>";
    // }

    echo "</table>";
}

mysqli_close($connection);
?>
