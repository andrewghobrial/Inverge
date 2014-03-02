<?php

$username = "invergeuser";
$password = "abcd1234";
$hostname = "invergeinstance.cwy4vi0q7lmp.us-east-1.rds.amazonaws.com"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

//select a database to work with
$selected = mysql_select_db("invergedb",$dbhandle) 
  or die("Could not select invergedb");

?>