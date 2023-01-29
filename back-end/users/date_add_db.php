<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$connection= mysqli_connect("localhost","root","","leave_system") or die("Error: " . mysqli_error($connection));
mysqli_query($connection, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
 
$StartDate = $_POST['StartDate'];
$EndDate = $_POST['EndDate'];
 
$sql = "INSERT INTO  tb_user
			(
			StartDate,
			EndDate	
			)
				VALUES
			(
			'$StartDate',
			'$EndDate'			
			)";
		$result = mysqli_query($connection, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($connection);
	if($result){
echo "<script type='text/javascript'>";
//echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
echo "window.location = 'index.php'; ";
echo "</script>";
}else{
echo "<script type='text/javascript'>";
echo "window.location = 'index.php'; ";
echo "</script>";
}
?>
</body>
</html>