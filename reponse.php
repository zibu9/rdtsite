<?php session_start();
require_once 'base2.php';
	if (isset($_SESSION['admin']))  
		{
			if (!empty($_POST['message'])) 
			{
					if (!preg_match('#^[ ]#', $_POST['message'])) 
					{
						 $message = htmlspecialchars($_POST['message']);
						 $nom = $_SESSION['admin']->nom;
						 $img = $_SESSION['auth']->image;
						 $id_us = $_SESSION['vers']->id_us;
					     $req = $bdd->prepare("INSERT INTO questions_reponses(id_us, reponses, nom_rep, photo_rep, ladate) VALUES (?, ?, ?, ?, NOW()) ");
					     $req->execute([$id_us, $message, $nom, $img]);
					     $_SESSION['flash']['success'] = "message envoyer";
					     $prenom_ = $_SESSION['vers']->prenom;
					     header("location: http://localhost/rdtretouche/message_ad.php?id_us=$id_us&prenom=$prenom_");
					     exit();

					}
					else
					{
                      $_SESSION['flash']['danger'] = "le message ne doit pas commencer par des espaces";
					   header("location: http://localhost/rdtretouche/message_ad.php?id_us=$id_us&prenom=$prenom_");
                      exit();

					}
			}
			else
			{
				$_SESSION['flash']['danger'] = "veuillez saisir le message";
					   header("location: http://localhost/rdtretouche/message_ad.php?id_us=$id_us&prenom=$prenom_");
                    exit();
			}
		}
?>