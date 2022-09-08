<?php 
session_start();
require_once 'base2.php';
if (($_SESSION['auth']->id<=5) AND isset($_SESSION['admin']))
{
		if(!empty($_POST))
	{
				    $errors = array();
					if ((isset($_FILES['image1']) AND !empty($_FILES['image1']['name'])) AND (isset($_FILES['image2']) AND !empty($_FILES['image2']['name']))AND(isset($_FILES['image3']) AND !empty($_FILES['image3']['name'])) AND (isset($_FILES['image4']) AND !empty($_FILES['image4']['name']))AND(isset($_FILES['image5']) AND !empty($_FILES['image5']['name'])) AND (isset($_FILES['image6']) AND !empty($_FILES['image6']['name'])))
					{
							$taille = 10000000;
							$extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if (($_FILES['image1']['size'] <= $taille) AND ($_FILES['image2']['size'] <= $taille)AND($_FILES['image3']['size'] <= $taille) AND ($_FILES['image4']['size'] <= $taille)AND($_FILES['image5']['size'] <= $taille) AND ($_FILES['image6']['size'] <= $taille))
								{
									$extension1 = strtolower(substr(strrchr($_FILES['image1']['name'], '.'), 1));
									$extension2 = strtolower(substr(strrchr($_FILES['image2']['name'], '.'), 1));
									$extension3 = strtolower(substr(strrchr($_FILES['image3']['name'], '.'), 1));
									$extension4 = strtolower(substr(strrchr($_FILES['image4']['name'], '.'), 1));
									$extension5 = strtolower(substr(strrchr($_FILES['image5']['name'], '.'), 1));
									$extension6 = strtolower(substr(strrchr($_FILES['image6']['name'], '.'), 1));
									if (((((((in_array($extension1, $extensionvalid)) AND (in_array($extension2, $extensionvalid)))AND(in_array($extension3, $extensionvalid))) AND (in_array($extension4, $extensionvalid)))AND(in_array($extension5, $extensionvalid)))) AND (in_array($extension6, $extensionvalid)))
									{
									$chemin1 ="r1" . "." . $extension1;
									$chemin2 ="e" . "." . $extension2;
									$chemin3 ="r2" . "." . $extension3;
									$chemin4 ="c" . "." . $extension3;
									$chemin5 ="d" . "." . $extension4;
									$chemin6 ="b" . "." . $extension5;
									$resultat1 = move_uploaded_file($_FILES['image1']['tmp_name'], "images/" . $chemin1);
									$resultat2 = move_uploaded_file($_FILES['image2']['tmp_name'], "images/" . $chemin2);
									$resultat3 = move_uploaded_file($_FILES['image3']['tmp_name'], "images/" . $chemin3);
									$resultat4 = move_uploaded_file($_FILES['image4']['tmp_name'], "images/" . $chemin4);
									$resultat5 = move_uploaded_file($_FILES['image5']['tmp_name'], "images/" . $chemin5);
									$resultat6 = move_uploaded_file($_FILES['image6']['tmp_name'], "images/" . $chemin6);
										if (((((($resultat1) AND ($resultat2)) AND ($resultat3)) AND ($resultat4)) AND($resultat5)) AND ($resultat6))
										{
										$image1 = $chemin1;
										$image2 = $chemin2;										
										$image3 = $chemin3;
										$image4 = $chemin4;										
										$image5 = $chemin5;
										$image6 = $chemin6;
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
						    $image1 = "r1.jpg";
							$image2 = "e.jpg";										
							$image3 = "r2.jpg";
							$image4 = "c.jpg";									
							$image5 = "d.jpg";
							$image6 = "b.jpg";
					    }
					    if(isset($_POST['preambule']) AND (!preg_match('#^[ ]#', $_POST['preambule'])))
						{
							 $preambule = htmlspecialchars($_POST['preambule']); 
							 $req = $bdd->prepare("UPDATE titres SET preambule = ? WHERE id = 1 ");
							 $req->execute([$preambule]);
					        $_SESSION['flash']['success'] = "modifier avec success";
					    }
					    else{
						      $_SESSION['flash']['danger'] = "veuillez saisir le texte et il doit etre sans espace au debut";
						      header('Location: index.php');
							  exit();
							}
					       if (empty($errors))
				           {
							 $req1 = $bdd->prepare("UPDATE fichiers SET photos_diap = ? WHERE id = 1");
							 $req1->execute([$image1]);
							 $req2 = $bdd->prepare("UPDATE fichiers SET photos_diap = ? WHERE id = 2");
							 $req2->execute([$image2]);
							 $req3 = $bdd->prepare("UPDATE fichiers SET photos_diap = ? WHERE id = 3");
							 $req3->execute([$image3]);
							 $req4 = $bdd->prepare("UPDATE fichiers SET photos_diap = ? WHERE id = 4");
							 $req4->execute([$image4]);
							 $req5 = $bdd->prepare("UPDATE fichiers SET photos_diap = ? WHERE id = 5");
							 $req5->execute([$image5]);
							 $req6 = $bdd->prepare("UPDATE fichiers SET photos_diap = ? WHERE id = 6");
							 $req6->execute([$image6]);
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