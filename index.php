<?php session_start();
	require 'dbbRecup.php';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="LP IMApp">
		<title>Mathieu RUFINI - Site CV</title>
		<meta name="viewport" content="width=device-width initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="web/css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="web/javascript/headerMenu.js"></script>
		<script src="web/javascript/animated-scroll.js"></script>
	</head>
	
	<body>
		<header> <!-- Header -->
			<nav id="menu">
				<ul>
					<li><a id="menu1" href="#presentation" class="scrollTo">
						<?php echo recupTable('menu','nom','menu.nom',1,langue()); ?></a>
					</li>
					<li><a id="menu2" href="#exp" class="scrollTo">
						<?php echo recupTable('menu','nom','menu.nom',2,langue()); ?></a>
					</li>
					<li><a id="menu3" href="#skill" class="scrollTo">
						<?php echo recupTable('menu','nom','menu.nom',3,langue()); ?></a>
					</li>
					<li><a id="menu4" href="#portfolio" class="scrollTo">
						<?php echo recupTable('menu','nom','menu.nom',4,langue()); ?></a>
					</li>
					<li><a id="menu5" href="#loisir" class="scrollTo">
						<?php echo recupTable('menu','nom','menu.nom',5,langue()); ?></a>
					</li>
					<li><a id="menu6" href="#contact" class="scrollTo">
						<?php echo recupTable('menu','nom','menu.nom',6,langue()); ?></a>
					</li>
				</ul>
			</nav>
		</header>  


		<div class="langue">
				<a href="mailto:mathieu.rufini@gmail.com" class="mail_rapide"><i class="fa fa-envelope-o" aria-hidden="true"></i> mathieu.rufini@mail</a>
				<form method="post" >
					<button type="submit" name="langue" value="fr">Français </button><span> / </span>
					<button type="submit" name="langue" value="en">English</button>
				</form>
				 	 
		</div>
		<section id="accueil">
			<div>
				<h1>Mathieu <span>RUFINI</span></h1><br />
				<h2><?php echo recupTable('accueil','nom','accueil.nom',1,langue()); ?><span> 
					<?php echo recupTable('accueil','content','accueil.content',1,langue()); ?></span></h2>
			</div>
		</section>

		<a class="bouton_remonter" href="#accueil" >
			<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
		</a>

		<section id="presentation"> <!-- Présentation -->
			<div>
				<h3><?php echo recupTable('pres','nom','pres.nom',1,langue()); ?></h3>
				<div class="pres_gauche">
					<img src="web/css/image/profil.jpg" alt="Photo de Mathieu RUFINI">
					<p><?php echo recupTable('pres','contenu','pres.contenu',1,langue()); ?></p>
					
				</div>
				<div class="div_droite">
					<?php foreach ($allPres as $key => $value) : ?>
							<p><span><?php echo $value['nom']; ?></span> : 
							<?php echo $value['contenu']; ?> </p><br />
					 <?php endforeach;?>					
				</div>
			</div>
		</section>

	

		<section id="exp"> <!-- Expériences -->	
			<div>
				<h3><?php echo recupTable('formation','nom','formation.nom',1,langue()); ?></h3>
				<div>
					<?php foreach ($allFormation as $key => $value) : ?>
							<p><?php echo $value['nom']; ?></p>
							<p><?php echo $value['contenu']; ?> </p><br />
					 <?php endforeach;?>
				</div>
				<div class="div_droite">
					<?php foreach ($allExp as $key => $value) : ?>
							<p><?php echo $value['nom']; ?></p>
							<p><?php echo $value['contenu']; ?> </p><br />
							
					 <?php endforeach;?>
					
				</div>
			</div>
		</section>
	

		<section id="skill"> <!-- Compétences -->
			<div>
				<h3><?php echo recupTable('competence_type','nom','competence_type.nom',1,langue()); ?></h3>
				<div>
					
					<?php foreach ($allCompetence as $key => $value) : ?>
						<p><?php echo $value['nom']; ?></p>
						<div>
							<div class="progress_bar" style="width: <?php echo $value['contenu']; ?>%;">
								<span><?php echo $value['contenu']; ?>%</span>
							</div>
						</div><br />
					 <?php endforeach;?>
				</div>
			</div>
		</section>


		<section id="portfolio"> <!-- Portfolio -->
			<div>
				<h3><?php echo recupTable('portfolio','nom','portfolio.nom',1,langue()); ?></h3>
				<div class="container_portfolio">
					<div><a href="pages/Site_IMApp/Site_license_IMApp.html"><img src="pages/Site_IMApp/Logo_IMApp.png" alt="image projet 1"></a>
					</div>
					<div>
					</div>
					<div>
					</div>
				</div>
				<div class="container_portfolio">
					<div>
					</div>
					<div>
					</div>
					<div>
					</div>
				</div>
				<!-- <i class="fa fa-plus-circle" aria-hidden="true"></i> -->
			</div>
		</section>


		<section id="loisir"> <!-- Centre d'intérêts -->
			<div>
				<h3><?php echo recupTable('loisir','nom','loisir.nom',1,langue()); ?></h3>
				<p>
					<i class="fa fa-film"> </i><span>
						<?php echo recupTable('loisir','nom','loisir.nom',2,langue()); ?></span><br /><br />
					<i class="fa fa-gamepad"> </i><span>  
						<?php echo recupTable('loisir','nom','loisir.nom',3,langue()); ?></span>
				</p>
			</div>
		</section>

			<?php 

				$nom = "";
				$adresse =""; 
				$sujet = ""; 
				$message = "";

				$nomERROR = '';
				$adresseERROR = '';
				$sujetERROR = '';
				$messageERROR = '';
				$checkup = false;

				if(isset($_POST['nom']) OR isset($_POST['adresse']) OR isset($_POST['sujet']) OR isset($_POST['message'])){
					$nom = antiInject($_POST['nom']);
					$adresse = antiInject($_POST['adresse']);
					$sujet = antiInject($_POST['sujet']);
					$message = antiInject($_POST['message']);
					$checkup = true;

					if (empty($nom)) {
						$nomERROR = "Veuillez renseigner votre nom";
						$checkup = false;
					}
					if (empty(filter_var($adresse, FILTER_VALIDATE_EMAIL))) {
						$adresseERROR = "Veuillez renseigner une adresse valide";
						$checkup = false;
					}
					if (empty($sujet)) {
						$sujetERROR = "Veuillez renseigner votre sujet";
						$checkup = false;
					}
					if (empty($message)) {
						$messageERROR = "Veuillez renseigner votre message";
						$checkup = false;
					}
					if($checkup==true){
						mail("mathieu.rufini@gmail.com", $sujet, $message);
					}
				}
			?>

		<section id="contact"> <!-- Contact -->
			<div>
				<h3><?php echo recupTable('contact','nom','contact.nom',1,langue()); ?></h3>
				<div>
					<form method="post">
						<input name="nom" type="text" placeholder=
						<?php echo recupTable('contact','nom','contact.nom',2,langue()); ?> class="contact">
						<input name="adresse" type="text" placeholder=
						<?php echo recupTable('contact','nom','contact.nom',3,langue()); ?> class="contact">
						<input name="sujet" type="text" placeholder=
						<?php echo recupTable('contact','nom','contact.nom',4,langue()); ?> class="contact">
						<textarea name="message" placeholder=
						<?php echo recupTable('contact','nom','contact.nom',5,langue()); ?> class="message"></textarea>
						<input type="submit" name="envoi_mail" value="Envoyer" class="contact-submit">
					</form>
					<p><?= $nomERROR ?></p>
					<p><?= $adresseERROR ?></p>
					<p><?= $sujetERROR ?></p>
					<p><?= $messageERROR ?></p>
					<p style="display :<?php if($checkup==true){ echo 'block'; }else{echo 'none';} ?>">Votre message à bien été envoyé</p>
				</div>			
			</div>
		</section>


		<footer>
			<div>
				<div>
					<p>© Copyright <?php echo date('Y'); ?> - Mathieu RUFINI</p>
				</div>
			</div>
		</footer>
	</body>
</html>