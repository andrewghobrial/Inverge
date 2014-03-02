<?php
session_start();
require('dbconnect.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$customer_update = mysql_query("SELECT * FROM Persons WHERE username='".$_REQUEST['username']."' AND password='".$_REQUEST['password']."'");
print "SELECT * FROM Persons WHERE username='".$_REQUEST['username']."' AND password='".$_REQUEST['password']."'";
print "<br>".mysql_num_rows($customer_update);
print "<br>".mysql_num_rows($customer_update)==1;
if(mysql_num_rows($customer_update)==1) {
  print "<br>LOGGED IN!";
  $auth_cookie_val = md5($_SESSION['username']." ".$_SERVER['REMOTE_ADDR']." ".$_SESSION['authsalt']);
    setcookie('session_id',$auth_cookie_val, 0, '/', 'ec2-54-234-238-138.compute-1.amazonaws.com',false);
}
  else print "<br>LOGIN FAILED!";
exit();
//header('Location: http://ec2-54-234-238-138.compute-1.amazonaws.com/Inverge/profile.html');

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
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Inverge</a>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" action="index.php" method="post">
            <div class="form-group">
              <input type="text" name="username" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">


        <h1> </h1>
        <h1> </h1>
        <img src="imgs/Logo.jpg">
        <p>Inverge offers a simple, yet effective, way for students to connect and brainstorm, collaborate and communicate, and share their visions. Inverge provides resources for students to innovate and succeed with their latest ventures!</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="signup.php">Sign Up &raquo;</a></p>
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