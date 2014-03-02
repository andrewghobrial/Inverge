<?php


require('dbconnect.php');
require('includes.php');

if(!isset($_REQUEST['category'])){
	$idea_query = mysql_query("SELECT * FROM Ideas");
	$all = true;
}else {
	if($_REQUEST['category'] == 'all'){
		$idea_query = mysql_query("SELECT * FROM Ideas");
		$all = true;
	}else {
		$idea_query = mysql_query("SELECT Idea_Category.category_id, Ideas.id, Ideas.title, Ideas.owner_id, Ideas.description FROM Ideas, Idea_Category  WHERE Ideas.id=Idea_Category.idea_id AND category_id = " .$_REQUEST["category"]);
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
    <title>Inverge - Ideas</title>
    <style type ='text/css'>
	.mason-parent {
    -moz-column-count: 3;
    -moz-column-gap: 10px;
    -webkit-column-count: 3;
    -webkit-column-gap: 10px;
    column-count: 3;
    column-gap: 10px;
    }

    .mason-child{
        display: inline-block; /* Display inline-block, and absolutely NO FLOATS! */
        margin-bottom: 20px;
        width: 100%;
        border: 2px solid gray; 
        padding: 10px;
    }

                </style>
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

        <h1>Ideas</h1>
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
            <div class="col-4 col-sm-4 col-lg-2" style = "float: left;">
              <h2>Categories</h2>
              <p>
              	<?php echo list_categories('list_ideas.php'); ?>
              </p>
            </div><!--/span-->
			<div class="col-8 col-sm-8 col-lg-10">
				<h2><?php
				if($all)
					echo 'Displaying all ideas';
				else
					echo 'Displaying all ideas in  ' . category_name($_REQUEST['category']) . ' category';
				?></h2>

				<div class='mason-parent'>

            <?php

			if(mysql_num_rows($idea_query)== 0){
				echo 'There are no ideas.';
			}else {
			  	while ($idea = mysql_fetch_array($idea_query)) {
		            echo
		            '
		               <div class="mason-child">

		                <h2>' . link_to_idea($idea{'id'},$idea{'title'}) .'</h2>
		                <p>
		                ' .
			  			 link_to_person($idea{'owner_id'},get_person_name($idea{'owner_id'}));
		                					echo "<br />category: ";
					$category_query = mysql_query("SELECT Idea_Category.category_id FROM Ideas, Idea_Category  WHERE Ideas.id=Idea_Category.idea_id AND Ideas.id =2");
					if(mysql_num_rows($category_query)==0){
						echo "no categories";
					}else {
						while ($category = mysql_fetch_array($category_query)) {
							echo link_category("list_ideas.php",$category{'category_id'}) . " ";
						}
					}
					echo "<br />";
			  		echo $idea{'description'};

		                echo '</p>
		                </div>';
		                



			  	}
			 }

			?>

				</div>


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