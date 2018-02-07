<?php

require "/var/www/library/mysqlConnection.php";
require "/var/www/library/sendEmailViaGmail.php";

$email=urldecode($_POST['email']);
$name=urldecode($_POST['name']);
$event_id = $_POST['event'];


$sql = "SELECT * FROM events WHERE id =".$_POST['event'];
$retval = $conn->query($sql);
$event  = $retval->fetch_assoc();

$shortname = preg_replace("/[^a-z0-9]/i", "", strtolower($event['name']));

$uri = $shortname.bin2hex(openssl_random_pseudo_bytes(75));

$sql = "INSERT INTO users ( name, email )
  SELECT * FROM (SELECT '{$name}', '{$email}') AS tmp
  WHERE NOT EXISTS (
    SELECT id FROM users WHERE users.email ='{$email}'
  ) LIMIT 1";

$conn->query($sql);

# add new user or check if user exists
$sql = "INSERT INTO ticket ( name, email )
  SELECT * FROM (SELECT '{$name}', '{$email}') AS tmp
  WHERE NOT EXISTS (
    SELECT id FROM users WHERE users.email ='{$email}'
  ) LIMIT 1";

$conn->query($sql);

# add user to event
# duplicates are allowed
$sql = "INSERT INTO qrcodes ( uri, __fk_event, __fk_userid )
    VALUES ( '{$uri}' , '{$event_id}', (SELECT id FROM users WHERE email = '{$email}'))";

$conn->query($sql);

$event="MANGO - ".$event['name'];
$url="https://makeanewgreatoccurance.com/qrcode/".$uri;

sendEmailViaGmail($email,$event,$url);


 ?>
