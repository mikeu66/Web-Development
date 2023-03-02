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
