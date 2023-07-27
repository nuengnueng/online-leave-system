<?php
session_start();
include('../connection/connection.php');
$connection->set_charset("utf8");
if(isset($_POST)&& !empty($_POST)){
    // echo'<pre>';
    // print_r($_POST);
    // echo'</pre>';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT*FROM personnel WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_num_rows($query);
    if($row = 0){
    $result = mysqli_fetch_assoc($query);
    $_SESSION['username_login'] = $result['username'];
    echo "<script>alert('เข้าสู่ระบบสำเร็จ');</script>";
    echo "window.location = 'adminhome.php';";
    echo"</script>";
}else{
    echo "Error:" . $sql . "<br>" . mysqli_error($connection);
    echo"<script>window.location = 'index.php';</script>";
   
}
    }

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page1</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="header">
    <img src="logo1.png" alt="" widt h="80" height="80">
        <p class="p1">ระบบลางานออนไลน์<br>องค์การบริหารส่วนตำบลสุขสวัสดิ์</p>
    </div>
    <form action="" method="POST" class="auth-form login-form">
            
        <div class="input-group">
            <label for="username">username</label>
            <input type="text" name="username" required  placeholder="Your username..">
        </div>
        <div class="input-group">
            <label for="password" >password</label>
            <input type="password" name="password" required  placeholder="Your password..">
        </div>
        <div class="input-group">
            <button type="submit" name="login"class="btn btn-primary">Login</button>
        </div>
    </form>
    
</body>
</html> 