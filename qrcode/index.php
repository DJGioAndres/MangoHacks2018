<?php

require "/var/www/library/phpqrcode/qrlib.php";

// echo "Hello = ".$_GET['code'];

QRcode::png("https://makeanewgreatoccurance.com/auth/".$_GET['code'],$_GET['code'].'.png', QR_ECLEVEL_H);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="M.A.N.G.O. Events Website">
    <meta name="author" content="">
    <title>QRCODE Ticket</title>
    <link rel='shortcut icon' href='https://cdn.iconscout.com/public/images/icon/free/png-256/mango-fruit-vitamin-healthy-summer-food-3bf2382f17dd7b94-256x256.png' type='image/x-icon'/ >
    <!-- Google Identity Information -->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="js/google-identity.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<!-- Bootstrap core CSS -->
	<link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="/css/1-col-portfolio.css" rel="stylesheet">
	<link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <style>
      h1 {
        color: #941A16;
        text-align: center;
        margin: 0px auto;

      }

      body {
        background: #ffce83;
      }

      img {
        display: block;
        margin: 30px auto 0px;
        height: 279px;
        width: 279px;
      }
    </style>
  </head>
  <body>
    <h1>This is your QR code</h1>
    <img src="<?php echo $_GET['code'].'.png' ?>" alt="">
  </body>
</html>
