<?php
require_once '../connection/db.php';
    session_start();
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
  
  $paymentDate = date('Y-m-d', strtotime($leaveday));
  
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
 
  $end->modify('+1 day');

  $interval = $end->diff($start);

  
  $days = $interval->days;

 
  $period = new DatePeriod($start, new DateInterval('P1D'), $end);


  $holidays = array('2023-04-13', '2023-04-14', '2023-04-17');

  foreach ($period as $dt) {

    $curr = $dt->format('D');

   
    if ($curr == 'Sat' || $curr == 'Sun') {
      $days--;
    }
   
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

    if(isset($_POST['submit'])){
        
        $username = $_POST['username'];
        $lastname = $_POST['lastname'];
        $leave_name = $_POST['leave_name'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $sToken = "eZvn82d8Fs06bqsmy9zNkjpinmKlXBCyQ9XWp2eozhC";
	    $sMessage = "รายละเอียดการขอลา\n";
	    $sMessage .= "ชื่อ: " . $username . "\n";
	    $sMessage .= "นามสกุล: " . $lastname . "\n";
	    $sMessage .= "ประเภทการลา: " . $leave_name . "\n";
	    $sMessage .= "วันที่เริ่มลา: " . $start . "\n";
	    $sMessage .= "วันที่สิ้นสุด: " . $end . "\n";
    
	    

	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

    if ($result){
        $_SESSION['success'] = "ส่งข้อมูลแจ้งเตือน Line Notify เรียบร้อยแล้ว!";
        header("location: form_insert.php");
    }else{
        $_SESSION['error'] = "ส่งข้อมูลแจ้งเตือนผิดพลาด!";
        header("location: form_insert.php");
    }

	//Result error 
	// if(curl_error($chOne)) 
	// { 
	// 	echo 'error:' . curl_error($chOne); 
	// } 
	// else { 
	// 	$result_ = json_decode($result, true); 
	// 	echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	// } 
	// curl_close( $chOne ); 
    }



?>