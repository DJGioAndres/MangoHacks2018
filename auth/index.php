<?php

require "/var/www/library/mysqlConnection.php";

// echo $_GET['code'];
$sql = "SELECT * FROM qrcodes WHERE uri ='".$_GET['code']."'";

$retval = $conn->query($sql);
$event  = $retval->fetch_assoc();


$id = $event['__fk_userid'];

if( !empty($event) ){
  $text = "&#xE876;";
  $class = "pass";


  $sql = "INSERT INTO kiosk ( name )
  VALUES ((SELECT name FROM users WHERE id = '{$id}'))";

  $conn->query($sql);

}else{
  $text = "&#xE14C;";
  $class = "deny";
}

?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
     <meta name="HandheldFriendly" content="true" />
     <meta name = "viewport" content = "user-scalable=no, width=device-width">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <title>Access</title>
     <style media="screen">

        body {
          height: 100%;
          width: 100%;
          margin: 0px;
        }

        h1 {
          font-family: 'Material Icons';
          font-size: 250px;
          text-align: center;
          color: white;
        }

        .deny {
          background: red;
        }

        .pass {
          background: green;
        }
     </style>
   </head>
   <body class="<?php echo $class; ?>">
      <h1><?php echo $text; ?></h1>
   </body>
 </html>
