<?php 

						if (isset($_FILES['image2']) AND !empty($_FILES['image2']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image2']['size'] <= $taille)
									{
										$extension2 = strtolower(substr(strrchr($_FILES['image2']['name'], '.'), 1));
										if (in_array($extension2, $extensionvalid))
										{
										$chemin2 = "coordon2" . "." . $extension2;

										$resultat2 = move_uploaded_file($_FILES['image2']['tmp_name'], "images/" . $chemin2);
											if ($resultat2)
											{
											   $image2 = $chemin2;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =2");
								 $image = $img->fetch();
							     $image2 = $image->photo;
						    }
				         if(isset($_POST['prenom2'])AND (isset($_POST['nom2'])))
						{
										 $prenom2 = htmlspecialchars($_POST['prenom2']); 
										 $nom2 = htmlspecialchars($_POST['nom2']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 2 ");
										 $req->execute([$prenom2, $nom2, $image2]);
					    }

 ?>