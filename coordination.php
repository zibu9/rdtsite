<?php 
session_start();
require_once 'base2.php';
if (($_SESSION['auth']->id<=5) AND isset($_SESSION['admin']))
{
			if(!empty($_POST))
		{
			include('inc/coordination2.php');
			include('inc/coordination3.php');
			include('inc/coordination4.php');
			include('inc/coordination5.php');
			include('inc/coordination6.php');
			include('inc/coordination7.php');
			include('inc/coordination8.php');
			include('inc/coordination9.php');
			include('inc/coordination10.php');
			include('inc/coordination11.php');
			include('inc/coordination12.php');
			include('inc/coordination13.php');
			include('inc/coordination14.php');
			include('inc/coordination15.php');			
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