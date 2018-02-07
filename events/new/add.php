<?php

date_default_timezone_set('America/New_York');

require "/var/www/library/mysqlConnection.php";

$arr = (object)[
  "status" => 404
];

if(empty($_POST['name'])){
  $arr->text = "The name field canot be blank.";
  echo json_encode($arr);
  return;
}
if(empty($_POST['host'])){
  $arr->text = "The host field cannot be blank.";
  echo json_encode($arr);
  return;
}
if(empty($_POST['description'])){
  $arr->text = "Please describe the event.";
  echo json_encode($arr);
  return;
}
if(empty($_POST['date'])){
  $arr->text = "The date field cannot be blank.";
  echo json_encode($arr);
  return;
}else{


  // echo $_POST['date'];
  // return;
  $arr_date = explode("/",urldecode($_POST['date']));
  $datetime=$arr_date[2]."-".$arr_date[0]."-".$arr_date[1]." 12:00:00";
  $format = 'Y-m-d H:i:s';
  $date = DateTime::createFromFormat($format, $datetime);
  if( $date->format('U') < time()){
    $arr->text = "Date must be a day in the future.";
    echo json_encode($arr);
    return;
  }
}


$name = urldecode($_POST['name']);
$host = urldecode($_POST['host']);
$description = urldecode($_POST['description']);
// $date = urldecode($_POST['date']);

if(empty($_POST['cost'])){
  $cost = "FREE";
}
else {
  $cost = urldecode($_POST['cost']);
}


$sql = "INSERT INTO events (name, host, description, cost, date)
VALUES ('{$name}', '{$host}', '{$description}', '{$cost}', '{$datetime}')";

if ($conn->query($sql) === TRUE) {
  $arr->status = 200;
  echo json_encode($arr);
} else {
  $arr->text = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

//
//
// $sql = "INSERT INTO events (name, host, description, cost, date)
// VALUES ('{$_POST['name']}', '{$_POST['host']}', '{$_POST['description']}', '{$_POST['cost']}', '{$_POST['date']}')";
//
// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
//
// $conn->close();

 ?>
