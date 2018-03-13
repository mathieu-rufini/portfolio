<?php session_start();
	require '../dbbRecup.php'; ?>
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
					<?php
						$taille = $_POST['taille'];
						$table = $_POST['table'];
						if ($table != 'competence'){
					?>
					<form action="ajouter.php" method="post">
						<div>

							<p>
								Partie Française
							</p>
							<input type="text" name="nomFR" value="Nom">
							<input type="text" name="contenuFR" value="Contenu">
						</div>
						<div>
							<p>
								Partie Anglaise
							</p>
							<input type="text" name="nomEN" value="Name">
							<input type="text" name="contenuEN" value="Content">
						</div>
						<input type="hidden" name="taille" value='<?php echo $_POST['taille'];?>'>
						<input type="hidden" name="table" value='<?php echo $_POST['table'];?>'>
						<input type="submit" name="ajout" value="Ajouter">
					</form>


				<?php }else{?>
					<form action="ajouter.php" method="post">
						<div>

							<p>
								Competences
							</p>
							<input type="text" name="nomFR" value="Nom">
							<input type="text" name="contenuFR" value="Contenu">
						</div>
						<input type="hidden" name="nomEN" value="none">
						<input type="hidden" name="contenuEN" value="none">
						<input type="hidden" name="taille" value='<?php echo $_POST['taille'];?>'>
						<input type="hidden" name="table" value='<?php echo $_POST['table'];?>'>
						<input type="submit" name="ajout" value="Ajouter">
					</form>
				<?php } ?>
				</div>
			</section>
	</body>
</html>