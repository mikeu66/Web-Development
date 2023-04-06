<?php
session_start();
$username = $_SESSION['username'];
if((isset($_SESSION['username']) && isset($_SESSION['password']) && (time() - $_SESSION["created"] < 900))){
    $active = true;
}
else{
    $active = false;
}
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$resultsR = fopen("results.txt", "r") or die("Unable to open file!");
$scores = fread($resultsR, filesize("results.txt"));
$score_array = explode("\n",$scores);
fclose ($resultsR);

foreach ($score_array as $i){
    $saved = explode(":",$i);
    if ($saved[0] == $username){
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<form>";
        echo "<h1>".$saved[0]." your score was: ".$saved[1]."/60"."</h1>";
        echo "</form>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Next Page</title>
        <meta charset="UTF-8">
        <meta name="description" content="Results Page">
        <meta name="author" content="Michael Walter">
        <link rel="stylesheet" href="Q.css">
     </head> 
<body>

</body>
</html>