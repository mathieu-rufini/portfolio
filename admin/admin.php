<?php session_start();
	require '../dbbRecup.php';
	if (isset($_POST['modifierPres'])) {
		modifBDD($table, $increment);
	}
	
	 ?>
	<!DOCTYPE html>
		<html lang="fr">
			<head>
				<meta charset="utf-8">
				<meta name="author" content="LP IMApp">
				<title>Mathieu RUFINI - Admin</title>
				<meta name="viewport" content="width=device-width initial-scale=1.0">
				<link rel="stylesheet" type="text/css" href="../web/css/style.css">
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
				<script src="web/javascript/headerMenu.js"></script>
			</head>	
			
			<?php


	// Si l'utilisateur essaye d'accéder à la page sans s'être connecter
	if(!isset($_SESSION['user']))
	{
		?>
		<body>
			<section id="presentation">
				<div>
					<h1>Accès Interdit</h1>
					<h2>Forbidden access</h2>
				</div>
			</section>
		</body>
			
		<?php
	
	// Si l'utilisateur essaye d'accéder à la page après s'être connecter
	}
	else{				
		?>
		<body>
			<header class="header_admin">
				<div>
					<p><a href="deconnexion.php">Deconnexion</a></p>
				</div>
			</header>
			
			<!-- PRESENTATION -->
			<section class="backoffice">
				<div>
					<div>
							
								<table>
									<?php $increment=0; ?>
									<thead>
										<tr>
											<th>ID</th>
											<th>Nom</th>
											<th>Contenu</th>
											<th>ID Langue</th>
											<th>Langue</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<?php foreach ($fullPres as $key => $value) :
										$increment = $increment+1;
										$id = "id" . $increment;
										$name = "name" . $increment;
										$content = "contenu" . $increment;
										$id_langue = "id_langue" . $increment;
										$langue = "langue" . $increment;
										$test ="id";
										$table = "pres";
										
										?>
										<tbody>
											<tr>
												<th>
													<?php echo trier($table, $increment, 'id'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'nom'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'contenu'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'choix_langue'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'langue'); ?>
												</th>
												<th>
													<form action="supprimer.php" method="post">
														<input type="hidden" name="table" value="<?php echo $table; ?>">
														<button type="submit" name="id" 
														value="<?php echo $increment;?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
													</form>
												</th>
												<th>
													<form action="modifier.php" method="post">
														<input type="hidden" name="table" value="<?php echo $table; ?>">
														<input type="hidden" name="nom" value="<?php echo trier($table, $increment, 'nom'); ?>">
														<input type="hidden" name="contenu" value="<?php echo trier($table, $increment, 'contenu'); ?>">
														<input type="hidden" name="choix_langue" value="<?php echo trier($table, $increment, 'choix_langue'); ?>">
														<input type="hidden" name="langue" value="<?php echo trier($table, $increment, 'langue'); ?>">
														
														<button type="submit" name="id" 
														value="<?php echo $increment;?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
													</form>
												</th>
											</tr>
										</tbody>
									<?php endforeach;?>
								</table>

							
						
						<form action="ajouterPres.php" method="post">
							<input type="hidden" name="taille" value= '<?php echo $increment;?>'>
							<input type="hidden" name="table" value='<?php echo $table;?>'>

							<button type="submit" name="ajouterPres" value="Ajouter">Ajouter</button>
						</form>

					</div>
					
				</div>
			</section>


			<!-- FORMATION -->
			<section class="backoffice">
				<div>
					<div>
							
								<table>
									<?php $increment=0; ?>
									<thead>
										<tr>
											<th>ID</th>
											<th>Nom</th>
											<th>Contenu</th>
											<th>ID Langue</th>
											<th>Langue</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<?php foreach ($fullFormation as $key => $value) :
										$increment = $increment+1;
										$id = "id" . $increment;
										$name = "name" . $increment;
										$content = "contenu" . $increment;
										$id_langue = "id_langue" . $increment;
										$langue = "langue" . $increment;
										$test ="id";
										$table = "formation";
										
										?>
										<tbody>
											<tr>
												<th>
													<?php echo trier($table, $increment, 'id'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'nom'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'contenu'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'choix_langue'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'langue'); ?>
												</th>
												<th>
													<form action="supprimer.php" method="post">
														<input type="hidden" name="table" value="<?php echo $table; ?>">
														<button type="submit" name="id" 
														value="<?php echo $increment;?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
													</form>
												</th>
												<th>
													<form action="modifier.php" method="post">
														<input type="hidden" name="table" value="<?php echo $table; ?>">
														<input type="hidden" name="nom" value="<?php echo trier($table, $increment, 'nom'); ?>">
														<input type="hidden" name="contenu" value="<?php echo trier($table, $increment, 'contenu'); ?>">
														<input type="hidden" name="choix_langue" value="<?php echo trier($table, $increment, 'choix_langue'); ?>">
														<input type="hidden" name="langue" value="<?php echo trier($table, $increment, 'langue'); ?>">
														
														<button type="submit" name="id" 
														value="<?php echo $increment;?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
													</form>
												</th>
											</tr>
										</tbody>
									<?php endforeach;?>
								</table>
						
						<form action="ajouterPres.php" method="post">
							<input type="hidden" name="table" value='<?php echo $table;?>'>
							<input type="hidden" name="taille" value= '<?php echo $increment;?>'>
							<button type="submit" name="ajouterPres" value="Ajouter">Ajouter</button>
						</form>

					</div>
					
				</div>
			</section>
			

			<!-- EXP PRO -->
			<section class="backoffice">
				<div>
					<div>
							
								<table>
									<?php $increment=0; ?>
									<thead>
										<tr>
											<th>ID</th>
											<th>Nom</th>
											<th>Contenu</th>
											<th>ID Langue</th>
											<th>Langue</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<?php foreach ($fullExp as $key => $value) :
										$increment = $increment+1;
										$id = "id" . $increment;
										$name = "name" . $increment;
										$content = "contenu" . $increment;
										$id_langue = "id_langue" . $increment;
										$langue = "langue" . $increment;
										$test ="id";
										$table = "exppro";
										
										?>
										<tbody>
											<tr>
												<th>
													<?php echo trier($table, $increment, 'id'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'nom'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'contenu'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'choix_langue'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'langue'); ?>
												</th>
												<th>
													<form action="supprimer.php" method="post">
														<input type="hidden" name="table" value="<?php echo $table; ?>">
														<button type="submit" name="id" 
														value="<?php echo $increment;?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
													</form>
												</th>
												<th>
													<form action="modifier.php" method="post">
														<input type="hidden" name="table" value="<?php echo $table; ?>">
														<input type="hidden" name="nom" value="<?php echo trier($table, $increment, 'nom'); ?>">
														<input type="hidden" name="contenu" value="<?php echo trier($table, $increment, 'contenu'); ?>">
														<input type="hidden" name="choix_langue" value="<?php echo trier($table, $increment, 'choix_langue'); ?>">
														<input type="hidden" name="langue" value="<?php echo trier($table, $increment, 'langue'); ?>">
														
														<button type="submit" name="id" 
														value="<?php echo $increment;?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
													</form>
												</th>
											</tr>
										</tbody>
									<?php endforeach;?>
								</table>

						
						<form action="ajouterPres.php" method="post">
							<input type="hidden" name="taille" value= '<?php echo $increment;?>'>
							<input type="hidden" name="table" value='<?php echo $table;?>'>
							<button type="submit" name="ajouterPres" value="Ajouter">Ajouter</button>
						</form>

					</div>
					
				</div>
			</section>



			<!-- COMPETENCE -->
			<section class="backoffice">
				<div>
					<div>
							
								<table>
									<?php $increment=0; ?>
									<thead>
										<tr>
											<th>ID</th>
											<th>Nom</th>
											<th>Contenu</th>
											<th></th>
											<th></th>
											
										</tr>
									</thead>
									<?php foreach ($fullCompetence as $key => $value) :
										$increment = $increment+1;
										$id = "id" . $increment;
										$name = "name" . $increment;
										$content = "contenu" . $increment;
										$id_langue = "id_langue" . $increment;
										$langue = "langue" . $increment;
										$test ="id";
										$table = "competence";
										
										?>
										<tbody>
											<tr>
												<th>
													<?php echo trier($table, $increment, 'id'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'nom'); ?>
												</th>
												<th>
													<?php echo trier($table, $increment, 'contenu'); ?>
												</th>
												
												<th>
													<form action="supprimer.php" method="post">
														<input type="hidden" name="table" value="<?php echo $table; ?>">
														<button type="submit" name="id" 
														value="<?php echo $increment;?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
													</form>
												</th>
												<th>
													<form action="modifier.php" method="post">
														<input type="hidden" name="table" value="<?php echo $table; ?>">
														<input type="hidden" name="nom" value="<?php echo trier($table, $increment, 'nom'); ?>">
														<input type="hidden" name="contenu" value="<?php echo trier($table, $increment, 'contenu'); ?>">
														
														
														<button type="submit" name="id" 
														value="<?php echo $increment;?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
													</form>
												</th>
											</tr>
										</tbody>
									<?php endforeach;?>
								</table>


						<form action="ajouterPres.php" method="post">
							<input type="hidden" name="table" value='<?php echo $table;?>'>
							<input type="hidden" name="taille" value= '<?php echo $increment;?>'>
							<button type="submit" name="ajouterPres" value="Ajouter">Ajouter</button>
						</form>

					</div>
					
				</div>
			</section>
	<?php
		}
	?>
	</body>
</html>
	