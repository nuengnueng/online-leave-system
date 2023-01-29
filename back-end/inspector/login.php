<?php
session_start();
include('../connection/connection.php');
$connection->set_charset("utf8");

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="header">
    <img src="logo1.png" alt="" widt h="80" height="80">
        <p class="p1">ระบบลางานออนไลน์<br>องค์การบริหารส่วนตำบลสุขสวัสดิ์</p>
    </div>
    <form action="login_db.php" method="POST">
        <?php if(isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div> 
        <?php } ?>
        <?php if(isset($_SESSION['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div> 
        <?php } ?>
        <div class="input-group">
            <label for="username">username</label>
            <input type="text" name="username" required  placeholder="Your username..">
        </div>
        <div class="input-group">
            <label for="password" >password</label>
            <input type="password" name="password" required  placeholder="Your password..">
        </div>
        <div class="input-group">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </div>
    </form>
</body>
</html> 