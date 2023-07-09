<?php
require_once '../connection/db.php';
session_start();
if (!isset($_SESSION["username"])) {
  header("location:../login/login.php");
}
?>


<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
function getDatesFromRange($start, $end, $format = 'Y-m-d') {
  $array = array();
  $interval = new DateInterval('P1D');

  $realEnd = new DateTime($end);
  $realEnd->add($interval);

  $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

  foreach($period as $date) { 
      $array[] = $date->format($format); 
  }

  return $array; 
}
function checkday($leaveday,$start,$end)
{
  // $paymentDate = date('Y-m-d');
  $paymentDate = date('Y-m-d', strtotime($leaveday));
  //echo $paymentDate; // echos today! 
  $contractDateBegin = date('Y-m-d', strtotime($start));
  $contractDateEnd = date('Y-m-d', strtotime($end));

  if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)) {
    return true;

  } else {
    return false;

  }
}
function getWorkingDays($startdate, $enddate)
{
  $start = new DateTime($startdate);
  $end = new DateTime($enddate);
  // otherwise the  end date is excluded (bug?)
  $end->modify('+1 day');

  $interval = $end->diff($start);

  // total days
  $days = $interval->days;

  // create an iterateable period of date (P1D equates to 1 day)
  $period = new DatePeriod($start, new DateInterval('P1D'), $end);

  // best stored as array, so you can add more than one
  $holidays = array('2023-04-13', '2023-04-14', '2023-04-17');

  foreach ($period as $dt) {

    $curr = $dt->format('D');

    // substract if Saturday or Sunday
    if ($curr == 'Sat' || $curr == 'Sun') {
      $days--;
    }
    // (optional) for the updated question
    elseif (in_array($dt->format('Y-m-d'), $holidays)) {
      $days--;
    }
  }
  return $days; // 
}
if (isset($_POST) && !empty($_POST)) {
  if (isset($_SESSION['username'])) {
    $username_id = $_SESSION['username'];
    $stmt = $conn->query("SELECT * FROM personnel WHERE id = $username_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $Psn_id = $row['Psn_id'];
    $nametitle = $row['nametitle'];
    $username =  $row["username"];
    $lastname = $row['lastname'];

  }

 

  $leave_name = $_POST['leave_name'];
  $description = $_POST['description'];
  $phonenumber = $_POST['phonenumber'];
  echo ("<script>console.log('PHP: " . $_POST['flexRadioDefault'] . "');</script>");
  if ($_POST['flexRadioDefault'] == 'halfday') {
    $start = $_POST['start'];
    $end = $_POST['start'];
    $postingDate = '0.5';
    $half_day = $_POST['Default'];
  } else {
    $start = $_POST['start'];
    $end = $_POST['end'];
    $postingDate = getWorkingDays($_POST['start'], $_POST['end']);
  }

  $date1 = date("Ymd_His");
  $numrand = (mt_rand());
  $img = (isset($_POST['img']) ? $_POST['img'] : '');
  $upload = $_FILES['img']['name'];
  if ($upload != '') {
    $path = "../img/";
    $type = strrchr($_FILES['img']['name'], ".");
    $newname = $numrand . $date1 . $type;
    $path_copy = $path . $newname;
    $path_link = "../img/" . $newname;

    move_uploaded_file($_FILES['img']['tmp_name'], $path_copy);
  }
  $sql = "SELECT * FROM leave_information WHERE start >= '$start' AND Psn_id='$Psn_id'";
  $query = mysqli_query($connection, $sql);
  $connection->set_charset("utf8");
  foreach(getDatesFromRange($start,$end) as $leaveday){
    foreach ($query as $data) {
      echo ("<script>console.log('PHP: " . $data['start'] . "');</script>");
      if(checkday($leaveday,$data['start'],$data['end'])){
        echo "<script> alert('วันที่ลาซ้ำ');</script>";
      echo "<script>window.location='../users/userhome.php';</script>";
  
      }
    }
  
  }
  $sql = "INSERT INTO leave_information (Psn_id,nametitle,username,lastname,leave_name,description,phonenumber,start,end,img,status,postingDate,half_day)
            VALUES ('$Psn_id','$nametitle','$username','$lastname','$leave_name','$description','$phonenumber','$start','$end','$newname','1','$postingDate','$half_day')";
  $query = mysqli_query($connection, $sql);
  if ($query) {
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
    echo "<script>window.location='../users/userhome.php';</script>";
  } else {
    echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
  }
  mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Date</title>
  <script src="dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
  <?php
  if (isset($_SESSION['username'])) {
    $username_id = $_SESSION['username'];
    $stmt = $conn->query("SELECT * FROM personnel WHERE id = $username_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  }

  ?>

  <?php (include '../users/menu.html'); ?>
  <div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
      <a href="userhome.php" class="btn btn-success mb-3">ย้อนกลับ</a>
      <div class="display-6 text-center justify-content-center ">แบบฟอร์มการลา</div><br>
      <form action="sendinfo.php" method="post" id="form" enctype="multipart/form-data">
        <?php if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-success" role="alert">
            <?php 
              echo $_SESSION['success'];
              unset($_SESSION['success']);
            ?>
          </div>
          <?php } ?>
        <div class="formbold-input-flex">
           <!-- <div>
            <label for="Psn_id" class="formbold-form-label"> รหัสพนักงาน </label>
            <input type="text" value="<?php echo $row['Psn_id'] ?>" name="Psn_id" id="Psn_id" placeholder="Your ID" class="formbold-form-input" />
          </div> 
           <div> 
          <label for="nametitle" class="formbold-form-label"> คำนำหน้า </label>
          <select class="formbold-form-input" name="nametitle" id="nametitle">
            <option selected="">-เลือกคำนำหน้า</option>
            <option value="Mrs">นาง</option>
            <option value="Mr">นาย</option>
            <option value="Miss">นางสาว</option>
            <option value="Sergeant Major">สิบเอก</option>
            </select>
        </div> -->
      </div>

       <div class="formbold-input-flex">
        <div>
            <label for="username" class="formbold-form-label">ชื่อ</label>
            <input
            type="username"
            name="username"
            id="username"
            placeholder="Your username"
            class="formbold-form-input"
            />
        </div> 
     
        <div>
            <label for="lastname" class="formbold-form-label">นามสกุล</label>
            <input
            type="lastname"
            name="lastname"
            id="lastname"
            placeholder="Your lastname"
            class="formbold-form-input"
            />
        </div> 

          <div>
            <label for="leave_name" class="formbold-form-label">ชื่อประเภทการลา </label>
            <?php if ($row["employees"] == 'พนักงานจ้าง') { ?>
              <select class="formbold-form-input" type="text" name="leave_name">
                <option selected="">- เลือกชื่อประเภทการลา</option>
                <option>ลาป่วย</option>
                <option>ลาพักร้อน</option>
                <option>ลาคลอด</option>
              </select>
            <?php } else { ?>
              <select class="formbold-form-input" type="text" name="leave_name">
                <option selected="">- เลือกชื่อประเภทการลา</option>
                <option>ลาป่วย</option>
                <option>ลากิจ</option>
                <option>ลาบวช</option>
                <option>ลาพักร้อน</option>
                <option>ลาคลอด</option>
              </select>
            <?php } ?>
          </div>
        </div>


        <div class="formbold-mb-3">
          <label for="description" class="formbold-form-label">
            รายละเอียดการขอลา
          </label>
          <textarea rows="6" name="description" id="description" class="formbold-form-input"></textarea>
        </div>

        <div class="formbold-mb-3 formbold-input-wrapp">
          <label for="phonenumber" class="formbold-form-label">เบอร์โทรศัพท์</label>

          <div>
            <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone number" class="formbold-form-input" />
          </div>
        </div>
        <label for="phonenumber" class="formbold-form-label">ลาเต็มวัน/ลาครึ่งวัน</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="fullday" value="fullday" onchange="checkdata(false)" checked>
          <label class="form-check-label" for="flexRadioDefault1">
            เต็มวัน
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="fullday" value="halfday" onchange="checkdata(true)">
          <label class="form-check-label" for="flexRadioDefault2">
            ครึ่งวัน
          </label>
        </div>
        <div id="end2" style="display:none;">
          <label for="phonenumber" class="formbold-form-label">ช่วงเวลาที่จะลา</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="Default" id="fullday" value="M" checked>
            <label class="form-check-label" for="flexRadioDefault1">
              ลาเช้า
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="Default" id="fullday" value="A">
            <label class="form-check-label" for="flexRadioDefault2">
              ลาบ่าย
            </label>
          </div>
        </div>
        <div class="formbold-mb-3">
          <label for="start" class="formbold-form-label"> วันที่เริ่มลา</label>
          <input type="date" name="start" id="start" class="formbold-form-input" />
        </div>

        <div class="formbold-mb-3" id="end1">
          <label for="end" class="formbold-form-label">วันที่สิ้นสุด</label>
          <input type="date" name="end" id="end" class="formbold-form-input" />
        </div>

        <div class="formbold-form-file-flex">
          <label for="img" class="formbold-form-label">
            แนบไฟล์
          </label>
          <input type="file" name="img" accept="image/*" id="img" class="formbold-form-file" />
        </div>
        <button type="submit" name="submit" class="formbold-btn">บันทึกข้อมูล</button>


      </form>
      <script>
        function checkdata(val) {
          console.log(val)
          if (val) {
            document.getElementById('end1').hidden = true
            document.getElementById('end2').style.display = "block"
          } else {
            document.getElementById('end1').hidden = false
            document.getElementById('end2').style.display = "none"
          }
        }
      </script>
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        body {
          font-family: 'Inter', sans-serif;
        }

        .formbold-mb-3 {
          margin-bottom: 15px;
        }

        .formbold-main-wrapper {
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 48px;
        }

        .formbold-form-wrapper {
          margin: 0 auto;
          max-width: 570px;
          width: 100%;
          background: white;
          padding: 40px;
        }

        .formbold-input-wrapp>div {
          display: flex;
          gap: 20px;
        }

        .formbold-input-flex {
          display: flex;
          gap: 20px;
          margin-bottom: 15px;
        }

        .formbold-input-flex>div {
          width: 50%;
        }

        .formbold-form-input {
          width: 110%;
          padding: 13px 22px;
          border-radius: 5px;
          border: 1px solid #dde3ec;
          background: #ffffff;
          font-weight: 500;
          font-size: 16px;
          color: #536387;
          outline: none;
          resize: none;
        }

        .formbold-form-input::placeholder,
        select.formbold-form-input,
        .formbold-form-input[type='date']::-webkit-datetime-edit-text,
        .formbold-form-input[type='date']::-webkit-datetime-edit-month-field,
        .formbold-form-input[type='date']::-webkit-datetime-edit-day-field,
        .formbold-form-input[type='date']::-webkit-datetime-edit-year-field {
          color: rgba(83, 99, 135, 0.5);
        }

        .formbold-form-input:focus {
          border-color: #6a64f1;
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold-form-label {
          color: #07074D;
          font-weight: 500;
          font-size: 15px;
          line-height: 24px;
          display: block;
          margin-bottom: 10px;
        }

        .formbold-form-file-flex {
          display: flex;
          align-items: center;
          gap: 20px;
        }

        .formbold-form-file-flex .formbold-form-label {
          margin-bottom: 0;
        }

        .formbold-form-file {
          font-size: 14px;
          line-height: 24px;
          color: #536387;
        }

        .formbold-form-file::-webkit-file-upload-button {
          display: none;
        }

        .formbold-form-file:before {
          content: 'Upload file';
          display: inline-block;
          background: #EEEEEE;
          border: 0.5px solid #FBFBFB;
          box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.25);
          border-radius: 3px;
          padding: 3px 12px;
          outline: none;
          white-space: nowrap;
          -webkit-user-select: none;
          cursor: pointer;
          color: #637381;
          font-weight: 500;
          font-size: 12px;
          line-height: 16px;
          margin-right: 10px;
        }

        .formbold-btn {
          text-align: center;
          width: 50%;
          font-size: 16px;
          border-radius: 5px;
          padding: 10px 20px;
          border: none;
          font-weight: 50;
          background-color: #6a64f1;
          color: white;
          cursor: pointer;
          margin-top: 25px;
        }

        .formbold-btn:hover {
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold-w-45 {
          width: 45%;
        }
      </style>
</body>

</html>