<?php 
	session_start();
	if (!$_SESSION['isLoged']) header("Location:./index.php");
	date_default_timezone_set("America/Mexico_City");
	$mainURL = $_SERVER['DOCUMENT_ROOT'].'/reinamadre';
	require_once $mainURL.'/db/db.php';
?>