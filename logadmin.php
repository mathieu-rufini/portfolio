<?php session_start();
	require 'dbbRecup.php';	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="LP IMApp">
		<title>Mathieu RUFINI - Login</title>
		<meta name="viewport" content="width=device-width initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="web/css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
		<script src="web/javascript/headerMenu.js"></script>
	</head>
	
	<body>
		<section class="login">
			<div>
				<h1>Connexion</h1>
			</div>
			<form  method="post">
				<input type="text" name="login" placeholder="Identifiant">
				<input type="password" name="mdp" placeholder="Mot de passe">
				<input type="submit" value="Connexion">
			</form>
			<?php 
				if(!isset($_POST['login'])){
					$login = null;
				}else{
					$login = $_POST['login'];
				}
				if(!isset($_POST['mdp'])){
					$password = null;
				}
				else{
					$password = $_POST['mdp'];
				}

				if(!empty($_POST)){		
					$connect = connexion($login, $password);
					if ($connect) {
						$_SESSION['login'] = $_POST['login'];
						header("Location:admin/admin.php");
						exit;
					}else{
						$type_erreur =0;
						if ($login != null) {
							$type_erreur++;
						}
						if ($password != null) {
							$type_erreur = $type_erreur+2;
						}

						switch ($type_erreur) {
							case 1:
								echo '<p>Erreur : Saisissez un mot de passe</p>';
								break;
							case 2:
								echo '<p>Erreur : Saisissez un identifiant</p>';
								break;
							case 3:
								echo '<p>Erreur : Identifiant ou mot de passe incorrect</p>';
								break;
						}
					}
				}
			?>

		</section>
		
	</body>
</html>