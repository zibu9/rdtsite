<?php 
require_once 'base2.php';
if (($_SESSION['auth']->id<= 5) AND isset($_SESSION['admin']))
{
		if(!empty($_POST))
	{

						if (isset($_FILES['image1']) AND !empty($_FILES['image1']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image1']['size'] <= $taille)
									{
										
					               
										$extension1 = strtolower(substr(strrchr($_FILES['image1']['name'], '.'), 1));
										if (in_array($extension1, $extensionvalid))
										{
										$chemin1 = "images1" . "." . $extension1;

										$resultat1 = move_uploaded_file($_FILES['image1']['tmp_name'], "images/" . $chemin1);
											if ($resultat1)
											{
											   $image1 = $chemin1;
											}
											else{
												$_SESSION['flash']['danger'] = "erreur d'importation de l'image 1 ";
							
												header('Location: index.php');
								                exit();
										    }
										}
										else{
						
										 $_SESSION['flash']['danger'] = "Format de l'image 1 non pris en charge";
								         header('Location: index.php');
										exit();
										}
									}

								else
								{
			
								 $_SESSION['flash']['danger'] = "image 1 trop grande";
								header('Location: index.php');
								exit();
								}

						}/*end if file*/
						else{
								 $img = $bdd->query("SELECT photo FROM ass_gen WHERE id = 1 ");
								 $image = $img->fetch();
							     $image1 = $image->photo;
						    }
				         if(isset($_POST['prenom1'])AND (isset($_POST['nom1'])))
						{
										 $prenom1 = htmlspecialchars($_POST['prenom1']); 
										 $nom1 = htmlspecialchars($_POST['nom1']); 	
								         $req = $bdd->prepare("UPDATE ass_gen SET prenom = ?, nom = ?, photo = ? WHERE id = 1 ");
										 $req->execute([$prenom1, $nom1, $image1]);

					    }/*end if noms*/	
					    else{
								 $_SESSION['flash']['danger'] = "verifier bien les identitées 1";
						         header('Location: index.php');
								exit();
								}/*end if 1*/
/*debut if 2*/
						if (isset($_FILES['image2']) AND !empty($_FILES['image2']['name']))
						{ 
							    $taille2 = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image2']['size'] <= $taille2)
									{
										
					               
										$extension2 = strtolower(substr(strrchr($_FILES['image2']['name'], '.'), 1));
										if (in_array($extension2, $extensionvalid))
										{
										$chemin2 = "images2" . "." . $extension2;

										$resultat2 = move_uploaded_file($_FILES['image2']['tmp_name'], "images/" . $chemin2);
											if ($resultat2)
											{
											   $image2 = $chemin2;
											}
											else{
												$_SESSION['flash']['danger'] = "erreur d'importation de l'image 2";
							
												header('Location: index.php');
								                exit();
										    }
										}
										else{
						
										 $_SESSION['flash']['danger'] = "Format de l'image 2 non pris en charge";
								         header('Location: index.php');
										exit();
										}
									}

								else
								{
			
								 $_SESSION['flash']['danger'] = "image 2 trop grande";
								header('Location: index.php');
								exit();
								}

						}/*end if file*/
						else{
							     $img = $bdd->query("SELECT photo FROM ass_gen WHERE id = 2 ");
								 $image = $img->fetch();
							     $image2 = $image->photo;
						    }
				         if(isset($_POST['prenom2'])AND (isset($_POST['nom2'])))
						{
										 $prenom2 = htmlspecialchars($_POST['prenom2']); 
										 $nom2 = htmlspecialchars($_POST['nom2']); 	
								         $req2 = $bdd->prepare("UPDATE ass_gen SET prenom = ?, nom = ?, photo = ? WHERE id = 2 ");
										 $req2->execute([$prenom2, $nom2, $image2]);
					    }/*end if noms*/	
					    else{
								 $_SESSION['flash']['danger'] = "verifier bien les identitées 2";
						         header('Location: index.php');
								exit();
								}/*end if 2*/
								/*debut 3*/
						if (isset($_FILES['image3']) AND !empty($_FILES['image3']['name']))
						{ 
							    $taille3 = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image3']['size'] <= $taille3)
									{
										
					               
										$extension3 = strtolower(substr(strrchr($_FILES['image3']['name'], '.'), 1));
										if (in_array($extension3, $extensionvalid))
										{
										$chemin3 = "images3" . "." . $extension3;

										$resultat3 = move_uploaded_file($_FILES['image3']['tmp_name'], "images/" . $chemin3);
											if ($resultat3)
											{
											   $image3 = $chemin3;
											}
											else{
												$_SESSION['flash']['danger'] = "erreur d'importation de l'image 3";
							
												header('Location: index.php');
								                exit();
										    }
										}
										else{
						
										 $_SESSION['flash']['danger'] = "Format de l'image 3 non pris en charge";
								         header('Location: index.php');
										exit();
										}
									}

								else
								{
			
								 $_SESSION['flash']['danger'] = "image 3 trop grande";
								header('Location: index.php');
								exit();
								}

						}/*end if file*/
						else{
							    $img = $bdd->query("SELECT photo FROM ass_gen WHERE id = 3 ");
								 $image = $img->fetch();
							     $image3 = $image->photo;
						    }
				         if(isset($_POST['prenom3'])AND (isset($_POST['nom3'])))
						{
										 $prenom3 = htmlspecialchars($_POST['prenom3']); 
										 $nom3 = htmlspecialchars($_POST['nom3']); 	
								         $req3 = $bdd->prepare("UPDATE ass_gen SET prenom = ?, nom = ?, photo = ? WHERE id = 3 ");
										 $req3->execute([$prenom3, $nom3, $image3]);

					    }/*end if noms*/	
					    else{
								 $_SESSION['flash']['danger'] = "verifier bien les identitées 3";
						         header('Location: index.php');
								exit();
								}
								/*end if 3*/
								/*debut 4*/
						if (isset($_FILES['image4']) AND !empty($_FILES['image4']['name']))
						{ 
							    $taille4 = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image4']['size'] <= $taille4)
									{
										
					               
										$extension4 = strtolower(substr(strrchr($_FILES['image4']['name'], '.'), 1));
										if (in_array($extension4, $extensionvalid))
										{
										$chemin4 = "images4" . "." . $extension4;

										$resultat4 = move_uploaded_file($_FILES['image4']['tmp_name'], "images/" . $chemin4);
											if ($resultat4)
											{
											   $image4 = $chemin4;
											}
											else{
												$_SESSION['flash']['danger'] = "erreur d'importation de l'image 4";
							
												header('Location: index.php');
								                exit();
										    }
										}
										else{
						
										 $_SESSION['flash']['danger'] = "Format de l'image 4 non pris en charge";
								         header('Location: index.php');
										exit();
										}
									}

								else
								{
			
								 $_SESSION['flash']['danger'] = "image 4 trop grande";
								header('Location: index.php');
								exit();
								}

						}/*end if file*/
						else{
							    $img = $bdd->query("SELECT photo FROM ass_gen WHERE id = 4 ");
								 $image = $img->fetch();
							     $image4 = $image->photo;
						    }
				         if(isset($_POST['prenom4'])AND (isset($_POST['nom4'])))
						{
										 $prenom4 = htmlspecialchars($_POST['prenom4']); 
										 $nom4 = htmlspecialchars($_POST['nom4']); 	
								         $req4 = $bdd->prepare("UPDATE ass_gen SET prenom = ?, nom = ?, photo = ? WHERE id = 4 ");
										 $req4->execute([$prenom4, $nom4, $image4]);
					    }/*end if noms*/	
					    else{
								 $_SESSION['flash']['danger'] = "verifier bien les identitées 4";
						         header('Location: index.php');
								exit();
								}
								/*end if 4*/
								/*debut 5*/
						if (isset($_FILES['image5']) AND !empty($_FILES['image5']['name']))
						{ 
							    $taille5 = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image2']['size'] <= $taille2)
									{
										
					               
										$extension5 = strtolower(substr(strrchr($_FILES['image5']['name'], '.'), 1));
										if (in_array($extension5, $extensionvalid))
										{
										$chemin5 = "images5" . "." . $extension5;

										$resultat5 = move_uploaded_file($_FILES['image5']['tmp_name'], "images/" . $chemin5);
											if ($resultat5)
											{
											   $image5 = $chemin5;
											}
											else{
												$_SESSION['flash']['danger'] = "erreur d'importation de l'image 5";
							
												header('Location: index.php');
								                exit();
										    }
										}
										else{
						
										 $_SESSION['flash']['danger'] = "Format de l'image 5 non pris en charge";
								         header('Location: index.php');
										exit();
										}
									}

								else
								{
			
								 $_SESSION['flash']['danger'] = "image 5 trop grande";
								header('Location: index.php');
								exit();
								}

						}/*end if file*/
						else{
							    $img = $bdd->query("SELECT photo FROM ass_gen WHERE id = 5 ");
								 $image = $img->fetch();
							     $image5 = $image->photo;
						    }
				         if(isset($_POST['prenom5'])AND (isset($_POST['nom5'])))
						{
										 $prenom5 = htmlspecialchars($_POST['prenom5']); 
										 $nom5 = htmlspecialchars($_POST['nom5']); 	
								         $req5 = $bdd->prepare("UPDATE ass_gen SET prenom = ?, nom = ?, photo = ? WHERE id = 5 ");
										 $req5->execute([$prenom5, $nom5, $image5]);
					    }/*end if noms*/	
					    else{
								 $_SESSION['flash']['danger'] = "verifier bien les identitées 5";
						         header('Location: index.php');
								exit();
								}
								/*end if 5*/
								/*debut 6*/
							if (isset($_FILES['image6']) AND !empty($_FILES['image6']['name']))
						{ 
							    $taille6 = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image6']['size'] <= $taille6)
									{
										
					               
										$extension6 = strtolower(substr(strrchr($_FILES['image6']['name'], '.'), 1));
										if (in_array($extension6, $extensionvalid))
										{
										$chemin6 = "images6" . "." . $extension6;

										$resultat6 = move_uploaded_file($_FILES['image6']['tmp_name'], "images/" . $chemin6);
											if ($resultat6)
											{
											   $image6 = $chemin6;
											}
											else{
												$_SESSION['flash']['danger'] = "erreur d'importation de l'image 6";
							
												header('Location: index.php');
								                exit();
										    }
										}
										else{
						
										 $_SESSION['flash']['danger'] = "Format de l'image 6 non pris en charge";
								         header('Location: index.php');
										exit();
										}
									}

								else
								{
			
								 $_SESSION['flash']['danger'] = "image 6 trop grande";
								header('Location: index.php');
								exit();
								}

						}/*end if file*/
						else{
							    $img = $bdd->query("SELECT photo FROM ass_gen WHERE id = 6 ");
								 $image = $img->fetch();
							     $image6 = $image->photo;
						    }
				         if(isset($_POST['prenom6'])AND (isset($_POST['nom6'])))
						{
										 $prenom6 = htmlspecialchars($_POST['prenom6']); 
										 $nom6 = htmlspecialchars($_POST['nom6']); 	
								         $req6 = $bdd->prepare("UPDATE ass_gen SET prenom = ?, nom = ?, photo = ? WHERE id = 6 ");
										 $req6->execute([$prenom6, $nom6, $image6]);
										 $_SESSION['flash']['success'] = "modifier avec success";
										 header('Location: index.php');
								         exit();

					    }/*end if noms*/	
					    else{
								 $_SESSION['flash']['danger'] = "verifier bien les identitées 6";
						         header('Location: index.php');
								exit();
								}
								/*end if 6*/


					}/*if(!empty($_POST))*/
					else{
							$_SESSION['flash']['danger'] = "remplissez au moins un champs";
							header('Location: index.php');
							exit();
					}

	}/*isset*/

 ?>