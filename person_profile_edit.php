<?php
	
	require_once('authenticate.php');
	
	if(isset($_REQUEST["id"])){
		$personid = $_REQUEST["id"];
	}else {
		$personid = 1;
	}
	require('dbconnect.php');
	require('includes.php');


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
    <link rel="stylesheet" type="text/css" href="css/signup.css">
  </head>
  <body>
    <?php 
    include('nav.php');
    ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">

        <h1>Person Profile</h1>
         <a href="people.php">List of people</a> > Person Profile

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

				echo "First Name: <input style=\"width:150px\" class=\"form-control\" type=text value=\"".$person{'fname'}."\" ></input>
				<br>" ."Last Name: <input style=\"width:150px\" class=\"form-control\" type=text value=\"". $person{"lname"} . "\"></input>
				<br>" ."E-mail Address: <input style=\"width:250px\" class=\"form-control\" type=text value=\"" .$person{"username"} . "\"></input><br>" ;

				echo '
              		Bio: <input type=textarea style="width:350px" class="form-control" value="' . $person{'description'} . '"></input>
            		';

				///Listing all ideas related to this person
            /*	echo '<div class="col-4 col-sm-4 col-lg-4">
              <h2>Teams</h2>
              <p>';
              my_teams($personid);
              echo '</p>
            </div><!--/span-->';
*/
				///Listing all teams related to this person
                 echo '<div class="col-6 col-sm-6 col-lg-6">
              <h2>Skills</h2>
              <input type=textarea style="width:350px" class="form-control" value="';
               my_skills($personid);
              echo '"></input> </div><!--/span-->';

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

