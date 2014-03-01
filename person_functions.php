<?php

include('dbconnect.php');

function my_ideas($personid){

	///Listing all ideas related to this person
	$ideas_query = mysql_query("SELECT * FROM Person_Idea WHERE person_id =" . $personid . " AND owner=\"true\"");
	echo "<h3>ideas that i own</h3>";

	$no_ideas = 0;
	while ($ideas = mysql_fetch_array($ideas_query)) {
		$no_ideas++;
		$each_idea = mysql_query("SELECT * FROM Ideas WHERE id =" . $ideas{'idea_id'});
		while ($idea = mysql_fetch_array($each_idea)) {
			echo "title: " .$idea{'title'} . "<br />";

		}
	}
	if($no_ideas == 0)
		echo "this person has no ideas : (";
}

function my_teams($personid){

	$ideas_query = mysql_query("SELECT * FROM Person_Idea WHERE person_id =" . $personid . " AND role=\"member\"");
	echo "<h3>teams i am on</h3>";

	if(mysql_num_rows($ideas_query)==0){
		echo "this person has no teams : (";
	}else {
		while ($ideas = mysql_fetch_array($ideas_query)) {
			$no_ideas++;

			$each_team = mysql_query("SELECT * FROM Teams WHERE team_id =" . $ideas{'team_id'});
			while ($team = mysql_fetch_array($each_team)) {
				echo "team: " .$team{'name'} . "<br />";
			}

			$each_idea = mysql_query("SELECT * FROM Ideas WHERE id =" . $ideas{'idea_id'});
			while ($idea = mysql_fetch_array($each_idea)) {
				echo "for idea: " .$idea{'title'} . "<br />";
			}
		}
	}
}


function my_interests($personid){

	$ideas_query = mysql_query("SELECT * FROM Person_Idea WHERE person_id =" . $personid . " AND role=\"interested\"");
	echo "<h3>ideas i am interested in</h3>";

	$no_ideas = 0;
	while ($ideas = mysql_fetch_array($ideas_query)) {
		$no_ideas++;
		$each_idea = mysql_query("SELECT * FROM Ideas WHERE id =" . $ideas{'idea_id'});
		while ($idea = mysql_fetch_array($each_idea)) {
			echo "title: " .$idea{'title'} . "<br />";

		}
	}
	if($no_ideas == 0)
		echo "this person isn't interested in any ideas : (";


}

function my_skills($personid){
	$skills_query = mysql_query("SELECT * FROM Person_Skill WHERE person_id =" . $personid);
	echo "<h3>" . skills . "</h3>";

	$no_skills = 0;
	while ($skills = mysql_fetch_array($skills_query)) {
		$no_skills++;
		$each_skill = mysql_query("SELECT * FROM Skills WHERE id =" . $skills{'skill_id'});
		while ($skill = mysql_fetch_array($each_skill)) {

			$skill_category = mysql_query("SELECT * FROM Skill_Category WHERE id =" . $skill{'category'});
			$skill_cat = mysql_fetch_assoc($skill_category);
			echo "skill: " .$skill{'title'} . "(" . $skill_cat{'title'} . ") <br />";

		}
	}
	if($no_skills == 0)
		echo "this person has no skills : (";

}

?>