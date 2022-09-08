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
							$taille = 5000000;
							$extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image']['size'] <= $taille)
								{
									$extension = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
									if(in_array($extension, $extensionvalid))
									{
										$chemin ="a" . "." . $extension;
										$resultat = move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $chemin);
											if ($resultat)
											{
											$image = $chemin;
											}
											else{
												$_SESSION['flash']['danger'] = "erreur d'importation de l'image ";
												$errors['image'] = "erreur ";
												header('Location: index.php');
								                exit();
										    }
									}
									else{
											$errors['image'] = "erreur ";
										 $_SESSION['flash']['danger'] = "Format de l'image non pris en charge";
								         header('Location: index.php');
										exit();
									}
								}

							else
							{
							$errors['image'] = "erreur ";
							 $_SESSION['flash']['danger'] = "image trop grande";
							header('Location: index.php');
							exit();
							}

					}
					else{
						    $image = "a.jpg";
					    }
					    if(isset($_POST['histoire']) AND (!preg_match('#^[ ]#', $_POST['histoire'])))
						{
							 $histoire = htmlspecialchars($_POST['histoire']); 
							 $req = $bdd->prepare("UPDATE titres SET histoire = ? WHERE id = 1 ");
							 $req->execute([$histoire]);
					        $_SESSION['flash']['success'] = "modifier avec success";
					    }
					    else{
						      $_SESSION['flash']['danger'] = "veuillez saisir le texte et il doit etre sans espace au debut";
						      header('Location: index.php');
							  exit();
							}
					       if (empty($errors))
				           {
							 $req1 = $bdd->prepare("UPDATE fichiers SET autres = ? WHERE id = 1");
							 $req1->execute([$image]);
							 $_SESSION['flash']['success'] = "modifier avec success";
							   header('location: index.php');
							   exit();
						   }

					}
					else{
							$_SESSION['flash']['danger'] = "remplissez au moins un champs";
							header('Location: index.php');
							exit();
					}
	}

 ?>