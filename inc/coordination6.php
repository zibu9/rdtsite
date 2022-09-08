<?php 

						if (isset($_FILES['image6']) AND !empty($_FILES['image6']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image6']['size'] <= $taille)
									{
										$extension6 = strtolower(substr(strrchr($_FILES['image6']['name'], '.'), 1));
										if (in_array($extension6, $extensionvalid))
										{
										$chemin6 = "coordon6" . "." . $extension6;

										$resultat6 = move_uploaded_file($_FILES['image6']['tmp_name'], "images/" . $chemin6);
											if ($resultat6)
											{
											   $image6 = $chemin6;
											}
											else{
												$_SESSION['flash']['danger'] = "erreur d'importation de l'image ";
			
												header('Location: index.php');
								                exit();
										    }
										}
										else{
		
										 $_SESSION['flash']['danger'] = "Format de l'image non pris en charge";
								         header('Location: index.php');
										exit();
										}
									}

								else
								{
								 $_SESSION['flash']['danger'] = "image trop grande";
								header('Location: index.php');
								exit();
								}

						}/*end if file*/
						else{
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =6");
								 $image = $img->fetch();
							     $image6 = $image->photo;
						    }
				         if(isset($_POST['prenom6'])AND (isset($_POST['nom6'])))
						{
										 $prenom6 = htmlspecialchars($_POST['prenom6']); 
										 $nom6 = htmlspecialchars($_POST['nom6']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 6 ");
										 $req->execute([$prenom6, $nom6, $image6]);
					    }
					    /*end if noms*/	
					    /*end if 6*/

 ?>