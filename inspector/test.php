<?php
require_once '../connection/db.php';
session_start();
if (!isset($_SESSION["username"])) {
    header("location:../login/login.php");
}
?>
<?php
include('../connection/connection.php');
$sql = "SELECT*FROM leave_information";
$query = mysqli_query($connection, $sql);
$connection->set_charset("utf8");
?>
<?php
// include('../connection/connection.php');
// $sql = "SELECT*FROM leave_type ORDER BY id asc";
// $query1 = mysqli_query($connection, $sql);
// $connection->set_charset("utf8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page check</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</head>

<body>
    <?php (include '../inspector/menu.html'); ?>
    <br><br><div class="container-fluid px-4">
    <a class="alert alert-primary h4 text-center mt-4" role="alert">ตรวจสอบการลาพนักงาน</a>
</div>
<br><br>
    <form action="" method="POST" class="form-horizontal">
  <div class="row">
    <div class="col-sm-2">จาก :
      <input type="date" name="from_date" value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date'];}?>">
    </div>
    <div class="col-sm-2">ถึง :
      <input type="date" name="to_date" value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date'];}?>">
    </div>
    <div class="col-sm-4">
    <button style="background-color:#0d6efd; " type="submit" class="btn btn-secondary">ค้นหา</button>
  </div>
    </form>
   
    <?php echo "<table id='example' class='display' cellspacing='0' border='1'>"; ?>
    <?php echo "
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
                    <th>แนบไฟล์</th>
                    <th>สถานะ</th>
                                
                        
                            
                </tr>
        </thead>
        "; ?>
    <tbody>

    <?php 
        if(isset($_POST['from_date']) && isset($_POST['to_date']))
        {
          $from_date = $_POST['from_date'];
          $to_date = $_POST['to_date'];

          $query = "SELECT * FROM leave_information WHERE start BETWEEN '$from_date' AND '$to_date'";
          $query_run = mysqli_query($connection,$query);


          if(mysqli_num_rows($query_run) > 0)

          {
             foreach($query_run as $data)
             {
              ?>
              <tr>
    
                <td><?php echo $data['Psn_id'] ?></td>
                <td><?php echo $data['nametitle'] ?></td>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['lastname'] ?></td>
                <td><?php echo $data['leave_name'] ?></td>
                <td><?php echo $data['description'] ?></td>
                <td><?php echo $data['start'] ?></td>
                <td><?php echo $data['end'] ?></td>
                <?php echo "<td>" . "<img src='../img/" . $data['img'] . "' width='100'>" . "</td>"; ?>

                <?php
                if ($data['status'] == '1') {
                    echo "<td> รอดำเนินการ </td>";
                }
                if ($data['status'] == '2') {
                    echo "<td> อนุญาต </td>";
                }
                if ($data['status'] == '3') {
                    echo "<td> ไม่อนุญาต </td>";
                }
                ?>
                </tr>
              <?php
             }
          }
          else
          {
            
            echo "No Record Found";
          }
       
        }

        
        
        
        ?>
    </tbody>
    </table>
    
</body>

</html>