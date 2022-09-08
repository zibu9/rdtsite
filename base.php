    <?php 
		 try {
			        $sql = new PDO ('mysql:host=localhost;dbname=rdt_site;charset=utf8','root','') ;
			     /*$sql = new PDO ('mysql:host=localhost;dbname=id12074881_zibu;charset=utf8','id12074881_localhost','=AKaQZ8OlA1HmIya') ;*/
			    	$sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		     } 
		 catch (Exception $e) 
			 {
		   			die('Erreur : '. $e->getMessage());
		 	 }
	?>
