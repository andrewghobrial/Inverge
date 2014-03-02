<?php


include('dbconnect.php');


$idea_query = mysql_query("SELECT * FROM Ideas");

if(mysql_num_rows($idea_query)== 0){
	echo 'There are no ideas.';
}else {
  	while ($idea = mysql_fetch_array($idea_query)) {
  		echo "<h1>" . $idea{'title'} . "</h1>";
  		echo $idea{'description'};
  	}
 }


?>