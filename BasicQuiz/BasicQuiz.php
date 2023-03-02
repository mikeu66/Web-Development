<html>
  <head>
    <title></title>
  </head>
  <body>

<?php

    function alert_score($message){
      echo "<script>alert('Your grade is $message/6.');</script>";
    }

    $score = 0;
    $one = $_POST["one"];
    $two = $_POST["two"];
    $three = $_POST["three"];
    $four = $_POST["four"];
    $five = $_POST["five"];
    $five = strtolower($five);
    $six = $_POST["six"];
    $six = strtolower($six);


   
    // Add to score if answer is correct
    if ($one == "false"){
      $score += 1;
    }
    if ($two == "true"){
      $score += 1;
    }
    if ($three == "b"){
      $score += 1;
    }
    if ($four == "c"){
      $score += 1;
    }
    if ($five == "http"){
      $score += 1; 
    }
    if ($six == "favicon"){
      $score += 1;
    }

    

?>
<h1>You have completed the quiz!</h1>
<?php 
    alert_score($score)

?>
<h2><?php echo "$score/6" ?></h2>
</body>
</html>