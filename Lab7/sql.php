<?php
include('..\db.php');
$con = mysqli_connect($dbsrvname, $dbusername, $dbpassword, $dbname);
if (!$con){
  echo('Connection ERROR');
  die(print_r(mysqli_error($con)));
}
$query = "SELECT count(*) FROM signin WHERE username='" . 
         $_POST['username'] . "' AND password='" .
		 $_POST['password'] . "';";
$stms = mysqli_query($con, $query);
if ($stms === false){
  echo('ERROR during query execution: ');
  die(print_r(mysqli_error($con))); 
}
$row = mysqli_fetch_row($stms);
if ($row[0] == 1){
  die('Logged in');
}
else{
  die('Wrong username or password');
}
?>