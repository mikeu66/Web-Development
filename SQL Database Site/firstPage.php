<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    //ini_set( "session.gc_maxlifetime", $timeout );
    $myfileR = fopen("passwd.txt", "r") or die("Unable to open file!");
    $names = fread($myfileR, filesize("passwd.txt"));
    $names_array = explode("\n",$names);
    fclose ($myfileR);

    $username = $_POST["username"];
    $password = $_POST["password"];
    $loggedIn = true;

    foreach ($names_array as $i){
        $saved = explode(":",$i);
        if ($username == $saved[0] && $password == $saved[1]) {
          $loggedIn = true;
          header('Location: interface.php');
          die();
        }
        else{
          $loggedIn = false;
        }
    }
    if ($loggedIn == false){
      echo ("<script> alert('Login Failed') </script>");
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
    <br>
    <br>
  <form method="post" action="firstPage.php">
    <body>
    <h2>Sign In</h2>
    
    <table align = "center">
        <tr>
            <td><label>Username:</label></td><td><input name = "username" id = "username"  type = "text" size = "30" required/> </td>
        </tr>
        <tr>
            
            <td> <label>Password:  </label></td><td><input name = "password" id = "password" type = "password" size = "30" required/> </td>
        </tr>


        

        <tr><td><td>
            <br>
            <input type="submit" id = "register" value="Sign In"><input type="reset" value="Clear">
        </td></tr>

    </table>
  </body>
  </form>
</html>