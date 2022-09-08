<?php 

						if (isset($_FILES['image4']) AND !empty($_FILES['image4']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image4']['size'] <= $taille)
									{
										$extension4 = strtolower(substr(strrchr($_FILES['image4']['name'], '.'), 1));
										if (in_array($extension4, $extensionvalid))
										{
										$chemin4 = "coordon4" . "." . $extension4;

										$resultat4 = move_uploaded_file($_FILES['image4']['tmp_name'], "images/" . $chemin4);
											if ($resultat4)
											{
											   $image4 = $chemin4;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =4");
								 $image = $img->fetch();
							     $image4 = $image->photo;
						    }
				         if(isset($_POST['prenom4'])AND (isset($_POST['nom4'])))
						{
										 $prenom4 = htmlspecialchars($_POST['prenom4']); 
										 $nom4 = htmlspecialchars($_POST['nom4']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 4 ");
										 $req->execute([$prenom4, $nom4, $image4]);
					    }
					    /*end if noms*/	
					    /*end if 4*/

 ?>