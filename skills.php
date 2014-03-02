<?php
require_once('dbconnect.php');
require_once('authenticate.php');
require_once('includes.php');
$query = mysql_query("SELECT * FROM Skill_Category");

	if(mysql_num_rows($query)==0){
		echo "error";
	}else {
		$list = "<ul style='list-style-type: none;padding:0px;margin:0px;'>";
		while ($category = mysql_fetch_array($query)) {
			$list .= "<li>";
			$list .= $category{'title'};
			$list .= list_skills_checkbox( $parent, $category{'id'});
			$list .="</li>";
		}
		$list .= "
		<li>
			<a href='" . $parent . "?skill=all'>View All</a>
		</li>
		
		</ul>";
	}
	print_r($list);
?>