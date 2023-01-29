<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
   
 <?php  
 $connection = mysqli_connect("localhost","root","","leave_system") or die("Error: " . mysqli_error($connection));
 mysqli_query($connection , "SET NAMES 'utf8' ");
 error_reporting( error_reporting() & ~E_NOTICE );
 date_default_timezone_set('Asia/Bangkok');
  
 ?>
 <br>
 <h3>DATEDIFF </h3>
 <br>
 <form action="date_add_db.php" method="POST" enctype="multipart/form-data"  name="add" class="form-horizontal" id="add">
   
   <div class="form-group">
     <div class="col-sm-2" align="right"> วันที่เริ่ม</div>
     <div class="col-sm-3" align="left">
       <input type="date" name="StartDate" id="dateBirth" class="form-control">
     </div>
   </div>
  
   <div class="form-group">
     <div class="col-sm-2" align="right"> วันสิ้นสุด </div>
     <div class="col-sm-3" align="left">
       <input type="date" name="EndDate" id="dateBirth" class="form-control">
     </div>
   </div>
   <div class="form-group">
     <div class="col-sm-2"> </div>
     <div class="col-sm-6">
       <button type="submit" class="btn btn-success" id="btn"> คำนวณ </button>
     </div>
   </div>
   </form>
   <div class="col-sm-6">
   <?php
 $query_temple = "SELECT * ,DATEDIFF(EndDate , StartDate) as sumdate FROM leave_system 
 ORDER BY borrowID ASC
 " or die("Error:" . mysqli_error());
 $result = mysqli_query($connection, $query_temple);
 //echo($query_temple);
 // exit();
 echo ' <table id="example1" class="table table-bordered table-striped">';
   echo "<thead>";
     echo "<tr class='info'>
       <th width='5%'>ID</th>
         <th width='10%'>วันที่เริ่ม</th>
       <th width='10%'>วันสิ้นสุด</th>
       <th width='10%'>เท่ากับ</th>
     </tr>";
   echo "</thead>";
   while($row = mysqli_fetch_array($result)) {
   echo "<tr>";
     echo "<td>" .$row["borrowID"] .  "</td> ";
     echo "<td>";
       echo date('d/m/Y',strtotime($row["StartDate"]));
     echo "</td>";
     echo "<td>";
       echo date('d/m/Y',strtotime($row["EndDate"]));
     echo "</td>";
     echo "<td>";
   $sm = $row["sumdate"];
     echo 'เท่ากับ ';
       echo $sm;
       echo ' วัน';
     echo "</td>";
     }
   echo "</table>";
   mysqli_close($connection);
   ?>
 </div>
</body>
</html>