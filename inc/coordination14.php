<?php 

						if (isset($_FILES['image14']) AND !empty($_FILES['image14']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image14']['size'] <= $taille)
									{
										$extension14 = strtolower(substr(strrchr($_FILES['image14']['name'], '.'), 1));
										if (in_array($extension14, $extensionvalid))
										{
										$chemin14 = "coordon14" . "." . $extension14;

										$resultat14 = move_uploaded_file($_FILES['image14']['tmp_name'], "images/" . $chemin14);
											if ($resultat14)
											{
											   $image14 = $chemin14;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =14");
								 $image = $img->fetch();
							     $image14 = $image->photo;
						    }
				         if(isset($_POST['prenom14'])AND (isset($_POST['nom14'])))
						{
										 $prenom14 = htmlspecialchars($_POST['prenom14']); 
										 $nom14 = htmlspecialchars($_POST['nom14']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 14 ");
										 $req->execute([$prenom14, $nom14, $image14]);
					    }
					    /*end if noms*/	
					    /*end if 14*/

 ?>