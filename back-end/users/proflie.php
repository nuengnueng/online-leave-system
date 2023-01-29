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
<?php (include '../users/menu.html');?>
<div class="container">
      <div class="row">
        <div class="col-md-6"> <br>
          <h4>แก้ไขรหัสผ่าน</h4>
          <hr><br>
          <form action="" method="post" id="form"class="row g-3" enctype="multipart/form-data">
            <div class=" col-auto">
                <label>รหัสผ่านปัจจุบัน :</label>    
                <input type="text" name="Psn_id" required>
            </div>
            <div class=" col-auto">
                <label>รหัสผ่านใหม่ :</label>    
                <input type="text" name="Psn_id" required>
            </div>
            <div class=" col-auto">
                <label>พิมพ์รหัสผ่านใหม่ :</label>    
                <input type="text" name="Psn_id" required>
            </div>

            <div class="col-auto">
                
                <button type="submit" class="btn btn-primary mb-3">ยืนยัน</button>
                <button type="cancel" class="btn btn-danger mb-3">ยกเลิก</button>
            </div>

</form>
</body>
</html>