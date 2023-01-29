<?php
include('../connection/connection.php');
$connection->set_charset("utf8");

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
<?php (include '../admin/menu.html');?>
<h4>แก้ไขรหัสผ่าน</h4>
          <form action="admin_rwd_db.php" method="post" id="form"class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-sm-2 control-label">
                    Username:
                </div>
                <div class="col-sm-4">
                    <input type="text" name="username" require class="form-control"
                    autocomplete="off" value="<?php echo $data['username'];?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2 control-label">
                    Password:
                </div>
                <div class="col-sm-4">
                    <input type="password" name="password" required class="form-control">
                </div>
            </div>
           <div class="form-group">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-4">
                <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
           </div>
</form>
</body>
</html>