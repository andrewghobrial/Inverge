<?php

if(isset($_REQUEST["id"])){
	$ideaid = $_REQUEST["id"];
}else {
	$ideaid = 1;
}
require('dbconnect.php');
require('idea_functions.php');
	
$idea_query = mysql_query("SELECT * FROM Ideas WHERE id =" . $ideaid);

	if(mysql_num_rows($idea_query)== 0){
		echo 'This idea does not exist.';
	}else {

	  	while ($idea = mysql_fetch_array($idea_query)) {

			echo "<h1>" . $idea{'title'} . "</h1>";
			echo "category: ";

			echo category_name($idea{'category_id'}) . "<br />";



			echo "<h3>idea owner:</h3>";
			$query = mysql_query("SELECT * FROM Persons WHERE id =" . $idea{'owner_id'});
			if(mysql_num_rows($query)==0){
				echo 'Cannot locate idea\'s owner.';
			}else {
		  		while ($ownerperson = mysql_fetch_array($query)) {
		  			$name = $ownerperson{'fname'} . " " . $ownerperson{'lname'};
					echo link_to_person($ownerperson{'id'}, $name);
		  		}
		  	}

			echo "<h3>blurb:</h3>";
			echo $idea{'description'};


			my_teams($ideaid);


	  	}

	}
?>