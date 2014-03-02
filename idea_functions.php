<?php

include('dbconnect.php');


function my_teams($ideaid){

	echo "<h3>teams:</h3>";

	$team_query = mysql_query("SELECT * FROM Teams WHERE idea_id =" . $ideaid);

	if(mysql_num_rows($team_query)==0){
		echo 'This idea has no team.';
	}else {

	  	while ($teams = mysql_fetch_array($team_query)) {
	  		echo '<h3>name:' . $teams{'name'} . '</h3>';

	  		//list team members
	  		echo '<h3>members:</h3>';
	  		$team_query = mysql_query("SELECT * FROM Person_Team WHERE team_id =" . $teams{'id'});
  			if(mysql_num_rows($team_query)==0){
				echo 'This team has no members.';
			}else {
				while ($team_members = mysql_fetch_array($team_query)) {
		  			$person_query = mysql_query("SELECT * FROM Persons WHERE id =" . $team_members{'person_id'});
	  				while ($person = mysql_fetch_array($person_query)) {
	  					echo $person{'fname'} . ' ' . $person{'lname'};
	  				}
				}
			}

	  	}

	}


}

?>