<?php 
$whereTo = "login.php";
session_start();
//echo $_COOKIE['username'];
$active = false;
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $active = true;
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>HW14</title>
    <meta charset="UTF-8">
    <meta name="description" content="Cookies">
    <meta name="author" content="Michael Walter">
    <link rel="stylesheet" href="HW14.css">
</head>



<div id="container">
<div id="top">

 <h1>The Austin News</h1>
 <h4>Austin, Texas</h4>
 <h5>2/25/22</h5>

 

</div>
 <form id = "links" action = "login.php">
 <div id="leftnav">
    <h4>National</h4>
    <a id = "left" href = "<?php if ($active == true) { echo "leftLink.html ";} else {echo $whereTo."?id=123";} ?>" >Man receives 450,000$ for an unwanted birthday party at his office</a>
    <!-- <form action="<?//php if ($active == true) { echo "rightLink.html ";} else {echo "login.php";} ?>" method="post">
    <button type="submit" name="left" value="rightLink.html" class="btn-link">Man receives 450,000$ for an unwanted birthday party at his office</button>
    </form> -->
    
</div>

<div id="rightnav">
    <h3>Other News</h3>
    <a href = "<?php if ($active == true) { echo "rightLink.html ";} else {echo $whereTo;} ?>"> Taco Bell annouces the return of the Mexican Pizza</a>
    
</div>

<div id="content">
    <h2>News</h2>
    <div id = "middle">
        <br>

        <a href = "<?php if ($active == true) { echo "middleTop.html ";} else {echo $whereTo;} ?>">Local Golden retriever wins Best Dog for the second year in a row</a>
        <br>
        
        <br>
        <br>
        <a href = "<?php if ($active == true) { echo "middleMiddle.html ";} else {echo $whereTo;} ?>">What to know about venomous snakes in Central Texas</a>
       
        <br>
        <br>
        <br>
        <a href = "<?php if ($active == true) { echo "middleBottom.html ";} else {echo $whereTo;} ?>">Austin's new Moody Center is Finally opening</a>
        
        <br>
        <br>
        <br>
        <br>
    </div>
    <div id="footer">
    </div>
    </div>
    </div>
</form>
</html>
