<?php

require('dbconnect.php');
require('includes.php');

$current_user_id = 1;

$title_err = '';
$description_err = '';
$formOk = false;

if(isset($_REQUEST['title']) ){
	if($_REQUEST['title'] == null){
		$error = true;
		$title_err = "*";
		$formOk = false;
	}
	if($_REQUEST['description'] == null){
		$description_err = "*";
		$formOk = false;
	}
	if($_REQUEST['title'] != null && $_REQUEST['description'] != null){
		$formOk = true;
		$query = 'INSERT INTO Ideas (title,description,owner_id)
			VALUES ("' . mysql_real_escape_string($_REQUEST['title']) . 
				'","'. mysql_real_escape_string($_REQUEST['description']) . '","' . $current_user_id . '");';
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
						echo "success insert";
					}

			    }
			  }

		}



	}

}

if($formOk == false){
	if($title_err != '' || $description_err != ''){
		echo "please see below errors in form";
	}
	echo '
	<form name="input" action="add_idea.php" method="get">
	title: <input type="title" name="title">' . $title_err . '<br>
	description: <br />
	<textarea rows="4" cols="50" name="description"></textarea>
	<br />

	' . $description_err . '<br />';

	echo check_categories();

	echo '
	<input type="submit" value="Submit">

	</form>';
}

?>
