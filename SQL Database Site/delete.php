<?php
$server = "spring-2022.cs.utexas.edu";
$user   = "cs329e_bulko_mikeu66";
$pwd    = "Yeah\$Nobel!Plot";
$dbName = "cs329e_bulko_mikeu66";



$mysqli = new mysqli ($server,$user,$pwd,$dbName);

if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
    }

function delete_entry(){
    $server = "spring-2022.cs.utexas.edu";
    $user   = "cs329e_bulko_mikeu66";
    $pwd    = "Yeah\$Nobel!Plot";
    $dbName = "cs329e_bulko_mikeu66"; 

    $mysqli = new mysqli ($server,$user,$pwd,$dbName);

    $id = $_POST['id'];

    if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
    }

    $command = "DELETE FROM records WHERE id = $id;";


    $result = $mysqli->query($command);
    if (!$result) {
        die("Query failed: ($mysqli->error <br> SQL command = $command");
    }
}

if(isset($_POST['delete'])) {
    delete_entry();
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
                    <td><label>ID:</label></td><td><input name = "id" id = "id"  type = "text"/></td>
                </tr>
            </table>
            <button type="submit" class = "button" value = "delete" name = "delete"> Delete </button>
        <form>
    </body>
</html>