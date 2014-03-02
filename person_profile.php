<?php
	
	
	if(isset($_REQUEST["id"])){
		$personid = $_REQUEST["id"];
	}else {
		$personid = 1;
	}
	include('dbconnect.php');
	include('person_functions.php');

	$person_query = mysql_query("SELECT * FROM Persons WHERE id =" . $personid);


	if(mysql_num_rows($person_query)==0){
		echo 'This user does not exist.';
	}else {

	  	while ($person = mysql_fetch_array($person_query)) {

			echo "<h1>" . $person{'fname'} . " " . $person{"lname"} . "</h1>";

			echo "<h3>blurb:</h3>";

			echo $person{'blurb'};


			///Listing all ideas related to this person
			my_ideas($personid);

			///Listing all teams related to this person
			my_teams($personid);


			///Listing all ideas i am interested in 
			my_interests($personid);


			///Listing all skills related to this person
			my_skills($personid);
		}


	}
?>
