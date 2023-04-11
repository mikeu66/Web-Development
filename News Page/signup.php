<?php
$myfileR = fopen("passwd.txt", "r") or die("Unable to open file!");
$names = fread($myfileR, filesize("passwd.txt"));
$names_array = explode("\n",$names);
fclose ($myfileR);

$userList = [];
foreach ($names_array as $i){
    $saved = explode(":",$i);
    array_push($userList, $saved[0]);
}
$myfileW = fopen("passwd.txt", "a") or die("Unable to open file!");
$username = $_POST["username"];
$password = $_POST["password"];
if (in_array($username, $userList) == false){
    file_put_contents("passwd.txt", $username.":".$password."\n", FILE_APPEND);
    setcookie("username", $username, time()+120);
    setcookie("password", $password, time()+120);
    header('Location: HW14.php');
}

fclose ($myfileW);
//setcookie("username", $username, time()+120);
//setcookie("password", $password, time()+120);
?>





<!DOCTYPE html> 
<html>
  <head><title>Login</title></head>
  <br>
  <br>
  <form method="post" action="signup.php">
    <div>Username: 
      <input type="text" name="username" autofocus></div>
    <div>Password: 
      <input type="password" name="password">
    </div>
    <input type="submit" value="Login">
    <br>
    <br>
    <br>
  </form>
</html>