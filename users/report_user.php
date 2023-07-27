<?php
    require_once'../connection/db.php';
   session_start();
   if(!isset($_SESSION["username"]))
   {
    header("location:../login/login.php");  
   }
   
   $username_id = $_SESSION['username'];
   $stmt = $conn->query("SELECT * FROM personnel WHERE id = $username_id");
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $Psn_id = $row['Psn_id'];
?>
<?php
include('../connection/connection.php');
$sql="SELECT personnel.Psn_id, 
personnel.username, 
personnel.lastname, 
personnel.employees, 
leave_type.leave_name, 
leave_type.leave_limit, 
IFNULL(SUM(leave_information.postingDate), 0) AS Leave_Use, 
leave_type.leave_limit - IFNULL(SUM(leave_information.postingDate), 0) AS Total
FROM personnel
INNER JOIN leave_information ON personnel.Psn_id = leave_information.Psn_id
INNER JOIN leave_type ON leave_type.leave_name = leave_information.leave_name
GROUP BY personnel.Psn_id, 
  personnel.username, 
  personnel.lastname, 
  personnel.employees, 
  leave_type.leave_name, 
  leave_type.leave_limit

";
$query=mysqli_query($connection,$sql);
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
 <script>    
// $(document).ready(function() {
//     $('#example').DataTable();
// } );
</script>
</head>
<body>

<?php (include '../users/menu.html');?>
<br><br><div class="container">
    <a class="alert alert-primary h4 text-center mt-4" role="alert">รายงานการลา</a>
</div>
<br><br>
<?php (include '../users/leave_user.php');?>
<?php echo "<table id='example' class='display' cellspacing='0' border='1'>"; ?>
<?php echo"
        <thead>
                <tr>
                    <th>รหัสพนักงาน</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>พนักงาน</th>
                    <th>ประเภทการลา</th>
                    <th>จำนวนวันที่ลาได้</th>
                    <th>ใช้วันลา/วัน</th>
                    <th>คงเหลือ</th>
        
                </tr>
        </thead>
        ";?>
        <tbody>
 
 <?php foreach($query as $data){?>
 <tr>
    
    <td><?php echo $data['Psn_id']?></td>
     <td><?php echo $data['username']?></td>
     <td><?php echo $data['lastname']?></td>
     <td><?php echo $data['employees']?></td>
     <td><?php echo $data['leave_name'] ?></td>
     <td><?php echo $data['leave_limit'] ?></td>
     <td><?php echo $data['Leave_Use'] ?></td>
     <td><?php echo $data['Total'] ?></td>
    
     
 </tr>

 <?php } ?>
 </tbody>
    </table>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script type="text/javascript">

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'print'
        ]
    } );

</script>
</body>
</html>