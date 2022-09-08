<?php
session_start();
require_once 'base2.php';
	if(!empty($_POST))
	{
			$errors = array();
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
			 if(empty($_POST['ville']))
			 {
				 $errors['ville'] = "Entrer votre ville actuelle ";
			 }
					if ((isset($_FILES['image']) AND !empty($_FILES['image']['name'])))
					{
							$taille = 5000000;
							$extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image']['size'] <= $taille)
								{
									$extension = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
									if (in_array($extension, $extensionvalid))
									{
									$chemin ="images/" . md5(uniqid()).".".$extension;
									$resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
										if ($resultat)
										{
										$image = $chemin;
										}
										else{
											$_SESSION['flash']['danger'] = "erreur d'importation de l'image ";
											$errors['image'] = "erreur ";
											header('Location: compte.php');
							                exit();
									    }
									}
									else{
										$errors['image'] = "erreur ";
									 $_SESSION['flash']['danger'] = "Format de l'image non pris en charge";
									 $_SESSION['flash']['danger'] = "image trop grande";
							         header('Location: compte.php');
							exit();
									
									exit();
									}
								}
							else{ $_SESSION['flash']['danger'] = "image trop grande";
							header('Location: compte.php');
							exit();
							}

					}
					else{
							$image = 'images/seconecte.jpg';
							
					    }
			  if (empty($errors))
				 {
							 $req = $bdd->prepare("UPDATE users SET prenom = ?, nom = ?, postnom = ?, genre = ?, naissance = ?, ville = ?, image = ? WHERE email = ?");
							 $req->execute([$_POST['nom1'], $_POST['nom2'], $_POST['nom3'], $_POST['genre'], $_POST['nais'], $_POST['ville'], $image, $_SESSION['auth']->email]);
							 $req = $bdd->prepare("SELECT * FROM users WHERE email = ?");
							 $req->execute([$_SESSION['auth']->email]);
							 $user = $req->fetch();
							 $_SESSION['auth'] = $user;
							   $_SESSION['flash']['success'] = "modifier avec success";
							   header('location: compte.php');
							   exit();
					}else{
							$_SESSION['flash']['danger'] = "veuillez remplir correctement tout les champs";
							header('Location: compte.php');
							exit();
					}
	}
	else
	{
		 $_SESSION['flash']['danger'] =  "veuillez remplir tout les champs";
		 header('location: compte.php');
	}
  ?>
	
