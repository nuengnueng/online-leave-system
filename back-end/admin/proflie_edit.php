<?php
    require_once'../connection/db.php';
   session_start();
   if(!isset($_SESSION["username"]))
   {
    header("location:../login/login.php");  
   }
?>
<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
	
	$sql = "UPDATE personnel SET nametitle = '".trim($_POST['nametitle'])."',username='".trim($_POST['username'])."',   
	lastname='".trim($_POST['lastname'])."', phonenumber='".trim($_POST['phonenumber'])."', position='".trim($_POST['position'])."',affiliation='".trim($_POST['affiliation'])."',employees='".trim($_POST['employees'])."',usertype='".trim($_POST['usertype'])."'
	 WHERE id ='".$_SESSION["username"]."' ";
	$query = mysqli_query($connection,$sql);
	if($query){
		echo "<script> alert('อัพเดตข้อมูลเรียบร้อย');</script>";
		echo "<script>window.location='adminhome.php';</script>";
	}else{
		echo "Error:" . $sql . "<br>" . mysqli_error($connection);
		echo "<script> alert('อัพเดตข้อมูลไม่ได้'); </script>";
		
	}
	
	
	
	mysqli_close($connection);
?>