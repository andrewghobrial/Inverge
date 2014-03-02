<?php
session_start();
require('dbconnect.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$customer_update = mysql_query("SELECT id FROM Persons WHERE username='".$_REQUEST['username']."' AND password='".$_REQUEST['password']."'");
if(mysql_num_rows($customer_update)==1) {
  $_SESSION['username'] = $_REQUEST['username'];
  $auth_cookie_val = md5($_SESSION['username']." ".$_SERVER['REMOTE_ADDR']." ".$_SESSION['authsalt']);
    setcookie('session_id',$auth_cookie_val, 0, '/', 'ec2-54-234-238-138.compute-1.amazonaws.com',false);
    $arrayQ = mysql_fetch_assoc($customer_update);
    $id= $arrayQ['id'];
    $_SESSION['id'] = $id;
    header("Location: http://inverge.net/Inverge/list_ideas.php");
}
exit();

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inverge</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php 
    include('nav.php');
    ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <br>
        <br>
        <div class="col-md-6">
          <img src="imgs/Logo.jpg">
          <p>Inverge offers a simple, yet effective, way for students to connect and brainstorm, collaborate and communicate, and share their visions. Inverge provides resources for students to innovate and succeed with their latest ventures!</p>
          <p><a class="btn btn-primary btn-lg" role="button" href="signup.php">Sign Up &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <embed width="500" height="450" src="http://www.youtube.com/v/XGSy3_Czz8k" type="application/x-shockwave-flash"> </embed>
        </div>
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Ideas</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View more &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>People</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View more &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>teams</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View more &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Inverge 2014</p>
      </footer>
    </div> <!-- /container -->






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>