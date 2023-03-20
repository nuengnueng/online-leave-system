<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php (include '../admin/menu.html');?>
<div class="formbold-event-details">
        <h5>เเก้ไขโปรไฟล์</h5>
<div class="container">
<div class="row">
<div class="formbold-form-step-1 active">
          <div class="formbold-input-flex">
            <div>
                <label for="firstname" class="formbold-form-label"> ชื่อผู้ใช้ : </label>
                <input
                type="text"
                placeholder="ชื่อผู้ใช้"
                class="formbold-form-input"
                />
            </div>
            <br>
            <div>
                <label for="lastname" class="formbold-form-label"> เบอร์โทรศัพท์ :</label>
                <input
                type="text"
                placeholder="เบอร์โทรศัพท์"
                class="formbold-form-input"
                />
            </div>
            <br>
                <label for="firstname" class="formbold-form-label"> พนักงาน: </label>
                <input
                type="text"
                placeholder="พนักงาน"
                class="formbold-form-input"
                />
                <label for="lastname" class="formbold-form-label"> ตำเเหน่ง:</label>
                <input
                type="text"
                placeholder="ตำเเหน่ง "
                class="formbold-form-input"
                /><br><br>
                <label for="lastname" class="formbold-form-label"> สังกัด:</label>
                <input
                type="text"
                placeholder="สังกัด "
                class="formbold-form-input"
                />
            </div>
            <br>
            <div>
                <label for="lastname" class="formbold-form-label"> สถานะผู้ใช้งาน : :</label>
                <input
                type="text"
                placeholder=" สถานะผู้ใช้งาน "
                class="formbold-form-input"
                />
            </div>
            <br>
           
            <button class="formbold-btn">ยืนยันตัวตน</button>
            <button class="formbold-btn-in">ยกเลิก</button>




           
</form>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  body {
    font-family: 'Inter', sans-serif;
  }
  .formbold-event-details {
    background: #fafafa;
    border: 5px solid #dde3ec;
    border-radius: 5px;
    margin: 20px 0 30px;
  }
  .formbold-event-details h5 {
    color: #07074d;
    font-weight: 600;
    font-size: 18px;
    line-height: 24px;
    padding: 15px 25px;
  }
  .formbold-btn {
    text-align: center;
    width: 10%;
    font-size: 16px;
    border-radius: 5px;
    padding: 14px 25px;
    border: none;
    font-weight: 500;
    background-color: #0000FF;
    color: white;
    cursor: pointer;
    margin-top: 10px;
  }
  .formbold-btn-in{
    text-align: center;
    width: 10%;
    font-size: 16px;
    border-radius: 5px;
    padding: 14px 25px;
    border: none;
    font-weight: 500;
    background-color: #FF0000;
    color: white;
    cursor: pointer;
    margin-top: 10px;
  }
 
 
</style>
</body>
</html>
