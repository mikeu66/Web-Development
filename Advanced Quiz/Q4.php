<?php
session_start();
$username = $_SESSION['username'];
if((isset($_SESSION['username']) && isset($_SESSION['password']) && (time() - $_SESSION["created"] < 900))){
    $active = true;
}
else{
    $active = false;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $resultsR = fopen("results.txt", "r") or die("Unable to open file!");
  $scores = fread($resultsR, filesize("results.txt"));
  $score_array = explode("\n",$scores);
  fclose ($resultsR);
  //print_r($score_array);
  $user_list = [];

  if ($active == true){
        
    $resultsW = fopen("results.txt", "w") or die("Unable to open file!");
    
        foreach ($score_array as $i){
            $new_score = 0;  
            $saved = explode(":",$i);
            //echo $saved[0]."  ".$saved[1];
            array_push($user_list, $saved[0]);
            if ($_POST['four'] == "c"){
                if ($username == $saved[0]){
                    $new_score = $saved[1]+10;
                }
                else{
                    $new_score = $saved[1];
                }
            }
            else{
                $new_score = $saved[1];
            }
            if ($saved[0] != ""){
                fwrite($resultsW, $saved[0].":".$new_score."\n");
            }
        }
        fclose ($resultsW);
        header('Location: Q5.php');
        die;
      }
    }
?>

<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <title>HW15</title>
  <meta name="author" content="Michael Walter">
  <meta name="description" content="Q4">
  <link rel="stylesheet" href="Q.css">
</head>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form method="post" action="Q4.php">
        <h3> Question 4</h3>
        <p>This Internet layer is responsible for creating the packets that move across the network.</p>
        <div id = "choices">
        <ul>
                <li><input type="checkbox" id="fourA" name="four" value="a"><label for="fourA">a) Physical </label></li>
                <li><input type="checkbox" id="fourB" name="four" value="b"><label for="fourB">b) Data Link </label></li>
                <li><input type="checkbox" id="fourC" name="four" value="c"><label for="fourC">c) Network </label></li>
                <li><input type="checkbox" id="fourD" name="four" value="d"><label for="fourD">d) Transport </label></li>
        </ul>
        </div>
        <br>
        <input type="submit" id = "next" value="Submit"><input type="reset" id = "clear" value="Clear">
        <br>
        <br>
    </form>
</html>