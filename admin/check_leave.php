<?php
include('../connection/connection.php');

// $sql = "SELECT id, leave_name FROM leave_type ";
// $query1 = mysqli_query($connection, $sql);
// $connection->set_charset("utf8");
?>

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


    echo "</table>";
}

mysqli_close($connection);
?>
