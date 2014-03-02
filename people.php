<?php 
require_once('authenticate.php');
require('dbconnect.php');
require('includes.php');
$persons_query = mysql_query("SELECT * FROM Persons");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inverge - People</title>

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

        <h1>People</h1>
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
            <?php
            if(mysql_num_rows($persons_query)== 0){
                  echo 'There are no ideas.';
                }else {
                    while ($person = mysql_fetch_array($persons_query)) {
                      print "<div class=\"col-6 col-sm-6 col-lg-4\">";
                      $name = $person{'fname'} . ' ' . $person{'lname'};
                      echo "<h2>". link_to_person($person{'id'},$name) . "</h2>";
                      echo "<p>".$person{'description'}."</p>";
                      print "</div>";
                    }
                 }
            ?>
  </div><!--/row-->

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