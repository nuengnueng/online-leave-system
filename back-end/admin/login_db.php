<?php
session_start();
include('../connection/connection.php');
$connection->set_charset("utf8");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $usertype = "user";
    if (empty($username)) {
        $_SESSION['error'] = 'กรุณากรอกชื่อ';
        header("location:../login/login.php");
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location:../login/login.php");
    }

        $sql = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'
            ";
        $result = mysqli_query($connection,$sql);

        $row = mysqli_fetch_array($result);

        if($row["usertype"]=="admin")
        {   
            $_SESSION["username"] = $row['id'];
            header("location:../admin/adminhome.php");
        }
        else{
            $_SESSION["error"] = "รหัสผ่านผิด";
            header("location:../admin/login.php");
        }
}
    
?>