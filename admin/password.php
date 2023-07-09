
<?php
require_once '../connection/db.php';
session_start();
include('../connection/connection.php');
$connection->set_charset("utf8");
if (!isset($_SESSION["username"])) {
	header("location:../login/login.php");
}

if (isset($_SESSION['username'])) {
 
	$sql = "SELECT * FROM personnel WHERE id='" . $_SESSION['username'] . "' AND password='" . $_POST['old-password'] . "'
            ";
	$result = mysqli_query($connection, $sql);


	
	$row = mysqli_fetch_array($result); 
	if($row){
		$sql_edit = "UPDATE personnel SET password='".$_POST["newpassword"]."' WHERE id ='".$_SESSION['username']."' ";
		$dataupdate = mysqli_query($connection, $sql_edit);
		echo "<script type='text/javascript'>";
	echo "alert('เปลี่ยนรหัสผ่านสำเร็จ');";
	echo "window.location = 'adminhome.php'; ";
	echo "</script>";
	}else{
		echo "<script type='text/javascript'>";
	echo "alert('รหัสผ่านเก่าไม่ถูกต้อง');";
	echo "</script>";
	}
	

} else {
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไข password ');";
	echo "</script>";
}


?>
