<?php 
session_start();
	if (isset($_SESSION['admin'])) 
	{
		setcookie('admin',NULL,-1);
		unset($_SESSION['admin']);
		$_SESSION['flash']['success'] = " vous êtes deconnecté de l'administration";
		header('location: compte.php');		
	}

 ?>