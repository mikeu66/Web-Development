<?php
$server = "spring-2022.cs.utexas.edu";
$user   = "cs329e_bulko_mikeu66";
$pwd    = "Yeah\$Nobel!Plot";
$dbName = "cs329e_bulko_mikeu66";



$mysqli = new mysqli ($server,$user,$pwd,$dbName);

if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
    }





//$row = $result->fetch_row();
//echo $result;
//$row = $result->fetch_row();
function show_all(){

    $server = "spring-2022.cs.utexas.edu";
    $user   = "cs329e_bulko_mikeu66";
    $pwd    = "Yeah\$Nobel!Plot";
    $dbName = "cs329e_bulko_mikeu66"; 

    $mysqli = new mysqli ($server,$user,$pwd,$dbName);

    if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
    }

    $command = "SELECT * FROM records ORDER BY lastName ASC, firstName ASC;";


    $result = $mysqli->query($command);
    if (!$result) {
        die("Query failed: ($mysqli->error <br> SQL command = $command");
    }

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table border = 1 align = 'center'>"; 
        while($row = $result->fetch_assoc()) {
            
            echo "<tr><td>id: " . $row["id"]. "</td><td> - Last: " . $row["lastName"]. "</td><td> First:" . $row["firstName"]. "</td><td> Major: ". $row["major"]. "</td><td> GPA ". $row["GPA"]. "</td></tr>";
            }
            echo "</table>";
    }   
    else {
        echo "0 results";
    }
}
if(isset($_POST['button'])) {
    show_all();
}

if(isset($_POST['search'])) {
        $server = "spring-2022.cs.utexas.edu";
        $user   = "cs329e_bulko_mikeu66";
        $pwd    = "Yeah\$Nobel!Plot";
        $dbName = "cs329e_bulko_mikeu66"; 
        
        $mysqli = new mysqli ($server,$user,$pwd,$dbName);
        if (!empty($_POST['id']) ||  !empty($_POST['firstName']) || !empty($_POST['lastName'])){
        
            $command = "SELECT * FROM records WHERE ";
                //insert_entry();
                //$id = $_POST['id'];
                $count = 0;
                
                foreach($_POST as $key => $value){
                    if ($key == "first"){
                        $key = "firstName";
                    }
                    if ($key == "last"){
                        $key = "lastName";
                    }
                    
                    if(!empty($value)){
                        if ($count > 0){
                            $command .= "AND ".$key."='".$value."' ";
                        }
                        else{
                            $command .= $key."='".$value."' ";
                        }
                        $count += 1;
                    }
                }
                $result = $mysqli->query($command);
                if (!$result) {
                    die("Query failed: ($mysqli->error <br> SQL command = $command");
                }
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<table border = 1 align = 'center'>"; 
                    while($row = $result->fetch_assoc()) {
                        
                        echo "<tr><td>id: " . $row["id"]. "</td><td> - Last: " . $row["lastName"]. "</td><td> First:" . $row["firstName"]. "</td><td> Major: ". $row["major"]. "</td><td> GPA ". $row["GPA"]. "</td></tr>";
                        }
                        echo "</table>";
                }
                else {
                    echo "0 results";
                }
            }
}
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
                <br>
                <tr>
                    <td><label>LAST:</label></td><td><input name = "lastName" id = "lastName" class =" lastName"  type = "text"/></td>
                </tr>
                <br>
                <tr>
                    <td><label>FIRST:</label></td><td><input name = "firstName" id = "firstName"  class =" firstName" type = "text"/></td>
                </tr>
                <br>
            </table>
            <button type="submit" class = "button" name = "search"> Search </button>
            <br>
            <button type="submit" class = "button" name = "button"> View All Student Records </button>
        <form>
    </body>
</html>