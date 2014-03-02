<?php


require_once('authenticate.php');
require('dbconnect.php');
require('includes.php');

$current_user_id = $_SESSION['id'];

$title_err = '';
$description_err = '';
$formOk = false;


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
        <a href="list_ideas.php">List of ideas</a> > Add Idea
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
            	<?php

if(isset($_REQUEST['title']) ){
	if($_REQUEST['title'] == null){
		$error = true;
		$title_err = "<span style='color: red;'>Title cannot be blank.</span>";
		$formOk = false;
	}
	if($_REQUEST['description'] == null){
		$description_err = "<span style='color: red;'>Description cannot be blank.</span>";
		$formOk = false;
	}
	if($_REQUEST['title'] != null && $_REQUEST['description'] != null){
		$formOk = true;
		$query = 'INSERT INTO Ideas (title,description,owner_id, img_url)
			VALUES ("' . mysql_real_escape_string($_REQUEST['title']) . 
				'","'. mysql_real_escape_string($_REQUEST['description']) . '","' . $current_user_id . '","'. $_REQUEST['image'] . '");';
		$result = mysql_query($query);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else {

			$idea_id = mysql_insert_id();
			$interests = $_REQUEST['interests'];
			  if(empty($interests))
			  {
			  }
			  else
			  {
			    $N = count($interests);
			    for($i=0; $i < $N; $i++)
			    {
			    	$query_cat = 'INSERT INTO Idea_Category (idea_id,category_id) VALUES ("' . $idea_id . '","' . $interests[$i] . '")';
					$result = mysql_query($query_cat);
					if (!$result) {
					    die('Invalid query: ' . mysql_error());
					}else {
					}

			    }
			  }

		}
		echo 'Idea creation was a success! <br /><br /><button  style="width:150px;" class="btn btn-lg btn-primary btn-block" onClick="window.location.href=\'idea_profile.php?id=' . $idea_id . '\'">View Entry</button>';



	}

}

if($formOk == false){
	if($title_err != '' || $description_err != ''){
		echo "<span style='color: red;'>Please see below errors in form.</span><br /><br />";
	}
	echo '
	<form name="input" action="add_idea.php" method="post">
	<b>Title:</b> <input type="title" class="form-control" name="title">' . $title_err . '<br>
	<b>Image URL (optional):</b> <input type="title" class="form-control" name="image">'. '<br>
	<b>Description:</b> <br />
	<textarea rows="4" cols="50" class="form-control" name="description"></textarea>
	<br />

	' . $description_err . '<br /><b>Select categories to which this idea might belong:</b><br /><br />';

	echo check_categories();

	echo '
       <br /><br /> <button  style="width:150px;"  class="btn btn-lg btn-primary btn-block" type="submit">Submit!</button>

	</form>';
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