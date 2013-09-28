<?php

require dirname(__FILE__)."/../lib/db.inc.php";
require dirname(__FILE__)."/../lib/network.php";

$times = 100;
$responseTime = 0;
$responses = 0;

for($i = 0; $i < $times; $i++) {
	$p = Network::ping("google.com");
	if($p) {
		$responseTime += $p;
		$responses++;
	}
		 
}


$averageResponseTime = $responseTime / $times;
$packetLoss = round((($times-$responses) / $times * 100), 2);
$timestamp = date("Y-m-d H:i:s");
echo "$averageResponseTime ms<br> $packetLoss";

Database::Query("INSERT INTO cron_pings(date, response_time, packet_loss) VALUES(:date, :rt, :pl)",	array(
		":date" => $timestamp,
		":rt"   => $averageResponseTime,
		":pl"		=> $packetLoss,
	));