<?php 
session_start();
require_once 'base2.php';
if (($_SESSION['auth']->id<=5) AND isset($_SESSION['admin']))
{
			if(!empty($_POST))
		{
			include('inc/mamans1.php');
			include('inc/mamans2.php');		
			$_SESSION['flash']['success'] = "modifier avec success";
			header('Location: index.php');
			exit();
		}
		/*if(!empty($_POST))*/
		else
		{
				$_SESSION['flash']['danger'] = "remplissez au moins un champs";
				header('Location: index.php');
				exit();
		}

}
/*isset*/

 ?>