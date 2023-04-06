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
            if ($_POST['three'] == "b"){
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
        header('Location: Q4.php');
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
  <meta name="description" content="Q3">
  <link rel="stylesheet" href="Q.css">
</head>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form method="post" action="Q3.php">
        <h3> Question 3</h3>
        <p>Which of these do NOT contribute to packet delay in a packet switching network?</p>
        <div id = "choices">
        <ul>
                <li><input type="checkbox" id="threeA" name="three" value="a"><label for="threeA">a)Processing delay at a router</label></li>
                <li><input type="checkbox" id="threeB" name="three" value="b"><label for="threeB">b) CPU workload on a client</label></li>
                <li><input type="checkbox" id="threeC" name="three" value="c"><label for="threeC">c) Transmission delay along a communications link</label></li>
                <li><input type="checkbox" id="threeD" name="three" value="d"><label for="threeD">d) Propagation delay </label></li>
        </ul>
        </div>
        <br>
        <input type="submit" id = "next" value="Submit"><input type="reset" id = "clear" value="Clear">
        <br>
        <br>
    </form>
</html>