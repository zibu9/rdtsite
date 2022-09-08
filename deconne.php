<?php 
		session_start();
		if (isset($_SESSION['admin']))
	    {
			setcookie('remember',NULL,-1);
			setcookie('admin',NULL,-1);
			unset($_SESSION['auth']);
			unset($_SESSION['admin']);
			$_SESSION['flash']['success'] = " vous êtes deconnecté";
			header('location: index.php');
		}
		else
		{
			setcookie('remember',NULL,-1);
			unset($_SESSION['auth']);
			$_SESSION['flash']['success'] = " vous êtes deconnecté";
			header('location: index.php');
	    }
 ?>