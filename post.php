<?php
session_start();
require_once 'base2.php';
function debug ($var){
	echo '<pre>'. print_r($var,true).'</pre>';
}
function str_random($length){

	$cle = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
return substr(str_shuffle(str_repeat($cle, $length)), 0, $length);
}
	if(!empty($_POST))
	{
			$errors = array();
			 if(empty($_POST['mail']) || (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])))
			 {
				$errors['email'] = "email non valide";
			 }
			 if(empty($_POST['nom1']) || !preg_match('/^[a-zA-Z]*$/', $_POST['nom1'])){
				 $errors['prenom'] = "vous n'avez pas entrer un prenom correct ";
			 }
			 if(empty($_POST['nom2']) || !preg_match('/^[a-zA-Z]*$/', $_POST['nom2'])){
				 $errors['nom'] = "vous n'avez pas entrer un nom correct ";
			 }
			 if(empty($_POST['nom3']) || !preg_match('/^[a-zA-Z]*$/', $_POST['nom3'])){
				 $errors['postnom'] = "vous n'avez pas entrer un postnom correct ";
			 }
			 if(empty($_POST['genre'])){
				 $errors['genre'] = "veuiller selectionner le genre ";
			 }
			  if(empty($_POST['nais'])){
				 $errors['naissance'] = "entrer votre date de naissance ";
			 }
			 if(empty($_POST['ville'])){
				 $errors['ville'] = "Entrer votre ville actuelle ";
			 }
			else{
				$req = $bdd->prepare('SELECT id FROM users WHERE email = ?');
				$req->execute([$_POST['mail']]);
				$email = $req->fetch();
				if($email){
					$errors['email']= "ce mail est deja utiliser pour ce site";
					$_SESSION['flash']['danger'] =  "ce mail est deja utiliser pour ce site";
					header('location: adhesion.php');
					exit();
				}
			
			}
			if((empty($_POST['mdp']) || $_POST['mdp'] != $_POST['mdp2'])){
				$errors['mdp'] = "veuillez entrer un mdp valide";
			}
			  if (empty($errors))
					 {
						 $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);   
						$lien1 = "http://localhost/rdtretouche/confirm.php";
						$image = 'images/seconecte.jpg';
					 $req = $bdd->prepare("INSERT INTO users SET email = ?, prenom = ?, nom = ?, postnom = ?, genre = ?, naissance = ?, ville = ?, passwords = ?, image = ?, confirmation = ?, lien = ?, oublier = ' ', oublielien = ' ',cookies_tok = ' ' ");
					  $confirmation = str_random(60);
					 $req->execute([$_POST['mail'], $_POST['nom1'], $_POST['nom2'], $_POST['nom3'], $_POST['genre'], $_POST['nais'], $_POST['ville'], $mdp, $image, $confirmation, $lien1]);
					 $user_id = $bdd->lastInsertId();
					 $lien = "http://localhost/rdtretouche/confirm.php?id=$user_id&confirmation=$confirmation";
					 $req = $bdd->prepare("UPDATE users SET lien = ? WHERE email = ?");
					 $req->execute([$lien, $_POST['mail']]);
					   $_SESSION['flash']['success'] = "un lien de confirmation vous a été envoyer sur votre adresse mail";
					   header('location: index.php');
					   exit();
					}
	}
	else
	{
		 $_SESSION['flash']['danger'] =  "veuillez remplir tout les champs";
		 header('location: adhesion.php');
		 exit();
	}
  ?>
	
