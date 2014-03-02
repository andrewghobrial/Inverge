<?php

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

	$query = mysql_query("SELECT * FROM Skill_Category WHERE id =" . $id);

	if(mysql_num_rows($query)==0){
		echo "error";
	}else {
		while ($category = mysql_fetch_array($query)) {
			return $category{'title'};
		}
	}

}

function list_categories($parent){
	$query = mysql_query("SELECT * FROM Skill_Category");

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
			<a href='" . $parent . "?category=all'>all</a>
		</li>
		</ul>";
	}
	return $list;

}




?>