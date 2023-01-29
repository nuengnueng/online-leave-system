<?php
include('../connection/connection.php');
$connection->set_charset("utf8");

    $Psn_id = $_POST['Psn_id'];
    $nametitle = $_POST['nametitle'];
    $username = $_POST['username'] ;
    $lastname = $_POST['lastname'] ;
    $password = md5($_POST['password']);
    $phonenumber = $_POST['phonenumber'] ;
    $position = $_POST['position'];
    $affiliation = $_POST['affiliation'] ;
    $employees = $_POST['employees'];
   

$check = "
SELECT Psn_id
FROM personnel
WHERE Psn_id = '$Psn_id'
";

$result1 = mysqli_query($connection,$check) or die(mysqli_error());
$num = mysqli_num_rows($result1);

if($num > 0){
    echo"<script>";
    echo "alert('ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo"</script>";
}else{
    $sql = "INSERT INTO personnel
    (Psn_id,
    nametitle,
    username,
    lastname,
    password,
    phonenumber,
    position,
    affiliation,
    employees
    )
    VALUES
    (
    '$Psn_id',
    '$nametitle',
    '$username',
    '$lastname',
    '$password',
    '$phonenumber',
    '$position',
    '$affiliation',
    '$employees'
    )";
$result = mysqli_query($connection,$sql) or die ("Error in query: $sql " . mysqli_error());
}

mysqli_close($connection);

if($result){
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = 'list_admin.php';";
    echo "</script>";
}else{
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_admin.php';";
    echo "</script>";
}

?>