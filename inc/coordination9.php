<?php 

						if (isset($_FILES['image9']) AND !empty($_FILES['image9']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image9']['size'] <= $taille)
									{
										$extension9 = strtolower(substr(strrchr($_FILES['image9']['name'], '.'), 1));
										if (in_array($extension9, $extensionvalid))
										{
										$chemin9 = "coordon9" . "." . $extension9;

										$resultat9 = move_uploaded_file($_FILES['image9']['tmp_name'], "images/" . $chemin9);
											if ($resultat9)
											{
											   $image9 = $chemin9;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =9");
								 $image = $img->fetch();
							     $image9 = $image->photo;
						    }
				         if(isset($_POST['prenom9'])AND (isset($_POST['nom9'])))
						{
										 $prenom9 = htmlspecialchars($_POST['prenom9']); 
										 $nom9 = htmlspecialchars($_POST['nom9']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 9 ");
										 $req->execute([$prenom9, $nom9, $image9]);
					    }
					    /*end if noms*/	
					    /*end if 9*/

 ?>