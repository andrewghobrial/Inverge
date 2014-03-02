<?php 
require_once('authenticate.php');
require('dbconnect.php');
require('includes.php');


$persons_query = mysql_query("SELECT * FROM Persons");



if(!isset($_REQUEST['skill'])){
  $persons_query = mysql_query("SELECT * FROM Persons");
  $all = true;
}else {
  if($_REQUEST['skill'] == 'all'){
  $persons_query = mysql_query("SELECT * FROM Persons");
    $all = true;
  }else {
    $persons_query = mysql_query("SELECT Person_Skill.skill_id, Persons.id, Persons.fname, Persons.lname, Persons.description FROM Persons, Person_Skill  WHERE Persons.id=Person_Skill.person_id AND skill_id = " .$_REQUEST["skill"]);
    $all = false;
  }
}
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
                <?php 
        if($all == false)
        	$category_crumb = " > " . skill_name($_REQUEST['skill']);	
        else 
       	 $category_crumb = "";
       	
       	?>
         <a href="people.php">List of people</a><?php echo $category_crumb; ?>
         
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->

      <div class="row">
        <div class="col-3 col-sm-3 col-lg-2" >
        <h2>Skills</h2>
        <p>
        
          <?php echo list_skills('people.php'); ?>
        </p>
      </div>
            <div class="col-9 col-sm-9 col-lg-10">
				<h2><?php
				if($all)
					echo 'Displaying all people';
				else
					echo 'Displaying all people with skill:  ' . skill_name($_REQUEST['skill']);
				?></h2>

            <?php
            if(mysql_num_rows($persons_query)== 0){
                  echo 'There are no people.';
                }else {
                    while ($person = mysql_fetch_array($persons_query)) {
                      print "<div class=\"col-6 col-sm-6 col-lg-4\">";
                      $name = $person{'fname'} . ' ' . $person{'lname'};
                      echo "<h2>". link_to_person($person{'id'},$name) . "</h2>";
                      echo "<p>".$person{'description'};
                      echo "<br /><b>Skills: </b><br />"; 
                      my_skills($person{'id'});
                      echo "</p>";
                      print "</div>";
                    }
                 }
            ?>
          </div>
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