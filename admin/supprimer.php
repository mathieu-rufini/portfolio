<?php session_start();
	require '../dbbRecup.php'; 

	supprimerBDD($_POST['table'], $_POST['id']);
	var_dump($_POST['id']);
	var_dump($_POST['table']);
	header("Location:admin.php");
?>