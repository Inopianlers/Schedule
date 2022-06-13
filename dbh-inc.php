<?php

  // $servername = "ultraoffice-b88.c7vw8waozug9.ap-southeast-1.rds.amazonaws.com";
  // $DBusername = "ultraflex";
  // $DBpassword = "ultrab88flex";

  // Ultraflex
  $servername = "ultraoffice-sg.c7vw8waozug9.ap-southeast-1.rds.amazonaws.com";
  $DBusername = "ultraflex";
  $DBpassword = "ultraflexultraflex";


  // Create connection
  $conn = mysqli_connect($servername, $DBusername, $DBpassword);

  //Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>";
    }

  $db_selected = mysqli_select_db($conn,"ultraflex");
  if (!$db_selected) {
    die ('Can\'t use : ' . mysqli_error($conn));
  }

  global $conn;  

?>
