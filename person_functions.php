<?php

require('dbconnect.php');


function my_ideas($personid){

	///Listing all ideas related to this person
	$ideas_query = mysql_query("SELECT * FROM Ideas WHERE owner_id =" . $personid);

	if(mysql_num_rows($ideas_query)==0){
		echo "This person has not yet added any ideas.";
	}else {
		while ($ideas = mysql_fetch_array($ideas_query)) {
			echo link_to_idea($ideas{'id'},$ideas{'title'}) . "<br />";

		}
	}
}

function my_teams($personid){

	$teams_query = mysql_query("SELECT * FROM Person_Team WHERE person_id =" . $personid);

	if(mysql_num_rows($teams_query)==0){
		echo "This person is not on any teams.";
	}else {
		while ($teams = mysql_fetch_array($teams_query)) {

			$each_team = mysql_query("SELECT * FROM Teams WHERE id =" . $teams{'team_id'});
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


function my_idea_interests($personid){
	$interest_query = mysql_query("SELECT * FROM Interest WHERE person_id =" . $personid);

	if(mysql_num_rows($interest_query)==0){
		echo "This person has not yet found interesting ideas.";
	}else {
		while ($ideas = mysql_fetch_array($interest_query)) {
			$interest = mysql_query("SELECT * FROM Ideas WHERE id =" . $ideas{'idea_id'});
			while ($idea = mysql_fetch_array($interest)) {
				echo link_to_idea($idea{'id'},$idea{'title'});
			}
		}
	}

}

function my_skills($personid){
	$skills_query = mysql_query("SELECT * FROM Person_Skill WHERE person_id =" . $personid);

	if(mysql_num_rows($skills_query)==0){
		echo "This person has no skills listed.";
	}else{
		while ($skills = mysql_fetch_array($skills_query)) {
			$each_skill = mysql_query("SELECT * FROM Skills WHERE id =" . $skills{'skill_id'});
			while ($skill = mysql_fetch_array($each_skill)) {
				$skill_category = mysql_query("SELECT * FROM Skill_Category WHERE id =" . $skill{'category'});
				$skill_cat = mysql_fetch_assoc($skill_category);
				echo "<a href='people.php?skill=" . $skill{'id'} . "'>" . $skill{'title'} . " (" . $skill_cat{'title'} . ")</a> <br />";

			}
		}
	}
}

function my_interests($personid){

	$skills_query = mysql_query("SELECT * FROM Person_to_Interest WHERE person_id =" . $personid);

	if(mysql_num_rows($skills_query)==0){
		echo "This person has no interests listed.";
	}else{
		while ($skills = mysql_fetch_array($skills_query)) {
			$each_skill = mysql_query("SELECT * FROM AnIdeaCategory WHERE id =" . $skills{'interest_id'});
			while ($skill = mysql_fetch_array($each_skill)) {
				$skill_category = mysql_query("SELECT * FROM Skill_Category WHERE id =" . $skill{'category'});
				$skill_cat = mysql_fetch_assoc($skill_category);
				echo "<a href='list_ideas.php?category=" . $skill{'id'}   . "'>" . $skill{'title'} . "</a><br />";

			}
		}
	}

}
?>