<?php
	
	
	if(isset($_REQUEST["id"])){
		$personid = $_REQUEST["id"];
	}else {
		$personid = 1;
	}
	require('dbconnect.php');
	require('person_functions.php');


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
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">

        <h1>IMG</h1>
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
      	<?php

      	$person_query = mysql_query("SELECT * FROM Persons WHERE id =" . $personid);

		if(mysql_num_rows($person_query)==0){
			echo 'This user does not exist.';
		}else {

		  	while ($person = mysql_fetch_array($person_query)) {

				echo "<h1>" . $person{'fname'} . " " . $person{"lname"} . "</h1>";

				echo '<div class="col-6 col-sm-6 col-lg-4">
              		<h2>Experience</h2>
              		<p>' . $person{'description'} . '</p>
            		</div><!--/span-->';

				///Listing all ideas related to this person
            	echo '<div class="col-6 col-sm-6 col-lg-4">
              <h2>Teams</h2>
              <p>';
              my_teams($personid);
              echo '</p>
            </div><!--/span-->';

				///Listing all teams related to this person
                 echo '<div class="col-6 col-sm-6 col-lg-4">
              <h2>Skills</h2>
              <p>';
               my_skills($personid);
              echo '</p> </div><!--/span-->';


              echo '            
             <div class="col-6 col-sm-6 col-lg-4">
              <h2>My Ideas</h2>
              <p>';
				my_ideas($personid);
              echo '</p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Interests</h2>
              <p>';
				ECHO "WHOOPS I WAS SUPPOSED TO DO THIS";
              echo '</p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Ideas that interest me</h2>
              <p>';
				my_interests($personid);
              echo '</p>
            </div><!--/span-->';

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

