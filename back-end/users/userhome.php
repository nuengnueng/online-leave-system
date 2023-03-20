<?php
require_once '../connection/db.php';
session_start();
if (!isset($_SESSION["username"])) {
  header("location:../login/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME PAGE USER</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
  <div>
    <?php
    include('../connection/connection.php');
    if (isset($_SESSION['username'])) {
      $username_id = $_SESSION['username'];
      $stmt = $conn->query("SELECT * FROM personnel WHERE id = $username_id");
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $Psn_id = $row['Psn_id'];

      $sql = "SELECT leave_type.id AS id ,leave_type.leave_name AS name,leave_type.leave_limit AS leavelimit , IFNULL(DATEDIFF(leave_information.end,leave_information.start),0)AS total
FROM leave_type 
LEFT JOIN leave_information 
ON leave_information.leave_name = leave_type.leave_name AND leave_information.Psn_id = '$Psn_id'
GROUP BY leave_type.leave_name";
      $query = mysqli_query($connection, $sql);
      $connection->set_charset("utf8");
      $index = '1';
    }
    ?>
    <?php (include '../users/menu.html'); ?>
    <h1>ยินดีต้อนรับคุณ, <?php echo $row['username'] ?></h1>

  </div>
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"></h1>
      <!--การสร้างลิงค์ เรียกไฟล์ myReport.pdf แสดงผลไฟล์ PDF  -->
      <a href="Report.pdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Report</a>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12"> <br>
          <span class="self-center text-xl text-gray font-Sarabun whitespace-nowrap dark:text-white">รายการทั้งหมด</span>
          <table class="table table-striped  table-hover table-responsive table-bordered">
            <tr>
              <th>No.</th>
              <th>ชื่อประเภทการลา</th>
              <th>จำนวนวันที่ลาได้</th>
              <th>ใช้วันลา/วัน</th>
              <th>คงเหลือ</th>

            </tr>
            <?php foreach ($query as $data) { ?>

              <tr>
                <td><?php echo $index ?></td>
                <?php ++$index ?>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo $data['leavelimit'] ?> </td>
                <td><?php echo $data['total'] ?> </td>
                <td><?php echo (intval($data['leavelimit']) - intval($data['total'])) ?> </td>
              </tr>
            <?php } ?>


          </table>
          <?php (include '../users/form_list.php'); ?>
        
</body>

</html>