<?php
setcookie ("session_id", "", time() - 3600 ,'/', 'inverge.net',false);
setcookie ("PHPSESSID", "", time() - 3600 ,'/', 'inverge.net',false);
header("Location: /Inverge/index.php");
?>