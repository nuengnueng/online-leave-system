<?php
include('../connection/connection.php');
if (isset($_SESSION['username'])) {
    $username_id = $_SESSION['username'];
    $stmt = $conn->query("SELECT * FROM personnel WHERE id = $username_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $Psn_id = $row['Psn_id'];

    $sql = "SELECT*,DATEDIFF(end , start) as sumdate FROM leave_information  WHERE Psn_id = '$Psn_id'
ORDER BY Psn_id ASC";
    $query = mysqli_query($connection, $sql);
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
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
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


    <br><br>
    <div class="container-fluid px-4">
        <a class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลการลา</a>
    </div><br><br>
    <!-- <form action="" method="POST" class="form-horizontal">
        <div class="row">
            <div class="col-sm-2">จาก :
                <input type="date" name="from_date" value="<?php if (isset($_POST['from_date'])) {
                                                                echo $_POST['from_date'];
                                                            } ?>">
            </div>
            <div class="col-sm-2">ถึง :
                <br><input type="date" name="to_date" value="<?php if (isset($_POST['to_date'])) {
                                                                echo $_POST['to_date'];
                                                            } ?>">
            </div>
            <div class="col-sm-4">
               <br> <button type="submit" class="btn btn-secondary">ค้นหา</button>
            </div> -->
            <?php echo "<table id='example' class='display' cellspacing='0' border='1'>"; ?>
            <?php echo "
                        <thead>
                            <tr>
                                
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
                                <th>ยกเลิกการลา</th>
                        
                            
                            </tr>
                            </thead>
                            "; ?>
            <tbody>
                
 <?php foreach($query as $data){?>
 <tr>

                                <td><?php echo $data['nametitle'] ?></td>
                                <td><?php echo $data['username'] ?></td>
                                <td><?php echo $data['lastname'] ?></td>
                                <td><?php echo $data['leave_name'] ?></td>
                                <td><?php echo $data['description'] ?></td>
                                <td><?php echo $data['phonenumber'] ?></td>
                                <td><?php echo date('d/m/Y ', strtotime($data["start"])) ?></td>
                                <td><?php echo date('d/m/Y ', strtotime($data["end"])) ?></td>
                                <?php echo "<td>";
                                $sm = $data["postingDate"];
                                echo '';
                                echo $sm;
                                echo ' วัน ';
                                if ($data["half_day"] == "M") {
                                    echo "เช้า";
                                }
                                if ($data["half_day"] == "A") {
                                    echo "บ่าย";
                                }
                                echo "</td>"; ?>



                                <?php echo "<td>" . "<img src='../img/" . $data['img'] . "' width='100'>" . "</td>"; ?>
                                <!-- <td><?php echo $data['status'] ?> </td> -->
                                <?php
                                if ($data['status'] == '1') {
                                    echo "<td> รอดำเนินการ 0/2 </td>";
                                }
                                if ($data['status'] == '2') {
                                    echo "<td> รอดำเนินการ 1/2 </td>";
                                }
                                if ($data['status'] == '3') {
                                    echo "<td> อนุญาต  </td>";
                                }
                                if ($data['status'] == '4') {
                                    echo "<td> ไม่อนุญาต </td>";
                                }

                                ?>

                                <td><a href="form_delete.php?id=<?= $data['id'] ?>"class="btn btn-danger btn-sm"data-bs-toggle="modal" data-bs-target="#modalCart<?php echo $data['Psn_id']?>">ยกเลิก</a></td>  

                            </tr>
                            <div class="modal fade" id="modalCart<?php echo $data['Psn_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการยกเลิก</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        วันที่เริ่มลา
      <?php echo $data['start']?>
        วันที่สิ้นสุด
      <?php echo $data['end']?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <a href="form_delete.php?id=<?=$data['id']?>"class="btn btn-danger btn-sm" >ตกลง</a>
      </div>
    </div>
  </div>
 <?php } ?>
            </tbody>
            </table>


</body>

</html>