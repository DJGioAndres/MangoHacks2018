<?php

require "/var/www/library/mysqlConnection.php";

$sql = "SELECT * FROM kiosk ORDER BY timestamp DESC limit 1";
$retval = $conn->query($sql);
$event  = $retval->fetch_assoc();

echo md5($event['timestamp'],$event['name']);
