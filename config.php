<?php
// Step1:  Read Data
define("SERVER", "localhost");
define("USER","root");
define("PASSWORD","");
define("DBNAME", "airbnb");

// Step2: Connection to the server and select DataBase
$con = mysqli_connect ( SERVER  ,USER , PASSWORD, DBNAME);
if (!$con){
    echo " <b> <p> You connect to the wrong server or you have user authenticate problem: //  error server code" . mysqli_connect_error() . " // </p> </b> ";   
      
}
?>