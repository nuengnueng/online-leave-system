<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=leave_online_system", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
    #echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Leave Online System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">

        <!-- Content Row  -->

        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Users
                                </div>
                                <?php
                                $sql = "SELECT COUNT(*) as users FROM leave_information";
                                $query = $conn->prepare($sql);
                                $query->execute();
                                $fetch = $query->fetch();

                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $fetch['users'] ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    รอการอนุมัติ
                                </div>
                                <?php 
                                    $sql="SELECT COUNT(*) AS รอการอนุมัติ  FROM leave_information WHERE status='1'" ;
                                    $query = $conn->prepare($sql);
                                    $query->execute();
                                    $fetch = $query->fetch(); ?>

                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $fetch['รอการอนุมัติ'] ?>
                                    </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    อนุมัติการลา
                                </div>
                                <?php 
                                    $sql="SELECT COUNT(*) AS อนุมัติการลา  FROM status1 WHERE s_name ='1'" ;
                                    $query = $conn->prepare($sql);
                                    $query->execute();
                                    $fetch = $query->fetch(); ?>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <?= $fetch['อนุมัติการลา'] ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    ไม่อนุมัติการลา
                                </div>
                                <?php 
                                    $sql="SELECT COUNT(*) AS ไม่อนุมัติการลา  FROM status1 WHERE s_name ='2'" ;
                                    $query = $conn->prepare($sql);
                                    $query->execute();
                                    $fetch = $query->fetch(); ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $fetch['ไม่อนุมัติการลา'] ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>