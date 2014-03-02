<?php

require('person_functions.php');

function link_to_idea($id, $title){
	return '<a href="idea_profile.php?id=' . $id . '">' . $title . '</a>';

}

function get_person_name($id){
	$query = mysql_query("SELECT * FROM Persons WHERE id =" . $id);

	if(mysql_num_rows($query)==0){
		echo "error2";
	}else {
		while ($category = mysql_fetch_array($query)) {
			return $category{'fname'} . " " . $category{'lname'} ;
		}
	}

}

function link_to_person($id, $name){
	return '<a href="person_profile.php?id=' . $id . '">' . $name . '</a>';
}

function link_category($parent, $id){
	return "<a href='" . $parent . "?category=" . $id . "'>" . category_name($id) . "</a>";

}
function category_name($id){

	$query = mysql_query("SELECT * FROM AnIdeaCategory WHERE id =" . $id);

	if(mysql_num_rows($query)==0){
		echo "error";
	}else {
		while ($category = mysql_fetch_array($query)) {
			return $category{'title'};
		}
	}

}
function skill_name($id){

	$query = mysql_query("SELECT * FROM Skills WHERE id =" . $id);

	if(mysql_num_rows($query)==0){
		echo "error";
	}else {
		while ($category = mysql_fetch_array($query)) {
			return $category{'title'};
		}
	}

}

function list_categories($parent){
	$query = mysql_query("SELECT * FROM AnIdeaCategory");

	if(mysql_num_rows($query)==0){
		echo "error";
	}else {
		$list = "<ul>";
		while ($category = mysql_fetch_array($query)) {
			$list .= "<li><a href='" . $parent . "?category=" . $category{'id'} . "'>";
			$list .= $category{'title'};
			$list .= "</a></li>";
		}
		$list .= "
		<li>
			<a href='" . $parent . "?category=all'>View All</a>
		</li>
		</ul>";
	}
	return $list;
}


function list_skills($parent,$category_id){
	$query = mysql_query("SELECT * FROM Skills WHERE category =" . $category_id);

	if(mysql_num_rows($query)==0){
		echo "error1";
	}else {
		$list = "<ul>";
		while ($category = mysql_fetch_array($query)) {
			$list .= "<li><a href='" . $parent . "?skill=" . $category{'id'} . "'>";
			$list .= $category{'title'};
			$list .= "</a></li>";
		}
		$list .= "
		</ul>";
	}
	return $list;
}
function list_skills_checkbox($parent,$category_id){
	$query = mysql_query("SELECT * FROM Skills WHERE category =" . $category_id);

	if(mysql_num_rows($query)==0){
		echo "error1";
	}else {
		$list = "<ul>";
		while ($category = mysql_fetch_array($query)) {
			$list .= "<input type=checkbox value=".$category{'title'}."."><a href='" . $parent . "?skill=" . $category{'id'} . "'>";
			$list .= $category{'title'};
			$list .= "</a></li>";
		}
		$list .= "
		</ul>";
	}
	return $list;
}

function list_skills_category($parent){
	$query = mysql_query("SELECT * FROM Skill_Category");

	if(mysql_num_rows($query)==0){
		echo "error";
	}else {
		$list = "<ul style='list-style-type: none;padding:0px;margin:0px;'>";
		while ($category = mysql_fetch_array($query)) {
			$list .= "<li>";
			$list .= $category{'title'};
			$list .= list_skills( $parent, $category{'id'});
			$list .="</li>";
		}
		$list .= "
		<li>
			<a href='" . $parent . "?skill=all'>View All</a>
		</li>
		
		</ul>";
	}
	return $list;
}


function check_categories(){
	$query = mysql_query("SELECT * FROM AnIdeaCategory");
	
	$list = "";

	if(mysql_num_rows($query) == 0){
		return "error";
	}else {
		while ($category = mysql_fetch_array($query)) {
			$list .= '<input type="checkbox"  name="interests[]" value="' . $category{'id'} . '">  ' . $category{'title'} . '<br>';
		}
	}
	return $list;

}


function my_interested_ppl($ideaid){

	$team_query = mysql_query("SELECT * FROM Interest WHERE idea_id =" . $ideaid);

	if(mysql_num_rows($team_query)==0){
		echo 'This idea has no interest.';
	}else {

	  	while ($teams = mysql_fetch_array($team_query)) {

	  		//list interested ppl
			$person_query = mysql_query("SELECT * FROM Persons WHERE id =" . $teams{'person_id'});
			while ($person = mysql_fetch_array($person_query)) {
				$name = $person{'fname'} . ' ' . $person{'lname'} . "<br />";
				echo link_to_person($person{'id'},$name);
			}
			
	  	}
	}
}



?>