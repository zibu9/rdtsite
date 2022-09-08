<?php 
session_start();
require_once 'base2.php';
if (($_SESSION['auth']->id<=5) AND isset($_SESSION['admin']))
{
		if(!empty($_POST))
	{
	         		   if(isset($_POST['mission']) AND (!preg_match('#^[ ]#', $_POST['mission'])))
						{
							 $mission = htmlspecialchars($_POST['mission']); 
							 $req = $bdd->prepare("UPDATE titres SET mission = ? WHERE id = 1 ");
							 $req->execute([$mission]);
					        $_SESSION['flash']['success'] = "modifier avec success";
					         header('Location: index.php');
							  exit();
					    }
					    else{
						      $_SESSION['flash']['danger'] = "veuillez saisir le texte et il doit etre sans espace au debut";
						      header('Location: index.php');
							  exit();
							}

	}
					
	else
	{
				$_SESSION['flash']['danger'] = "veuillez remplir le champ";
				header('Location: index.php');
				exit();
	}
}

 ?>