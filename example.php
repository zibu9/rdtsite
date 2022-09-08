<!DOCTYPE html>
<html>
<head>
	<title>example</title>
</head>
<body>

<?php 
	$sql = new PDO ('mysql:host=localhost;dbname=exemple;charset=utf8','root','') ;

	if (isset($_POST['nom'])&& isset($_POST['postnom']) && isset($_POST['prenom'])) {
		$nom = $_POST['nom'];
		$postnom = $_POST['postnom'];
		$prenom = $_POST['prenom'];	

	$req = $sql->prepare('INSERT INTO tables (nom, postnom, prenom) VALUES(?, ?, ?)');
	$req->execute([$nom,$postnom,$prenom]);
	}

 ?>
<form action="" method="POST">
	<input type="name" name="nom" placeholder="nom">
	<input type="name" name="postnom" placeholder="postnom">
	<input type="name" name="prenom" placeholder="prenom">
	<input type="submit" value="Envoyer">
</form>

<?php if (isset($nom)) {
	echo '<h2>'.$nom.'</h2>';
} ?>
</body>
</html>
