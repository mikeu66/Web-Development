<?php
$server = "spring-2022.cs.utexas.edu";
$user   = "cs329e_bulko_mikeu66";
$pwd    = "Yeah\$Nobel!Plot";
$dbName = "cs329e_bulko_mikeu66";



$mysqli = new mysqli ($server,$user,$pwd,$dbName);

if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
    } 

$command = "SELECT * FROM records";


$result = $mysqli->query($command);


if (!$result) {
    die("Query failed: ($mysqli->error <br> SQL command = $command");
}
//$row = $result->fetch_row();
//echo $result;


?>

<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <title>HW16</title>
  <meta name="author" content="Michael Walter">
  <meta name="description" content="Login">
  <link rel="stylesheet" href="HW16.css">
</head>
    <body>
        <form>
        <h2>Actions</h2>
        <br>
        <button type="button" class = "button" onclick = "location.href = 'insert.php'"> Insert Student Record </button>
        <br>
        <button type="button" class = "button" onclick = "location.href = 'update.php'"> Update Student Record </button>
        <br>
        <button type="button" class = "button" onclick = "location.href = 'delete.php'"> Delete Student Record </button>
        <br>
        <button type="button" class = "button" onclick = "location.href = 'view.php'"> View Student Record </button>
        <br>
        <button type="button" id = "logout" class = "button" onclick = "location.href = 'firstPage.php'"> Logout </button>
        </form>
    </body>
</html>