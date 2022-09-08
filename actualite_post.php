<?php 
session_start();
require_once 'base2.php';
if (($_SESSION['auth']->id<=5) AND isset($_SESSION['admin']))
{
		if(!empty($_POST))
	{
				    $errors = array();
					if (isset($_FILES['image']) AND !empty($_FILES['image']['name']))
					{
							$taille = 20000000;
							$extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image']['size'] <= $taille)
								{
									$extension = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
									if(in_array($extension, $extensionvalid))
									{
										$chemin = md5(uniqid()) . "." . $extension;
										$resultat = move_uploaded_file($_FILES['image']['tmp_name'], "images/img/" . $chemin);
											if ($resultat)
											{
											$image = $chemin;
											}
											else{
												$_SESSION['flash']['danger'] = "erreur d'importation de l'image ";
												$errors['image'] = "erreur ";
												header('Location: actualite.php');
								                exit();
										    }
									}
									else{
											$errors['image'] = "erreur ";
										 $_SESSION['flash']['danger'] = "Format de l'image non pris en charge";
								         header('Location: actualite.php');
										exit();
									}
								}

							else
							{
							$errors['image'] = "erreur ";
							 $_SESSION['flash']['danger'] = "image trop grande";
							header('Location: actualite.php');
							exit();
							}

					}
					else{
						    	$errors['image'] = "erreur ";
										 $_SESSION['flash']['danger'] = "Veuillez choisir une image : obligatoire";
								         header('Location: actualite.php');
										exit();
					    }
					    if(isset($_POST['titre']) AND (!preg_match('#^[ ]#', $_POST['titre'])))
						{
									$titre = stripcslashes($_POST['titre']);
									$titre = htmlspecialchars($titre);
									if (isset($_POST['badge'])) 
									{
										$badge = $_POST['badge'];
									}
									else
									{
									  $_SESSION['flash']['danger'] = "veuillez entrer le type : obligatoire";
								      header('Location: actualite.php');
									  exit();
									}
									
					        	if(isset($_POST['details']) AND (!preg_match('#^[ ]#', $_POST['details'])))
						        {
									$details = stripcslashes($_POST['details']); 
									$details = htmlspecialchars($details);
					            }
					            else
					            {
								      $_SESSION['flash']['danger'] = "veuillez entrer le details : obligatoire";
								      header('Location: actualite.php');
									  exit();
							    }
					    }
					    else{
						      $_SESSION['flash']['danger'] = "veuillez entrer un titre : obligatoire";
						      header('Location: actualite.php');
							  exit();
							}
					       if (empty($errors))
				           {
							 $req = $bdd->prepare('INSERT INTO actualite (badge, titre, photo, details, ladate) VALUES (?, ?, ?, ?, NOW()) ');
							$req->execute([$badge, $titre, $image, $details]);
							 $_SESSION['flash']['success'] = "Effectuer";
							   header('location: actualite.php');
							   exit();
						   }

					}
					else{
							$_SESSION['flash']['danger'] = "remplissez au moins un champs";
							header('Location: actualite.php');
							exit();
					}
	}					else{
							$_SESSION['flash']['danger'] = "vous devez vous connecter";
							header('Location: adhesion.php');
							exit();
					}

 ?>