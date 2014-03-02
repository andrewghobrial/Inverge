<?php
	
	require_once('authenticate.php');
	
	$personid = $global_current_user_id;
	require('dbconnect.php');
	require('includes.php');
	$updated = false;

	if(isset($_REQUEST['submit'])){
		$query = "UPDATE Persons
					SET fname='" . mysql_real_escape_string($_REQUEST['fname']) . "',lname='" . mysql_real_escape_string($_REQUEST['lname']) . "',username='" . mysql_real_escape_string($_REQUEST['username']). "',description='" . mysql_real_escape_string($_REQUEST['bio']) . 
					"' WHERE id=" . $personid;
		$result = mysql_query($query);
		if (!$result) {
		    die('Error! ' . mysql_error());
		}else {
			$updated = true;
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
    <link rel="stylesheet" type="text/css" href="css/signup.css">
  </head>
  <body>
    <?php 
    include('nav.php');
    ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">

        <h1>Edit Profile</h1>
         <a href="person_profile.php?id=<?php echo $global_current_user_id ?>">My Profile</a> > Edit Profile

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
		  		if($updated == true){
		  			echo "<span style='color:red;'>Your profile has been updated.</span>";
		  		}
				echo '	<form name="input" action="person_profile_edit.php" method="post">';
				echo "First Name: <input style=\"width:150px\" maxlength='30' name='fname' class=\"form-control\" type=text value=\"".$person{'fname'}."\" ></input>
				<br>" ."Last Name: <input style=\"width:150px\" maxlength='30' name='lname' class=\"form-control\" type=text value=\"". $person{"lname"} . "\"></input>
				<br>" ."E-mail Address: <input style=\"width:250px\" maxlength='100' name='username' class=\"form-control\" type=text value=\"" .$person{"username"} . "\"></input><br>" ;

				echo '
              		Bio: <input type=textarea  name="bio" style="width:350px" class="form-control" value="' . $person{'description'} . '"></input>
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
              <h2>Skills will go here</h2>';
              
              
              echo '<br /><br /> <button  style="width:150px;" name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Submit!</button>';
              
              echo '</div></form><!--/span-->';
			
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

