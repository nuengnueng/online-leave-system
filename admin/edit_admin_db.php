<meta charset=utf-8>
<?php
include('../connection/connection.php');
$connection->set_charset("utf8");
?>
<?php 
//connect database

$username = mysqli_real_escape_string($connection,$_POST['username']);
$Psn_id = mysqli_real_escape_string($connection,$_POST['Psn_id']);


//check from id 
$check1 ="SELECT * FROM personnel WHERE username='$username' AND Psn_id=$Psn_id";
$result1=mysqli_query($connection, $check1);
$num1=mysqli_num_rows($result1);

// echo $num1;

if($num1==0){
//chk dupicate
$check2 ="SELECT * FROM personnel  WHERE username='$username'";
$result2=mysqli_query($connection, $check2);
$num=mysqli_num_rows($result2);

		if($num==0){   // can update 
			$sql ="UPDATE personnel SET  username='$username' WHERE Psn_id=$Psn_id";
				$result = mysqli_query($connection, $sql) or die("Error in query : $sql" .mysqli_error());
		}else{ //if $num==1
					echo "<script>";
					echo "alert('ข้อมูลซ้ำ !! ');";
					echo "window.location ='list_admin.php'; ";
					echo "</script>";
		}

}elseif ($num1==1) {  //chk $check1 
			echo "<script>";
			echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='list_admin.php'; ";
			echo "</script>";
}


mysqli_close($connection);

if($result){
			echo "<script>";
			echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='list_admin.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			//echo "alert('ERROR!');";
			echo "window.location ='list_admin.php'; ";
			echo "</script>";
		}


?>