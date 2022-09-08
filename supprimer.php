<?php 
session_start();
require_once 'base2.php';
if (($_SESSION['auth']->id<=5) AND isset($_SESSION['admin']))
{
		if(!empty($_GET) AND isset($_SESSION['article'])AND isset($_GET['id']))
	{
					$id = $_SESSION['article']->id;
					$id2 = $_GET['id'];
					$titre = $_SESSION['article']->titre;
					       if (($id == $id2))
				           {
							 $req = $bdd->prepare('DELETE FROM `actualite` WHERE id = ? AND titre = ?');
							$req->execute([$id, $titre]);
							 $_SESSION['flash']['success'] = "article supprimer";
							   header("location:actualite.php");
							   exit();
						   }

					}
					else{
							$_SESSION['flash']['danger'] = "impossible de supprimer cette article";
							header("location: http://localhost/rdtretouche/details.php?id=$id&titre=$titre");
							exit();
					}
	}

 ?>