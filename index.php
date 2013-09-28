<?php
require "header.php";

require dirname(__FILE__)."/lib/db.inc.php";

if(isset($_GET["until"]))
	$until = (int) $_GET["until"];
else
	$until = date("Y-m-d H:i:s");


if(isset($_GET["from"]))
	$from = (int) $_GET["from"];
else
	$from = date("Y-m-d H:i:s",strtotime("-24 hours",strtotime($until)));

?>


<strong><?= $from ?> - <?=$until?></strong>

<?php

	$rows = Database::Query("SELECT * FROM cron_pings WHERE date BETWEEN :from and :until", array(":from"=>$from, ":until"=>$until))->fetchAll();
#	print_r($rows);
	$speeds = Database::Query("SELECT * FROM cron_downloads WHERE date BETWEEN :from and :until", array(":from"=>$from, ":until"=>$until))->fetchAll();


?>

<div class="chart" id="chart_response_time" ></div>
<div class="chart" id="chart_packet_loss" ></div>
<div class="chart" id="chart_download_speed"></div>


<script>

$(function () {
        $('#chart_response_time').highcharts({
            title: {
                text: 'Average response time',
            },
            xAxis: {
                categories: [<?php
                	foreach($rows as $r) {
                		echo "'".$r["date"]."', ";
                	}
                ?>]
            },
            yAxis: {
                title: {
                    text: 'Average responsetime (ms)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'ms'
            },
            series: [{
                data: [<?php
                	foreach($rows as $r) {
                		echo $r["response_time"].", ";
                	}
                ?>]
            }]
        });


         $('#chart_packet_loss').highcharts({
            title: {
                text: 'Packetloss',
            },
            xAxis: {
                categories: [<?php
                	foreach($rows as $r) {
                		echo "'".$r["date"]."', ";
                	}
                ?>]
            },
            yAxis: {
                title: {
                    text: 'Packages lost (%)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '%'
            },
            series: [{
                data: [<?php
                	foreach($rows as $r) {
                		echo $r["packet_loss"].", ";
                	}
                ?>]
            }]
        });

         $('#chart_download_speed').highcharts({
            title: {
                text: 'Download speed',
            },
            xAxis: {
                categories: [<?php
                	foreach($speeds as $r) {
                		echo "'".$r["date"]."', ";
                	}
                ?>]
            },
            yAxis: {
                title: {
                    text: 'Download speed (mbit/s)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'mbit/s'
            },
            series: [{
                data: [<?php
                	foreach($speeds as $r) {
                		echo $r["speed"].", ";
                	}
                ?>]
            }]
        });
    });

</script>

<?php 
	require "footer.php";
?>