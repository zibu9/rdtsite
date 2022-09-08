<?php
try {
/*$bdd = new PDO ('mysql:host=localhost;dbname=id12074881_zibu;charset=utf8','id12074881_localhost','=AKaQZ8OlA1HmIya') ;*/
    $bdd = new PDO ('mysql:host=localhost;dbname=rdt_site;charset=utf8','root','') ;
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);} 
    		 catch (Exception $e) 
			 {
		   			die('Erreur : '. $e->getMessage());
		 	 }
 ?>