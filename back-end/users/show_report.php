
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show report</title>
    <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div class="container">
      <div class="row">
        <div class="col-md-12"> <br>
          <span class="self-center text-xl text-gray font-Sarabun whitespace-nowrap dark:text-white">องค์การบริหารส่วนตำบลสุขสวัสดิ์1111</span>
          <table class="table table-striped  table-hover table-responsive table-bordered">
            <tr>
              <th>No.</th>
              <th>ชื่อประเภทการลา</th>
              <th>จำนวนวันที่ลาได้</th>
              <th>ใช้วันลา/วัน</th>
              <th>คงเหลือ</th>

            </tr>
            <?php
             $sql = "SELECT leave_type.id AS id ,leave_type.leave_name AS name,leave_type.leave_limit AS leavelimit , IFNULL(DATEDIFF(leave_information.end,leave_information.start),0)AS total
             FROM leave_type 
             LEFT JOIN leave_information 
             ON leave_information.leave_name = leave_type.leave_name AND leave_information.Psn_id = '$Psn_id'
             GROUP BY leave_type.leave_name";
                   $query = mysqli_query($connection, $sql);
                   $connection->set_charset("utf8");
                   $index = '1'; ?>
                 
                 
                   <?php foreach ($query as $row) { ?>

        
           
            <tr>
            <td><?php echo $index ?></td>
                <?php ++$index ?>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['leavelimit'] ?> </td>
                <td><?php echo $row['total'] ?> </td>
                <td><?php echo (intval($row['leavelimit']) - intval($row['total'])) ?> </td>
            </tr>
            <?php }  ?>
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