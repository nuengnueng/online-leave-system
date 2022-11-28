<?php
include('../connection/connection.php');
if(isset($_POST)){
  if((isset($_GET['function'])) == 'login'){
    $error =[];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM tb_admin WHERE username='$username'";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_num_rows($query);
    if($row <= 0){
      $error['username'] = 'Username failed';
    }
    $sql .= "AND password = '$password'";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_num_rows($query);
    if($row <= 0){
      $error['password'] = 'Password failed';
    }
  }
}
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h2>Login</h2>
    <form class="text-center p-5 " action="?function=login" method="post" >
 
    <?php if(isset($error['username']) || isset($error['password'])) {?>
    <div class="alert alert-danger" role="alert">
      <?=isset($error['username'])? $error['username']. '/' : '' ?>
      <?=isset($error['password'])? $error['password'] : '' ?>
    </div>
    <?php } ?>
    <label for="" class="form-label">Username</label>
    <input type="text" class="form-control mb-3" id="username" name="username" >
    <label for="" class="form-label">Password</label>
    <input type="password" class="form-control mb-3" id="exampleInputPassword1" name="password">
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>

