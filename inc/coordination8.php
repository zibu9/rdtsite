<?php 

						if (isset($_FILES['image8']) AND !empty($_FILES['image8']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image8']['size'] <= $taille)
									{
										$extension8 = strtolower(substr(strrchr($_FILES['image8']['name'], '.'), 1));
										if (in_array($extension8, $extensionvalid))
										{
										$chemin8 = "coordon8" . "." . $extension8;

										$resultat8 = move_uploaded_file($_FILES['image8']['tmp_name'], "images/" . $chemin8);
											if ($resultat8)
											{
											   $image8 = $chemin8;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =8");
								 $image = $img->fetch();
							     $image8 = $image->photo;
						    }
				         if(isset($_POST['prenom8'])AND (isset($_POST['nom8'])))
						{
										 $prenom8 = htmlspecialchars($_POST['prenom8']); 
										 $nom8 = htmlspecialchars($_POST['nom8']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 8 ");
										 $req->execute([$prenom8, $nom8, $image8]);
					    }
					    /*end if noms*/	
					    /*end if 8*/

 ?>