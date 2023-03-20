<?php 
//ไฟล์เชื่อมต่อฐานข้อมูล
    require_once '../connection/db.php';
 ?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Basic PHP PDO ระบบเพิ่มปรับปรุงสถานะ by devbanban.com 2021</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10"> <br> 
          <h5>PHP PDO ตัวอย่างระบบปรับปรุงสถานะ</h5>
        <?php 
        //ถ้ามีการอัพเดทข้อมูล แสดงฟอร์ม
        if (isset($_GET['act']) && $_GET['act']=='edit' && isset($_GET['no'])) {

          //คิวรี่ข้อมูลมาแสดงมาในฟอร์มแบบ single row
            $stmt = $conn->prepare("
              SELECT * 
              FROM tbl_jobs AS j  #AS j คือการแทนชื่อตารางให้ชื่อสั้นลงในตอนที่เอาไป inner join โค้ดจะดูไม่รก
              INNER JOIN tbl_status AS s ON j.ref_s_id=s.s_id #เทียบคอลัมภ์จาก 2 ตาราง
              WHERE no=?"
            );
            $stmt->execute([$_GET['no']]);
            $rowJob = $stmt->fetch(PDO::FETCH_ASSOC);
            //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้าหลัก
            if($stmt->rowCount() < 1){
                header('Location: formUpdateJobs.php');
                exit();
            }
         ?>
         <h4>Job No. <?= $rowJob['no'];?></h4>
          <form action="" method="post">
            <div class="mb-2 row">
                <div class="col-sm-6">
                <select name="ref_s_id" class="form-control" required>
                  <option value="<?= $rowJob['ref_s_id'];?>"> สถานะปัจจุบัน : <?= $rowJob['s_name'];?></option>
                  <option disabled>-เปลี่ยนสถานะ-</option>
                  <?php
                  //คิวรี่ข้อมูลตำแหน่ง เพื่อมาแสดงใน select/option
                  $stmtstatus = $conn->prepare("SELECT* FROM status1");
                  $stmtstatus->execute();
                  $result = $stmtstatus->fetchAll();
                  foreach($result as $row) {
                  ?>
                  <option value="<?= $row['s_id'];?>">-<?= $row['s_name'];?></option>
                <?php } ?>
                </select>
              </div>
               <div class="col-sm-6">
                  <input type="text" name="xxx" class="form-control" required  placeholder="อื่นๆ ตาม Requirements..." disabled>
                </div>
              </div>
            <div class="mb-2 row">
                <div class="col-sm-12">
                  รายละเอียด : 
                 <textarea class="form-control" name="detail" required><?= $rowJob['detail'];?></textarea>
                </div>
                </div>
                <div class="mb-2 row">
                <div class="d-grid gap-2 col-sm-12 mb-3">
                  <input type="hidden" name="no" value="<?= $rowJob['no'];?>">
                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
              </div>
            </div>
              </form>
            <?php }  ?>

              <h5>รายการงานแจ้งซ่อม</h5>
               <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">ลำดับ</th>
                                <th width="20%">สถานะ</th>
                                <th width="65%">รายละเอียด</th>
                                <th width="10%">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //คิวรี่ข้อมูลมาแสดงในตาราง โดยเทียบข้อมูลระหว่างตารางสถานะกับตารางพนักงานที่มีคอลัมภ์สัมพันธ์กัน ก็คือ s_id กับ ref_s_id
                            $stmJobs = $conn->prepare("
                              SELECT j.*, s.s_name #ตารางพนักงานเอามาทุกคอลัมภ์ , ตารางตำแหน่งเอามาแค่ชื่อตำแหน่ง
                              FROM leave_type AS j  #AS j คือการแทนชื่อตารางให้ชื่อสั้นลงในตอนที่เอาไป inner join โค้ดจะดูไม่รก
                              INNER JOIN status1 AS s ON j.ref_s_id=s.s_id #เทียบคอลัมภ์จาก 2 ตาราง
                              ORDER BY j.no ASC #เรียงลำดับข้อมูลจากน้อยไปมาก
                              ");
                            $stmJobs->execute();
                            $resultEmp = $stmJobs->fetchAll();
                            foreach($resultEmp as $rowEmp) {
                            ?>
                            <tr>
                                <td align="center"><?= $rowEmp['no'];?></td>
                                <td><?= $rowEmp['s_name'];?></td>
                                <td>
                                  <b><?= $rowEmp['detail'];?></b> <br>
                                  ว/ด/ป เวลาที่แจ้ง : <?= $rowEmp['dateCreate'];?>
                                  </td>
                                <td> 
                                  <!--ส่งไป 2 พารามิเตอร์ ไอดีที่จะส่งไปแก้ไข และ act=edit เพื่อเรียกฟอร์มมาแสดง -->
                                  <a href="formUpdateJobs.php?no=<?= $rowEmp['no'];?>&act=edit" class="btn btn-danger btn-sm">จัดการ</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
          </div>
        </div>
      </body>
    </html>  
    <?php

  // print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
  // exit();
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['ref_s_id']) && isset($_POST['detail']) && isset($_POST['no'])){
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    //ไฟล์เชื่อมต่อฐานข้อมูล
    //require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $ref_s_id = $_POST['ref_s_id'];
    $detail = $_POST['detail'];
    $no = $_POST['no'];

              //sql update 
              $stmt = $conn->prepare("
                UPDATE  leave_type SET 
                ref_s_id=:ref_s_id,
                detail=:detail
                WHERE no=:no");

              //brndParam ข้อความทั่วไป = PARAM_STR, ตัวเลข = PARAM_INT
              $stmt->bindParam(':detail', $detail, PDO::PARAM_STR);
              $stmt->bindParam(':no', $no , PDO::PARAM_INT);
              $stmt->bindParam(':ref_s_id', $ref_s_id , PDO::PARAM_INT);
              $result = $stmt->execute();
              $conn = null; //close connect db
              if($result){
                  echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "ปรับปรุงข้อมูลสำเร็จ",
                            type: "success"
                        }, function() {
                            window.location = "formUpdateJobs.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
              }else{
                 echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                            type: "error"
                        }, function() {
                            window.location = "formUpdateJobs.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
              }
    } //isset 
    //devbanban.com
    ?>