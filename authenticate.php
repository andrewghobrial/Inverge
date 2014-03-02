<?php
session_start();

if(!isset($_COOKIE['session_id'])||$_COOKIE['session_id']!=md5($_SESSION['username']." ".$_SERVER['REMOTE_ADDR']." ".$_SESSION['authsalt'])) {
	header("Location: /Inverge/index.php");
    exit();
	}

$global_current_user_id = $_SESSION['id'];

?>