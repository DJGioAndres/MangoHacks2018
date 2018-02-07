<?php

require "/var/www/library/mysqlConnection.php";

// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, "http://www.miamiandbeaches.com/webservices/service.aspx?op=searchevents&progcode=");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_HEADER, false);
// $result=json_decode(curl_exec($curl));
// curl_close($curl);

$sql = "SELECT * FROM events ORDER BY date ASC";
//$sq1 = "SELECT CONVERT(date,$sql1,101)"
$retval = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Make A New Great Occurance</title>
  <link rel='shortcut icon' href='https://cdn.iconscout.com/public/images/icon/free/png-256/mango-fruit-vitamin-healthy-summer-food-3bf2382f17dd7b94-256x256.png' type='image/x-icon'/ >

  <!-- Google Identity Information -->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="../js/google.js"></script>
  <meta name="google-signin-client_id" content="634130985921-ksisab84f4ocq0aeje6hlibv7une3cdb.apps.googleusercontent.com">

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/1-col-portfolio.css" rel="stylesheet">

  <style>

    html,
    body {
      margin: 0px;
      padding: 0px;
    }

    div.main {
      background: url("/images/bg.jpg") top center no-repeat;
      background-size: cover;
      background-size: cover;
      height: 100vh;
      min-height: 500px;
      padding: 0px;
      overflow-y: auto;
      overflow-x: hidden;
    }

    h1 {
      font-family: 'Roboto', sans-serif;
      font-size: 72px;
      color: white;

    }

    h3 {
      display: block;
      width: 100%;
      color: white;
    }

    p {
      display: block;
      width: 100%;
      color: lightgrey;
    }

    ul li{
      list-style: none;
      padding: 25px 0px 50px;
      border-bottom: 1px solid lightgrey;
    }

  </style>

</head>

<body>
  <!-- Page Content -->
  <div class="container-fluid main">
    <div class="row">
      <div class="row button">
				<div class="col"></div>
				<div class="col">
					<div class="g-signin2" data-onsuccess="signIn"></div>
				</div>
			<div class="col"></div>
		</div>
    </div>
    <nav class="navbar navbar-light bg-none">
      <a class="navbar-brand" href="http://makeanewgreatoccurance.com" style="color: white;">
        <img src="https://cdn.iconscout.com/public/images/icon/free/png-256/mango-fruit-vitamin-healthy-summer-food-3bf2382f17dd7b94-256x256.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Make A New Great Occurance (mango)
      </a>
    </nav>
    <h1 class="text-center">Up Coming Events</h1>
    <div class="row">
      <div class="col-sm-4 col-lg-2"></div>
      <div class="col-sm-4 col-lg-8">
        <ul>
          <!-- <div class="row">
              <h3>
                Fancy display heading
                <small class="text-muted">With faded secondary text</small>
              </h3>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
              <button type="button" class="btn btn-outline-primary">Attend Event</button>
          </div> -->
          <!-- <hr> -->
          <?php
          while ($row = $retval->fetch_assoc()) {
              echo "<li><div class=\"row\"><h3>{$row['name']} <small>by {$row['host']} on {$row['date']}</small></h3><p>{$row['description']}</p> <button type=\"button\" class=\"btn btn-outline-light\" data-event=\"{$row['id']}\">Attend Event for \${$row['cost']}</button></div></li>";
          }
            //
            // foreach ($result as $entry){
            //   echo "<li><h3>".$entry->Name."</h3><p>".$entry->Description."</p></li>";
            // }

          ?>
        </ul>
      </div>
    </div>
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>

    $("button").click(function() {
      if(google_user){
        $.ajax({
                type: "POST",
                url: "email.php",
                // context: document.event,
                data: {
                    "event": encodeURIComponent($(this).attr("data-event")),
                    "name": encodeURIComponent(google_user.name),
                    "email": encodeURIComponent(google_user.email),
                },
                // dataType: 'json',
                success: function (obj) {
                  console.log(obj)
                    // switch (obj.status) {
                    //   case 200:
                    //       window.location.href = "/events";
                    //     break;
                    //   case 404:
                    //     alert(obj.text)
                    //     break;
                    // }
                }
            });

      }else{
        alert("You first need to sign in !")
      }
    })
  </script>
</body>
</html>
