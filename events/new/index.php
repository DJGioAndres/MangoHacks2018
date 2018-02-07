<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Make A New Great Occurrence</title>
  <link rel='shortcut icon' href='https://cdn.iconscout.com/public/images/icon/free/png-256/mango-fruit-vitamin-healthy-summer-food-3bf2382f17dd7b94-256x256.png' type='image/x-icon'/ >


  <!-- Google Identity Information -->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="/js/google-identity.js"></script>
  <meta name="google-signin-client_id" content="634130985921-ksisab84f4ocq0aeje6hlibv7une3cdb.apps.googleusercontent.com">

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/1-col-portfolio.css" rel="stylesheet">
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

</head>
<style>
    html,
    body {
      margin: 0px;
      padding: 0px;
    }

    div.main {
      background: url(../../images/bg.jpg) top center no-repeat;
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
    }
    label {
      color: white;
    }
    @media screen and (max-width: 768px) {
      .greeting h1{
        font-size: 40px;
      }
    }
  </style>
  <body>
<!--     <form  action="add.php" method="post">
      What would you like to call the event? <input type="text" name="name" value=""><br />
      Who is hosting the event? <input type="text" name="host" value=""><br />
      Describe your event: <textarea name="description" rows ="10" cols="25"></textarea><br />
      How much is the event going to cost? <input type="text" name="cost" value=""><br />
      When is the event going to take place? <input type="text" name="date" value=""><br />
      <input type="submit" name="submit" value="submit">
    </form> -->

    <div class="container-fluid main">
      <nav class="navbar navbar-light bg-none">
        <a class="navbar-brand" href="http://makeanewgreatoccurance.com" style="color: white;">
          <img src="https://cdn.iconscout.com/public/images/icon/free/png-256/mango-fruit-vitamin-healthy-summer-food-3bf2382f17dd7b94-256x256.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Make A New Great Occurance (mango)
        </a>
      </nav>
      <h1 class="display-4 text-center" style="color: white; padding-top: 20px;">Create your event.</h1>
      <div class="row" style="margin-top: 75px;">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <form name="event" action="../index.php" method="post">
            <div class="form-group">
              <label for="title">Event Name</label>
              <input type="text" class="form-control" name="name" placeholder="My New Event">
            </div>
            <div class="form-group">
              <label for="host">Who's hosting the event?</label>
              <input type="text" class="form-control" name="host" placeholder="John Doe">
            </div>
            <div class="form-group">
              <label for="description">Event Description</label>
              <textarea class="form-control" name="description" rows ="10" cols="25" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod..."></textarea>
            </div>
            <div class="form-group">
              <label for="cost">Event Cost</label>
              <input type="text" name="cost" placeholder="15"></textarea>
            </div>
            <div class="form-group">
              <label for="cost">Event Date</label>
              <input type="text" name="date" placeholder="mm/dd/yyyy"></textarea>
            </div>
            <div>
              <input id="submit" name="submit" type="submit" value="Create Event" class="btn btn-primary">
              <a class="btn btn-danger" href="https://makeanewgreatoccurance.com" role="button">Cancel</a>
            </div>
          </form>
        </div>
        <div class="col-lg-2"></div>
      </div>
      <div class="row" style="margin-top: 75px;"></div>
      <footer class="py-5 bg-dark" style="">
        <div class="container-fluid">
          <p class="m-0 text-center text-white">Copyright &copy; Make A New Great Occurrence (mango) 2018</p>
        </div>
        <!-- /.container -->
      </footer>
    </div>


    <script>

      $( "form" ).submit(function( event ) {
        event.preventDefault();
        console.log(document.event.name.value )
        console.log(document.event.date.value )
        console.log(document.event.cost.value )
        console.log(document.event.description.value )
        console.log(document.event.host.value )
        $.ajax({
                type: "POST",
                url: "add.php",
                // context: document.event,
                data: {
                    "name": encodeURIComponent(document.event.name.value),
                    "date": encodeURIComponent(document.event.date.value),
                    "cost": encodeURIComponent(document.event.cost.value),
                    "description": encodeURIComponent(document.event.description.value),
                    "host": encodeURIComponent(document.event.host.value)
                },
                dataType: 'json',
                success: function (obj) {
                    switch (obj.status) {
                      case 200:
                          window.location.href = "/events";
                        break;
                      case 404:
                        alert(obj.text)
                        break;
                    }
                }
            });
      });

    </script>


  </body>
</html>
