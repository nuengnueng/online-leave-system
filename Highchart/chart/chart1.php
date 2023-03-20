<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
.highcharts-figure, .highcharts-data-table table {
    min-width: 360px; 
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

		</style>

	</head>
	<body>
<script src="highcharts/highcharts.js"></script>
<script src="highcharts/modules/series-label.js"></script>
<script src="highcharts/modules/exporting.js"></script>
<script src="highcharts/modules/export-data.js"></script>
<script src="highcharts/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"> </div>
    
</figure>

<?php
//เชื่อมต่อฐานข้อมูล
include('../connection/connection.php');
//ให้แสดงผลภาษาไทยได้ โดยกำหนด charset เป็น utf-8
mysqli_set_charset($connection,"utf8");

$sql = "SELECT leave_name,leave_limit FROM leave_type";
$result = mysqli_query($connection,$sql);

    $leave_name = array();
    $leave_limit = array();
    while($row=mysqli_fetch_assoc($result)) {
        $leave_name[] = $row['leave_name'];
        $leave_limit[] =$row['leave_limit'];
    }
?>


<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type:'line'
    },
    title: {
        text: 'รายงานสินค้าคงเหลือประจำเดือน กันยายน 2564'
    },

    subtitle: {
        text: 'by Nongyao'
    },

    yAxis: {
        title: {
            text: 'จำนวนสินค้า'
        }
    },

    xAxis: {
        categories: [<?php echo "'" . implode("','", $leave_name) . "'"; ?>]
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

   

    series: [{
        name: 'จำนวนสินค้า',
        data: [<?php echo implode(",",$leave_limit); ?>]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
		</script>
	</body>
</html>
