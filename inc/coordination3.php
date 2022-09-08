<?php 

						if (isset($_FILES['image3']) AND !empty($_FILES['image3']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image3']['size'] <= $taille)
									{
										$extension3 = strtolower(substr(strrchr($_FILES['image3']['name'], '.'), 1));
										if (in_array($extension3, $extensionvalid))
										{
										$chemin3 = "coordon3" . "." . $extension3;

										$resultat3 = move_uploaded_file($_FILES['image3']['tmp_name'], "images/" . $chemin3);
											if ($resultat3)
											{
											   $image3 = $chemin3;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =3");
								 $image = $img->fetch();
							     $image3 = $image->photo;
						    }
				         if(isset($_POST['prenom3'])AND (isset($_POST['nom3'])))
						{
										 $prenom3 = htmlspecialchars($_POST['prenom3']); 
										 $nom3 = htmlspecialchars($_POST['nom3']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 3 ");
										 $req->execute([$prenom3, $nom3, $image3]);
					    }
					    /*end if noms*/	
					    /*end if 3*/

 ?>