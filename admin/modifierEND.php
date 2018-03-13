<?php session_start();
	require '../dbbRecup.php';

	$nom = $_POST['nom'];
	$contenu = $_POST['contenu'];
	$taille = $_POST['taille'];
	$table = $_POST['table'];
	if($table != 'competence'){
		$choix_langue = $_POST['choix_langue'];
		$langue = $_POST['langue'];
		modifBDD($table, $taille, $nom, $contenu, $choix_langue, $langue);
	}else{
		modifCompetence($table, $taille, $nom, $contenu);
	}

	header("Location:admin.php");
	exit;
?>