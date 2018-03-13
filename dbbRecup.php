<?php
	//*************************************************************************************
	// NOM : connectdb
	// DESCRIPTION : 
	//	Cette fonction permet d'établir une connexion à la base de donnée
	function connectdb(){
		try{
			$pdo = new PDO('mysql:host=db728374740.db.1and1.com;dbname=db728374740','dbo728374740','Borderlands.2', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			return $pdo;
		}

		catch(PDOException $e){
			die('Erreur 2: impossible de se connecter');
		}
	}
	//*************************************************************************************


	//*************************************************************************************
	// NOM : langue
	// DESCRIPTION : 
	//	Cette fonction permet de sélectionner une langue si une langue est déjà défini,
	//	sinon, attribue la langue française par défaut 
	function langue(){
		if(!isset($_SESSION['langue'])){
			$_SESSION['langue'] = 'fr';
		}
		if(isset($_POST['langue'])){
			$_SESSION['langue'] = $_POST['langue'];
		}
		else{
			$_SESSION['langue'] = 'fr';
		}
		$lang = $_SESSION['langue'];
		return $lang;
	}
	//*************************************************************************************
		

	//*************************************************************************************
	// NOM : recupTable
	// DESCRIPTION :
	//	Cette fonction permet de recupérer un élement d'une base de donnée selon son id et sa table
	//	et de le trier selon sa langue  
	function recupTable($table,$select, $contenu,$id,$lang){
		
		$chooseid = connectdb()->query("SELECT " . $contenu . " FROM " . $table . " WHERE langue = '". $lang ."' AND choix_langue = '" . $id . "'");
		$choix = $chooseid->fetch()[$select];
		return $choix;
	}
	//*************************************************************************************


	//*************************************************************************************
	// NOM : recupAll
	// DESCRIPTION :
	//	Cette fonction permet de recupérer tout les éléments d'une base de donnée selon leur table
	function recupAll($table,$select, $contenu){
		$chooseid = connectdb()->query("SELECT " . $contenu . " FROM " . $table . " ORDER BY id");
		$choix = $chooseid->fetchAll();
		foreach($choix as $key => $value){
			$all[] = $value["$select"];
		}
		return $all;
	}
	//*************************************************************************************


	//*************************************************************************************
	// NOM : connexion
	// DESCRIPTION :
	//	Cette fonction permet de comparer l'id et le mdp de l'utilisateur
	//	avec ceux présent dans la BDD
	function connexion($login, $password){
		$recupLog = recupAll('users', 'login', 'users.login');
		$recupMDP = recupAll('users', 'password', 'users.password');
		foreach($recupLog as $LOG => $log){
			if($log == $login){
				foreach($recupMDP as $MDP => $mdp){
					if($mdp == sha1($password)){	
						$_SESSION['user'] = $log;
						return true;
					}
				}
			}
		}
		return false;
	}
	//*************************************************************************************


	//*************************************************************************************
	// NOM : modifBDD
	// DESCRIPTION :
	//	Cette fonction permet de modifier les valeurs de la base de données selon la taille
	// 	et le nom de la table qui lui sont donnée en paramètre
	//*************************************************************************************

	function modifBDD($table, $taille, $nom, $contenu, $choix_langue, $langue){
		connectdb()->query("UPDATE ".$table." SET 
			nom = ". connectdb()->quote($nom)."
			,contenu = ".connectdb()->quote($contenu)."
			,choix_langue = ".connectdb()->quote($choix_langue)."
			,langue = ".connectdb()->quote($langue)."
			WHERE id = ". $taille);

	}


	function modifCompetence($table, $taille, $nom, $contenu){
		connectdb()->query("UPDATE ".$table." SET 
				nom = ". connectdb()->quote($nom)."
				,contenu = ".connectdb()->quote($contenu)."
				WHERE id = ". $taille);
	}
	//*************************************************************************************


	//*************************************************************************************
	// NOM : trier
	// DESCRIPTION :
	//	Cette fonction permet de récupérer un élément d'une table 
	//  selon sa table, son id et sa colonne 
	//*************************************************************************************
	function trier($table, $id, $choix){
		$tri = connectdb()->query("SELECT * FROM ".$table. " WHERE id = ". $id." ORDER BY id ASC");
		$fetch = $tri->fetch(PDO::FETCH_ASSOC);
		return $fetch[$choix];
	}
	//*************************************************************************************


	//*************************************************************************************
	// NOM : ajoutBDD
	// DESCRIPTION :
	//	Cette fonction permet d'ajouter une valeur dans la base de données souhaitée selon la taille
	// 	et le nom de la table qui lui sont donnée en paramètre
	//*************************************************************************************

	function ajoutBDD($table, $taille, $nomFR, $nomEN, $contenuFR, $contenuEN){
		$tailleFR = $taille+1;
		$tailleEN = $taille+2;
		$tailleLangue = ($taille/2)+1;			
		connectdb()->exec("INSERT INTO ". $table ." (id, nom, contenu, choix_langue, langue) 
			VALUES(".$tailleFR."
			, '". $nomFR ."' 
			, '". $contenuFR ."'
			, '".$tailleLangue."'
			, 'fr')");
		connectdb()->exec("INSERT INTO ". $table ." (id, nom, contenu, choix_langue, langue) 
			VALUES(".$tailleEN."
			, '". $nomEN ."' 
			, '". $contenuEN ."'
			, '".$tailleLangue."'
			, 'en')");
	}
	//*************************************************************************************


	//*************************************************************************************
	// NOM : ajoutBDDCompetence
	// DESCRIPTION :
	//	Cette fonction permet d'ajouter une valeur dans la base de données souhaitée selon la taille
	// 	et le nom de la table qui lui sont donnée en paramètre, ne fonctionne que pour la table Competence
	//  car construite différemment
	//*************************************************************************************

	function ajoutCompetence($table, $taille, $nom, $contenu){
		$tailleP = $taille+1;			
		connectdb()->exec("INSERT INTO ". $table ." (id, nom, contenu) 
			VALUES(".$tailleP."
			, '". $nom ."' 
			, '". $contenu ."')");
		
	}
	//*************************************************************************************

	//*************************************************************************************
	// NOM : supprimer
	// DESCRIPTION :
	//	Cette fonction permet de supprimer deux éléments d'une table : l'élément saisi en paramètre
	// 	ainsi qu'un autre en fonction d'un modulo (choix de la langue)
	//*************************************************************************************
	function supprimerBDD($table, $id){
		connectdb()->exec("DELETE FROM ". $table . " WHERE id = ". $id );
		if ($table != 'competence'){
			if ($id % 2 == 0){
				$id = $id-1;
				connectdb()->exec("DELETE FROM ". $table . " WHERE id = ". $id);
			}
			else{
				$id = $id+1;
				connectdb()->exec("DELETE FROM ". $table . " WHERE id = ". $id);
			}
			connectdb()->query("UPDATE " .$table ." SET id = id-2, choix_langue = choix_langue-1  WHERE id>".$id);
		}else{
			connectdb()->query("UPDATE " .$table ." SET id = id-1 WHERE id>".$id);
		}
	}
	//*************************************************************************************


	//*************************************************************************************
	// NOM : anti Injection SQL
	// DESCRIPTION :
	//	Cette fonction permet de supprimer deux éléments d'une table : l'élément saisi en paramètre
	// 	ainsi qu'un autre en fonction d'un modulo (choix de la langue)
	//*************************************************************************************

	function antiInject($message){
		$message = trim($message);
		$message = stripcslashes($message);
		$message = htmlspecialchars($message);
		return $message;
	}
	//*************************************************************************************


	// Ces variables permettent de récupérer les valeurs de la base de donnée selon leur langue
	$allmenu = connectdb()->query("SELECT * FROM menu WHERE langue='" . langue() . "'");
	$allPres = connectdb()->query("SELECT * FROM pres WHERE choix_langue >=2 AND langue='" . langue() . "'");
	$allCompetence = connectdb()->query("SELECT * FROM competence ORDER BY id ASC");
	$allFormation = connectdb()->query("SELECT * FROM formation WHERE langue='" . langue() . "'");
	$allExp = connectdb()->query("SELECT * FROM exppro WHERE langue='" . langue() . "'");


	// Ces variables permettent de récupérer toutes les valeurs d'une base
	$fullMenu = connectdb()->query("SELECT * FROM menu ");
	$fullPres = connectdb()->query("SELECT * FROM pres ");
	$fullCompetence = connectdb()->query("SELECT * FROM competence ");
	$fullFormation = connectdb()->query("SELECT * FROM formation ");
	$fullExp = connectdb()->query("SELECT * FROM exppro ");
?>