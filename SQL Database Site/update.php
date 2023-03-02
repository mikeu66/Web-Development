<?php
$server = "spring-2022.cs.utexas.edu";
$user   = "cs329e_bulko_mikeu66";
$pwd    = "Yeah\$Nobel!Plot";
$dbName = "cs329e_bulko_mikeu66";



$mysqli = new mysqli ($server,$user,$pwd,$dbName);

if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
    }

function insert_entry(){
    
    if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
    }

    //$command = "INSERT INTO records (id, lastName, firstName, major, GPA) VALUES ($id, '$last', '$first', '$major', $gpa)";


    $result = $mysqli->query($command);
    if (!$result) {
        die("Query failed: ($mysqli->error <br> SQL command = $command");
    }
}


if(isset($_POST['update'])) {
$server = "spring-2022.cs.utexas.edu";
$user   = "cs329e_bulko_mikeu66";
$pwd    = "Yeah\$Nobel!Plot";
$dbName = "cs329e_bulko_mikeu66"; 

$mysqli = new mysqli ($server,$user,$pwd,$dbName);

    //insert_entry();
    $id = $_POST['id'];
    foreach($_POST as $key => $value){
        if(!empty($value)){
            $command = "UPDATE records SET $key = '$value' WHERE id = $id";
            $result = $mysqli->query($command);
            echo $key."  ".$value;
        }
    }
} 



//$row = $result->fetch_row();
//echo $result;
//$row = $result->fetch_row()



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
        <form method = "post">
            <table align = "center">
                <h2>Actions</h2>
                <tr>
                    <td><label>ID:</label></td><td><input name = "id" id = "id"  type = "text" required/></td>
                </tr>
                <br>
                <tr>
                    <td><label>LAST:</label></td><td><input name = "lastName" id = "lastName"  type = "text"/></td>
                </tr>
                <br>
                <tr>
                    <td><label>FIRST:</label></td><td><input name = "firstName" id = "firstName"  type = "text"/></td>
                </tr>
                <br>
                <tr>
                    <td><label>Major:</label></td><td><input name = "major" id = "major"  type = "text"/></td>
                </tr>
                <br>
                <tr>
                    <td><label>GPA:</label></td><td><input name = "GPA" id = "GPA"  type = "text"/></td>
                </tr>
                <br>
            </table>
            <button type="submit" class = "button" name = "update"> Update </button>
        <form>
    </body>
</html>