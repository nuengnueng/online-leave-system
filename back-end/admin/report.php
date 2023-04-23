<?php
require_once '../connection/db.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Report</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <?php (include '../admin/menu.html'); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12"> <br>
        <span class="self-center text-xl text-gray font-Sarabun whitespace-nowrap dark:text-white"></span>
        <form action="" method="post" id="form">
          <div class="formbold-mb-3">
            <label for="start" class="formbold-form-label">จาก</label>
            <input type="date" name="start" id="start" class="formbold-form-input" />
          </div>
          <div class="formbold-mb-3">
            <label for="end" class="formbold-form-label">ถึง</label>
            <input type="date" name="end" id="end" class="formbold-form-input" />
          </div>
          <button class="formbold-btn">ค้นหา</button>


          <?php (include '../chart/chart2.php'); ?>
        </form>

        <style>
          @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

          * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          }

          body {
            font-family: 'Inter', sans-serif;
          }

          .formbold-mb-3 {
            margin-bottom: 15px;
          }

          .formbold-form-label {
            color: #07074D;
            font-weight: 500;
            font-size: 14px;
            line-height: 24px;
            display: block;
            margin-bottom: 10px;
          }
          .formbold-form-input {
          width: 20%;
          padding: 13px 22px;
          border-radius: 5px;
          border: 1px solid #dde3ec;
          background: #ffffff;
          font-weight: 500;
          font-size: 16px;
          color: #536387;
          outline: none;
          resize: none;
        }

          .formbold-btn {
            text-align: left;
            width: 10%;
            font-size: 16px;
            border-radius: 5px;
            padding: 14px 25px;
            border: none;
            font-weight: 500;
            background-color: #FF0000;
            color: white;
            cursor: pointer;
            margin-top: 25px;
          }
        </style>
</body>

</html>