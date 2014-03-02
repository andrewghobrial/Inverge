<?php
setcookie ("session_id", "", time() - 3600 ,'/', 'ec2-54-234-238-138.compute-1.amazonaws.com',false);
setcookie ("PHPSESSID", "", time() - 3600 ,'/', 'ec2-54-234-238-138.compute-1.amazonaws.com',false);
header("Location: /Inverge/index.php");
?>