<?php
require_once '../connection/db.php';
session_start();
if (!isset($_SESSION["username"])) {
  header("location:../login/login.php");
}
?>
<?php
// เริ่มคำสั่ง Export ไฟล์ PDF
require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ], 
    'default_font' => 'sarabun'
]);
 // สิ้นสุดคำสั่ง Export ไฟล์ PDF ในส่วนบน เริ่มกำหนดตำแหน่งเริ่มต้นในการนำเนื้อหามาแสดงผลผ่าน
$mpdf->SetFont('sarabun','',14);
ob_start();  //ฟังก์ชัน ob_start()
?>


<?php 
include('../connection/connection.php');
if (isset($_SESSION['username'])) {
  $username_id = $_SESSION['username'];
  $stmt = $conn->query("SELECT * FROM personnel WHERE id = $username_id");
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $Psn_id = $row['Psn_id'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show report1</title>
    <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<div class="container">
      <div class="row">
        <img src="logo1.png" class="d-block mx-auto my-4" style="max-width: 10%;" alt=" Logo" />
          <span class="self-center text-xl text-gray text-center font-Sarabun whitespace-nowrap dark:text-white">รายงานการลา<br>องค์การบริหารส่วนตำบลสุขสวัสดิ์
          </span>
          <span class="self-center text-xl text-gray text-end font-Sarabun whitespace-nowrap dark:text-white" >คุณ : <?php echo $row['username'] ?> <?php echo $row['lastname'] ?></span><br><br>
          <table class="table table-striped table-hover table-responsive table-bordered">
            <tr>
              <th>No.</th>
              <th>ชื่อประเภทการลา</th>
              <th>จำนวนวันที่ลาได้</th>
              <th>ใช้วันลา/วัน</th>
              <th>คงเหลือ</th>

            </tr>
            <?php
            
            if ($row["employees"] == 'พนักงานจ้าง') {
              $sql = "SELECT leave_type1.id AS id ,leave_type1.leave_name AS name,leave_type1.leave_limit AS leavelimit , IFNULL(SUM(leave_information.postingDate),0)AS total
      FROM leave_type1 
      LEFT JOIN leave_information 
      ON leave_information.leave_name = leave_type1.leave_name AND leave_information.Psn_id = '$Psn_id'
      GROUP BY leave_type1.leave_name";
              $query = mysqli_query($connection, $sql);
              $connection->set_charset("utf8");
              $index = '1';
            } else {
              $sql = "SELECT leave_type.id AS id ,leave_type.leave_name AS name,leave_type.leave_limit AS leavelimit , IFNULL(SUM(leave_information.postingDate),0)AS total
      FROM leave_type 
      LEFT JOIN leave_information 
      ON leave_information.leave_name = leave_type.leave_name AND leave_information.Psn_id = '$Psn_id'
      GROUP BY leave_type.leave_name";
              $query = mysqli_query($connection, $sql);
              $connection->set_charset("utf8");
              $index = '1';
            }
                   ?>
                 
                 
                   <?php foreach ($query as $row) { ?>

        
           
            <tr>
            <td><?php echo $index ?></td>
                <?php ++$index ?>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['leavelimit'] ?> </td>
                <td><?php echo $row['total'] ?> </td>
                <td><?php echo (intval($row['leavelimit']) - intval($row['total'])) ?> </td>
            </tr>
            <?php }  
            mysqli_close($connection);
            ?>
        </table>

        <?php
 // คำสั่งการ Export ไฟล์เป็น PDF
$html = ob_get_contents();      // เรียกใช้ฟังก์ชัน รับข้อมูลที่จะมาแสดงผล
$mpdf->WriteHTML($html);        // รับข้อมูลเนื้อหาที่จะแสดงผลผ่านตัวแปร $html
$mpdf->Output('Report.pdf');  //สร้างไฟล์ PDF ชื่อว่า myReport.pdf
ob_end_flush();                 // ปิดการแสดงผลข้อมูลของไฟล์ HTML ณ จุดนี้
?>

    </div>
</body>
</html>