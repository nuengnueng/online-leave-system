<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style type="text/css">
.highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}


input[type="number"] {
	min-width: 50px;
}
		</style>
	</head>
	<body>
<script src=".../highcharts/highcharts.js"></script>
<script src=".../highcharts/modules/exporting.js"></script>
<script src=".../highcharts/modules/export-data.js"></script>
<script src=".../highcharts/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container">  </div>
    
</figure>
<?php
//เชื่อมต่อฐานข้อมูล
include('../connection/connection.php');
//ให้แสดงผลภาษาไทยได้ โดยกำหนด charset เป็น utf-8
mysqli_set_charset($connection,"utf8"); 
$sql="SELECT leave_name,leave_limit FROM leave_type ";
$result = mysqli_query($connection,$sql);
    $data = array();
    while($row=mysqli_fetch_assoc($result)){
        extract($row);
        $data[]=array($row['leave_name'],intval($row['leave_limit']));
        $data2=json_encode($data);    
    }
?>

<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'รายงานจำนวนประเภทการลา'
    },
   
    accessibility: {
        point: {
           // valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
               // format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'จำนวนวันลา',
        colorByPoint: true,
        data: <?php echo $data2; ?>
    }]
});
		</script>
	</body>
</html>