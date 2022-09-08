<?php 

						if (isset($_FILES['image1']) AND !empty($_FILES['image1']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image1']['size'] <= $taille)
									{
										$extension1 = strtolower(substr(strrchr($_FILES['image1']['name'], '.'), 1));
										if (in_array($extension1, $extensionvalid))
										{
										$chemin1 = "mam1" . "." . $extension1;

										$resultat1 = move_uploaded_file($_FILES['image1']['tmp_name'], "images/" . $chemin1);
											if ($resultat1)
											{
											   $image1 = $chemin1;
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
								 $img = $bdd->query("SELECT photo FROM coord_mam WHERE id =1");
								 $image = $img->fetch();
							     $image1 = $image->photo;
						    }
				         if(isset($_POST['prenom1'])AND (isset($_POST['nom1'])))
						{
										 $prenom1 = htmlspecialchars($_POST['prenom1']); 
										 $nom1 = htmlspecialchars($_POST['nom1']); 	
								         $req = $bdd->prepare("UPDATE coord_mam SET prenom = ?, nom = ?, photo = ? WHERE id = 1 ");
										 $req->execute([$prenom1, $nom1, $image1]);
					    }

 ?>