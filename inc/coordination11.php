<?php 

						if (isset($_FILES['image11']) AND !empty($_FILES['image11']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image11']['size'] <= $taille)
									{
										$extension11 = strtolower(substr(strrchr($_FILES['image11']['name'], '.'), 1));
										if (in_array($extension11, $extensionvalid))
										{
										$chemin11 = "coordon11" . "." . $extension11;

										$resultat11 = move_uploaded_file($_FILES['image11']['tmp_name'], "images/" . $chemin11);
											if ($resultat11)
											{
											   $image11 = $chemin11;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =11");
								 $image = $img->fetch();
							     $image11 = $image->photo;
						    }
				         if(isset($_POST['prenom11'])AND (isset($_POST['nom11'])))
						{
										 $prenom11 = htmlspecialchars($_POST['prenom11']); 
										 $nom11 = htmlspecialchars($_POST['nom11']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 11 ");
										 $req->execute([$prenom11, $nom11, $image11]);
					    }
					    /*end if noms*/	
					    /*end if 11*/

 ?>