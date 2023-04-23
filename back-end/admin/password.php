
<?php
require_once '../connection/db.php';
session_start();
include('../connection/connection.php');
$connection->set_charset("utf8");
if (!isset($_SESSION["username"])) {
	header("location:../login/login.php");
}

if (isset($_SESSION['username'])) {
	// $id  = mysqli_real_escape_strin($connection, $_POST["id"]);
	// $password  = mysqli_real_escape_string($connection, 
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
	// echo "window.location = 'adminhome.php'; ";
	echo "</script>";
	}
	// echo ("<script>console.log('PHP: " .$row. "');</script>");
	// $sql = "UPDATE personnel SET 
	// password='$password'
	// WHERE id=$id
	// ";
	// $result = mysqli_query($connection, $sql);
	// mysqli_close($connection);

	// 	if($result){
	// 	echo "<script type='text/javascript'>";
	// 	echo "alert('แก้ไข password เรียบร้อย');";
	// 	// echo "window.location = 'adminhome.php'; ";
	// 	echo "</script>";
	// 	}else{
	// 	echo "<script type='text/javascript'>";
	// 	// echo "window.location = 'adminhome.php'; ";
	// 	echo "</script>";
	// }


} else { //if(isset()
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไข password ');";
	// echo "window.location = 'adminhome.php'; ";
	echo "</script>";	// Header("Location: ../logout/logout.php");
}


?>
