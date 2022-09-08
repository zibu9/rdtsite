<?php 
session_start();
		require_once 'base2.php';
		function str_random($length)
		{
			$cle = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
			return substr(str_shuffle(str_repeat($cle, $length)), 0, $length);
		}
		if (isset($_POST['mail']) && !empty($_POST['mail'] ))
        {
				$req = $bdd->prepare('SELECT * FROM users WHERE email = ? AND confirmdate IS NOT NULL');
				$req->execute([$_POST['mail']]);
				$email = $req->fetch();
				if($email)
				{	 
			     $reset = str_random(60);
				 $user_id = $email->id;
				 $lien = "http://localhost/rdtretouche/reset_post.php?id=$user_id&reset=$reset";
				 $req = $bdd->prepare("UPDATE users SET oublier = ?, oublielien = ?, resetdate = NOW() WHERE email = ?");
				 $req->execute([$lien, $reset, $_POST['mail']]);
				 $_SESSION['flash']['success'] = "un lien de reinitialisation vous a été envoyer";
				 header('location: adhesion.php');
				 exit();
	             }
	             else{
	             	$_SESSION['flash']['dander'] = "cette adresse email ne correspond à  aucun compte";
				    header('location: adhesion.php');
	             }
	    } else{
	             	$_SESSION['flash']['dander'] = "veuillez entrer votre adresse email";
				    header('location: adhesion.php');
	             }
 ?>