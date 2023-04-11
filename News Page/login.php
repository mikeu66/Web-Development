<?php
// If POST then check submitted username/password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   session_start();
   //echo 'PHP version: ' . phpversion();
   //echo $_POST['left'];
   $next = $_POST['left'];
   $id = $_GET['id'];
   echo $id;
   //header('Location: '.$next);
   //echo $next;
   $myfileR = fopen("passwd.txt", "r") or die("Unable to open file!");
   $names = fread($myfileR, filesize("passwd.txt"));
   $names_array = explode("\n",$names);
   fclose ($myfileR);
   //echo explode(":",$names_array[0];
   // Get values submitted from the login form
   $username = $_POST["username"];
   $password = $_POST["password"];
   $loggedIn = false;
   //$next = "login.php
   $namesArr = [];
   $passArr = [];
   // Verify bsmith provided the correct password
   foreach ($names_array as $i){
     $saved = explode(":",$i);
     //array_push($namesArr, $saved[0]);
     //array_push($passArr, $saved[1]);
     if ($username == $saved[0] && $password == $saved[1]) {
       $loggedIn = true;
       setcookie("username", $username, time()+120);
       setcookie("password", $password, time()+120);
     }
   }
   //print_r($namesArr);
   //echo ($namesArr[0]);
   //for ($x = 0; $x <= $names_array; $x++) {
   if ($loggedIn == true) {
    
    header('Location: HW14.php');
    
     /*if ($next == "rightLink.html"){
      header('Location: rightLink.html');
     }
     else{
      header("Location: https://spring-2022.cs.utexas.edu/cs329e-bulko/mikeu66/HW5/nextPage.html");
     }*/
      //setcookie("username", $username, time()+120);
      //$_SESSION["username"] = $username;
      
      exit;
      //echo ("<script>location.href='rightLink.html'</script>");
      //
      //die;
   }
   //header('Location: '.$next);
   //else {
   //   echo "<p>Incorrect username or password.</p>";
      //echo "dd".$_SESSION['backTo'];
      //echo $phpVariable = $_GET['var_value'];
      //echo $_REQUEST['name'];
   //}
   
}
?>



<!DOCTYPE html> 
<html>
  <head><title>Login</title></head>
  <link rel="stylesheet" href="HW14.css">
  <form method="post" action="login.php">
      <div id = "login">
      <br>
      <a href = "signup.php">Log In</a>
      <br>
      <br>
    
      <div>Username: 
        <input type="text" name="username" autofocus></div>
      <div>Password: 
        <input type="password" name="password">
      </div>
      <input type="submit" value="Login">
      <br>
      <br>
      <br>
    </div>
  </form>
</html>