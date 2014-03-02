<?php


require('dbconnect.php');
require('includes.php');

$persons_query = mysql_query("SELECT * FROM Persons");

if(mysql_num_rows($persons_query)== 0){
	echo 'There are no ideas.';
}else {
  	while ($person = mysql_fetch_array($persons_query)) {
  		$name = $person{'fname'} . ' ' . $person{'lname'};
  		echo "<h1>". link_to_person($person{'id'},$name) . "</h1>";
  		echo $person{'description'};
  	}
 }


?>