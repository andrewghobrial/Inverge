<?php


if(isset($_REQUEST["id"])){
	$ideaid = $_REQUEST["id"];
}else {
	$ideaid = 1;
}
require('dbconnect.php');
require('idea_functions.php');
	

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

        <h1>Idea</h1>
        <a href="list_ideas.php">List of ideas</a> > Idea Profile

        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
            	<?php


            	$idea_query = mysql_query("SELECT * FROM Ideas WHERE id =" . $ideaid);

				if(mysql_num_rows($idea_query)== 0){
					echo 'This idea does not exist.';
				}else {

				  	while ($idea = mysql_fetch_array($idea_query)) {

						echo "<h2>" . $idea{'title'} . "</h2>";
		                echo "Idea by: " . link_to_person($idea{'owner_id'},get_person_name($idea{'owner_id'}));

		                echo "<br />";
						$category_query = mysql_query("SELECT Idea_Category.category_id FROM Ideas, Idea_Category  WHERE Ideas.id=Idea_Category.idea_id AND Ideas.id =" . $idea{'id'});
						if(mysql_num_rows($category_query)==0){

						}else {
							echo "Categorized in: ";
							while ($category = mysql_fetch_array($category_query)) {
								echo link_category("list_ideas.php",$category{'category_id'}) . " ";
							}
						}

		                echo '</p>';

						echo "<h3>Description:</h3>";
						echo $idea{'description'};

						my_teams($ideaid);


				  	}

				}
            	?>
            </div><!--/span-->

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