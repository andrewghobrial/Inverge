<?php
require('dbconnect.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$customer_update = mysql_query("INSERT INTO Persons (fname,lname,description,username,password) VALUES ('".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['description']."','".$_REQUEST['username']."','".$_REQUEST['password']."')");
header('Location: http://ec2-54-234-238-138.compute-1.amazonaws.com/Inverge/profile.html');

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inverge - Sign up!</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
  </head>
  <body>
    <div class="container">

      <form class="form-signin" role="form" action="signup.php" method="post">
        <h2 class="form-signin-heading">Sign up</h2>

        <input type="name" class="form-control" name="fname" placeholder="First Name" required autofocus>
        <input type="name" class="form-control" name="lname" placeholder="Last Name" required autofocus>
        <input type="description" class="form-control" name="description" placeholder="Background" required autofocus>
        <input type="email" class="form-control" name="username" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit!</button>
      </form>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>