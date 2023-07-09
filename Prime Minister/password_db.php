<?php
require_once '../connection/db.php';
session_start();
if (!isset($_SESSION["username"])) {
  header("location:../login/login.php");
}
if(isset($_SESSION['username'])) {
  $PrimeMinister_id = $_SESSION['username'];
  $stmt = $conn->query("SELECT * FROM personnel WHERE id = $PrimeMinister_id");
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="dist/sweetalert2.all.min.js"></script>
</head>
<body>
<?php (include '../Prime Minister/menu.html');?>
<h4>เปลี่ยนรหัสผ่าน</h4>
<form action="password.php" method="post" class="form-horizontal">
  <div class="form-group">
       <label for="old-password" class="col-sm-2 control-label">รหัสผ่านเก่า:</label>
        <div class="col-sm-4">
            <input type="password" id="old-password" name="old-password" class="form-control" required>
        </div>
    </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      รหัสผ่านใหม่ :
    </div>
    <div class="col-sm-4">
      <input type="password" placeholder="รหัสผ่านใหม่" name="newpassword" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ยืนยันรหัสผ่านใหม่ :
    </div>
    <div class="col-sm-4">
      <input type="password" placeholder="ยืนยันรหัสผ่านใหม่" name="password1" required class="form-control">
    </div>
  </div>
 <br>
    <div class="col-sm-4">
     <input type="้hidden" name="changepassword">
      <button style="background-color:#0d6efd;"type="submit" class="btn btn-primary">ยืนยันการเปลี่ยนรหัสผ่าน</button>
    </div>

</form>
</body>
</html>
