<?php
require "/var/www/library/mysqlConnection.php";

$sql = "SELECT name FROM kiosk ORDER BY timestamp DESC limit 1";
$retval = $conn->query($sql);
$event  = $retval->fetch_assoc();


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.unsplash.com/photos/random?client_id=6cf9b571b65deba76e5f2c07bfc7a1fd02b9a5156839fcff25d27301d838ea61&query=mango&count=1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);

$json = json_decode($output);


;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style media="screen">
      body {
        background-image: url(<?php echo $json[0]->urls->regular;  ?>);
        background-size: cover;
        background-repeat: no-repeat;
      }
    </style>
  </head>
  <body>
    <h1 class="display-1 text-center" style="font-size: 200px; background-color: rgba(255,255,255,.5);">Welcome!</h1>
    <h1 class="display-1 text-center" style="font-size: 175px; background-color: rgba(255,255,255,.5);"><?php echo $event['name'];?></h1>

  </body>
</html>
