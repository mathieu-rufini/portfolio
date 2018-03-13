<?php 
	session_start();
	require '../dbbRecup.php';
	$table = $_POST['table'];
	$nom = $_POST['nom'];
	$contenu = $_POST['contenu'];
	$taille = $_POST['id'];
	if ($table!= 'competence'){
		$choix_langue = $_POST['choix_langue'];
		$langue = $_POST['langue'];
	}


?>
	<!DOCTYPE html>
		<html lang="fr">
			<head>
				<meta charset="utf-8">
				<meta name="author" content="LP IMApp">
				<title>Mathieu RUFINI - Ajout</title>
				<meta name="viewport" content="width=device-width initial-scale=1.0">
				<link rel="stylesheet" type="text/css" href="../web/css/style.css">
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
				<script src="web/javascript/headerMenu.js"></script>
			</head>	
	<body>
		<section class="backoffice">
				<div>
					<?php if($table!='competence'){ ?>
						<form action="modifierEND.php" method="post" onsubmit="return confirm('Veuillez confirmez')">
							<div>
									<h2>Modification</h2>
								
								<p>Nom : <input type="text" name="nom" value="<?= $nom;?>"></p>
								<p>Contenu : <input type="text" name="contenu" value="<?= $contenu ?>"></p>
								<p>ID de la langue : <input type="text" name="choix_langue" value="<?= $choix_langue ?>"></p>
								<p>Langue : <input type="text" name="langue" value="<?= $langue ?>"></p>
							</div>
							<input type="hidden" name="taille" value='<?php echo $taille;?>'>
							<input type="hidden" name="table" value='<?php echo $table;?>'>
							<input type="submit" name="ajout" value="Modifier">
						</form>
					<?php }else{ ?>
						<form action="modifierEND.php" method="post" onsubmit="return confirm('Veuillez confirmez')">
							<div>
									<h2>Modification</h2>
								
								<p>Nom : <input type="text" name="nom" value="<?= $nom;?>"></p>
								<p>Contenu : <input type="text" name="contenu" value="<?= $contenu ?>"></p>
								
							</div>
							<input type="hidden" name="taille" value='<?php echo $taille;?>'>
							<input type="hidden" name="table" value='<?php echo $table;?>'>
							<input type="submit" name="ajout" value="Modifier">
						</form>
					<?php } ?>
				</div>
			</section>
	</body>
</html>