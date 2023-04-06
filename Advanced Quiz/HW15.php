<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    //open and read text file containing logins
    $myfileR = fopen("passwd.txt", "r") or die("Unable to open file!");
    $names = fread($myfileR, filesize("passwd.txt"));
    $names_array = explode("\n",$names);
    fclose ($myfileR);
    $username = $_POST["username"];
    $password = $_POST["password"];
    $loggedIn = false;
    $user_list = [];

    //check if user has already taken exam
    $resultsR = fopen("results.txt", "r") or die("Unable to open file!");
    $scores = fread($resultsR, filesize("results.txt"));
    $score_array = explode("\n",$scores);
    fclose ($resultsR);
    $user_list = [];

    
    foreach ($score_array as $i){
      $saved = explode(":",$i);
      array_push($user_list, $saved[0]);
    }
    if (in_array($username, $user_list) == false){

        foreach ($names_array as $i){
            $saved = explode(":",$i);
            if ($username == $saved[0] && $password == $saved[1]) {
              $loggedIn = true;
              $_SESSION["username"] = $username;
              $_SESSION["password"] = $password;
              $_SESSION["created"] = time();
            }
          }
        if ($loggedIn == true) {
          header('Location: Q1.php');
          die;
          }
    }
  }
?>






<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <title>HW15</title>
  <meta name="author" content="Michael Walter">
  <meta name="description" content="Login">
  <link rel="stylesheet" href="HW15.css">
</head>
    <br>
    <br>
    <br>
    <br>
    <br>
  <form method="post" action="HW15.php">
    <h2>Sign In</h2>
    
    <table>
        <tr>
            <td><label>Username:</label></td><td><input name = "username" id = "username"  type = "text" size = "30" /> </td>
        </tr>
        <tr>
            
            <td> <label>Password:  </label></td><td><input name = "password" id = "password1" type = "text" size = "30" /> </td>
        </tr>


        

        <tr><td><td>
            <br>
            <input type="submit" id = "register" value="Sign In"><input type="reset" value="Clear">
        </td></tr>

    </table>
  </form>
</html>