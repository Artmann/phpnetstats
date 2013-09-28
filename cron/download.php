<?php
	require dirname(__FILE__)."/../lib/db.inc.php";

	$url = "http://ftp.sunet.se/pub/os/Linux/distributions/debian-cd/current-live/i386/iso-hybrid/debian-live-7.0.0-i386-xfce-desktop.iso.zsync"; 
	$path = "downloadedFile.tmp";
	$start = microtime(true);
	$file = file_put_contents($path, file_get_contents($url));

	$size = filesize($path);
	$end = microtime(true) ;
	$time = ($end - $start);

	$speed = round(($size * 8) / $time / 1024 / 1024, 2);
	$timestamp = date("Y-m-d H:i:s");

	echo "Url: $url<br>";
	echo "Size: $size<br>";
	echo "Time: $time<br>";
	echo "Speed: $speed<br>";

	Database::Query("INSERT INTO cron_downloads(date, url, size, time, speed) VALUES(:date, :url, :size, :time, :speed)",	array(
		":date" => $timestamp,
		":url"   => $url,
		":size"		=> $size,
		":time"		=> $time,
		":speed"		=> $speed,
	));

?>