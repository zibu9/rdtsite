<?php 

						if (isset($_FILES['image13']) AND !empty($_FILES['image13']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image13']['size'] <= $taille)
									{
										$extension13 = strtolower(substr(strrchr($_FILES['image13']['name'], '.'), 1));
										if (in_array($extension13, $extensionvalid))
										{
										$chemin13 = "coordon13" . "." . $extension13;

										$resultat13 = move_uploaded_file($_FILES['image13']['tmp_name'], "images/" . $chemin13);
											if ($resultat13)
											{
											   $image13 = $chemin13;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =13");
								 $image = $img->fetch();
							     $image13 = $image->photo;
						    }
				         if(isset($_POST['prenom13'])AND (isset($_POST['nom13'])))
						{
										 $prenom13 = htmlspecialchars($_POST['prenom13']); 
										 $nom13 = htmlspecialchars($_POST['nom13']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 13 ");
										 $req->execute([$prenom13, $nom13, $image13]);
					    }
					    /*end if noms*/	
					    /*end if 13*/

 ?>