<?php
session_start();
require('dbconnect.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$customer_update = mysql_query("SELECT id FROM Persons WHERE username='".$_REQUEST['username']."' AND password='".$_REQUEST['password']."'");
if(mysql_num_rows($customer_update)==1) {
  $_SESSION['username'] = $_REQUEST['username'];
  $auth_cookie_val = md5($_SESSION['username']." ".$_SERVER['REMOTE_ADDR']." ".$_SESSION['authsalt']);
    setcookie('session_id',$auth_cookie_val, 0, '/', 'inverge.net',false);
    $arrayQ = mysql_fetch_assoc($customer_update);
    $id= $arrayQ['id'];
    $_SESSION['id'] = $id;
    header("Location: http://inverge.net/Inverge/list_ideas.php");
} else {
  print '<script>alert("The email and/or password is incorrect!");</script>';
}


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
        <br>
        <br>
        <div class="col-md-7">
          <img src="imgs/Logo.jpg">
          <p>An innovative convergence of people and ideas. Connect with other university students over common ideas and complimentary skills to form teams for successful ventures!</p>
          <p><a class="btn btn-primary btn-lg" role="button" href="signup.php">Sign Up &raquo;</a></p>
        </div>
        <div class="col-md-3">
          <br>
          <br>
          <iframe width="480" height="270" src="//www.youtube.com/embed/TILa0VBwD8Q?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Ideas</h2>
          <p>Discover great ideas (and filter by interest area) or create an idea of your own! Indicate your interest in an idea to have it listed on your profile, and contact other members to form a team around an idea.</p>
          <p><a class="btn btn-default" href="#" role="button">View more &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>People</h2>
          <p>See profiles for the other members of the InVerge community. Filter by skills they bring to the table and click on a profile to view their bio, skills, interests, ideas, and email contact.</p>
          <p><a class="btn btn-default" href="#" role="button">View more &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>teams</h2>
          <p>Contact other members to form teams around an idea. Multiple teams can form around one idea - creativity and execution are what set your team apart!</p>
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