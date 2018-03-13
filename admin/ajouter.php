<?php 
	session_start();
	require '../dbbRecup.php';
	$table = $_POST['table'];
	$taille = $_POST['taille'];
	$nomFR = $_POST['nomFR'];
	$nomEN = $_POST['nomEN'];
	$contenuFR = $_POST['contenuFR'];
	$contenuEN = $_POST['contenuEN'];

// var_dump($table);
// var_dump($taille);
// var_dump($nomFR);
// var_dump($nomEN);
// var_dump($contenuFR);
// var_dump($contenuEN);
	if ($table != 'competence'){
		ajoutBDD($table, $taille, $nomFR, $nomEN, $contenuFR, $contenuEN);
	}else{
		ajoutCompetence($table, $taille, $nomFR, $contenuFR);
		
	}
	header("Location:admin.php");
	exit;
?>