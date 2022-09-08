<?php session_start();
require_once 'base2.php';
	if (isset($_SESSION['auth']))  
		{
			if (!empty($_POST['message'])) 
			{
					if (!preg_match('#^[ ]#', $_POST['message'])) 
					{
						 $message = htmlspecialchars($_POST['message']);
						 $prenom = $_SESSION['auth']->prenom;
						 $nom = $_SESSION['auth']->nom;
						 $img = $_SESSION['auth']->image;
						 $id_us = $_SESSION['auth']->id;
					 $req = $bdd->prepare("INSERT INTO questions_reponses(id_us, prenom, nom, photo, question, ladate) VALUES (?, ?, ?, ?, ?, NOW()) ");
					 $req->execute([$id_us, $prenom, $nom, $img, $message]);
					  $_SESSION['flash']['success'] = "message envoyer";
					   header('location: compte.php');
					}
					else
					{
                      $_SESSION['flash']['danger'] = "le message ne doit pas commencer par des espaces";
                      header('location: compte.php');

					}
			}
			else
			{
				$_SESSION['flash']['danger'] = "veuillez saisir le message";
                    header('location: compte.php');
			}
		}
	else
		{
			header('location:index.php');
		}
?>