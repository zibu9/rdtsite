<?php 

						if (isset($_FILES['image5']) AND !empty($_FILES['image5']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image5']['size'] <= $taille)
									{
										$extension5 = strtolower(substr(strrchr($_FILES['image5']['name'], '.'), 1));
										if (in_array($extension5, $extensionvalid))
										{
										$chemin5 = "coordon5" . "." . $extension5;

										$resultat5 = move_uploaded_file($_FILES['image5']['tmp_name'], "images/" . $chemin5);
											if ($resultat5)
											{
											   $image5 = $chemin5;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =5");
								 $image = $img->fetch();
							     $image5 = $image->photo;
						    }
				         if(isset($_POST['prenom5'])AND (isset($_POST['nom5'])))
						{
										 $prenom5 = htmlspecialchars($_POST['prenom5']); 
										 $nom5 = htmlspecialchars($_POST['nom5']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 5 ");
										 $req->execute([$prenom5, $nom5, $image5]);
					    }
					    /*end if noms*/	
					    /*end if 5*/

 ?>