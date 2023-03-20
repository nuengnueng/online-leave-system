
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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <br>
        <h4 class="text-center">แสดงข้อมูลการลา</h4>
        <table class="table">
            <tr>
                <th>รหัสพนักงาน</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ</th>
                <th>นามสุกล</th>
                <th>ประเภทการลา</th>
                <th>รายละเอียดการลา</th>
                <th>วันที่เริ่มลา</th>
                <th>วันที่สิ้นสุด</th>
                <th>จำนวนวันที่ลา</th>
                
            </tr>
            <?php
            $sql = "select * from leave_information order by Psn_id";
            $result = mysqli_query($connection,$sql);
            while($row=mysqli_fetch_array($result)){

        
            ?>
            <tr>
                <td><?=$row['Psn_id']?></td>
                <td><?=$row['nametitle']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['lastname']?></td>
                <td><?=$row['leave_name']?></td>
                <td><?=$row['description']?></td>
                <td><?=$row['start']?></td>
                <td><?=$row['end']?></td>
                <td><?=$row['postingDate']?></td>
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

<!--การสร้างลิงค์ เรียกไฟล์ myReport.pdf แสดงผลไฟล์ PDF  -->

    </div>
</body>
</html>