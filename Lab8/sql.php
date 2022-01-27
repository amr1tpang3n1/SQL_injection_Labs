<?php
include('..\db.php');
$con = mysqli_connect($dbsrvname, $dbusername, $dbpassword, $dbname);
if (!$con){
  echo("Connection ERROR");
  die(print_r(mysqli_error($con)));
}
if (preg_match("/\s+/", $_POST["username"]) or 
    preg_match("/\s+/", $_POST["password"])){
  die("SPACE NOT allowed");
}
$query = "SELECT * FROM signin WHERE username='" . 
         $_POST["username"] . "' AND password='" .
		 $_POST["password"] . "';";
$stms = mysqli_query($con, $query);
if ($stms === false){
  echo("ERROR during query execution: ");
  die(print_r(mysqli_error($con))); 
}
$row = mysqli_fetch_array($stms, MYSQLI_ASSOC);
if ($row){
  die("Logged in");}
else{
  die("Wrong username or password");}
?>