<?php    
require_once('includes/header.php');

if (isset($_GET['action']) && $_GET['action'] == 'logout') {

	session_start();
	session_unset();
	session_destroy();
	header('Location: index.php');
}