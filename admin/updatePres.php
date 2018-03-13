<?php session_start();
	require '../dbbRecup.php'; ?>
	<!DOCTYPE html>
		<html lang="fr">
			<head>
				<meta charset="utf-8">
				<meta name="author" content="LP IMApp">
				<title>Mathieu RUFINI - Login</title>
				<meta name="viewport" content="width=device-width initial-scale=1.0">
				<link rel="stylesheet" type="text/css" href="../web/css/style.css">
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
				<script src="web/javascript/headerMenu.js"></script>
			</head>	
			<body>
			<?php

	if(!isset($_SESSION['user']))
	{
		?>
		<body>
			<section id="presentation">
				<div>
					<h1>Accès Interdit</h1>
					<h2>Unauthorized access</h2>
				</div>
			</section>
		</body>
			
		<?php
	}
	else{
		
		?>
		<body>
			<header class="header_admin">
				<div>
					<p><a href="deconnexion.php">Deconnexion</a></p>
				</div>
			</header>
			<section class="backoffice">
				<div>
					<h1>Back dfh</h1>
					<div>
						<table>
							<?php $incrementPres=0; ?>
							<thead>
								<th>ID</th>
								<th>Nom</th>
								<th>Contenu</th>
								<th>ID Langue</th>
								<th>Langue</th>
								<th>Action</th>
							</thead>
							<?php foreach ($fullPres as $key => $value) : ?>
								
								<tbody>
									<th><textarea name="nom"></textarea><?php echo $value['id']; ?></th>
									<th><?php echo $value['nom']; ?></th>
									<th><?php echo $value['contenu']; ?></th>
									<th><?php echo $value['choix_langue']; ?></th>
									<th><?php echo $value['langue']; ?></th>
								</tbody>
								</div>
							<?php endforeach;?>
						</table>
					</div>
				</div>
			</section>
		</body>
	<?php
		}
	?>
	</body>
</html>
	