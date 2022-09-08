<?php 

						if (isset($_FILES['image10']) AND !empty($_FILES['image10']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image10']['size'] <= $taille)
									{
										$extension10 = strtolower(substr(strrchr($_FILES['image10']['name'], '.'), 1));
										if (in_array($extension10, $extensionvalid))
										{
										$chemin10 = "coordon10" . "." . $extension10;

										$resultat10 = move_uploaded_file($_FILES['image10']['tmp_name'], "images/" . $chemin10);
											if ($resultat10)
											{
											   $image10 = $chemin10;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =10");
								 $image = $img->fetch();
							     $image10 = $image->photo;
						    }
				         if(isset($_POST['prenom10'])AND (isset($_POST['nom10'])))
						{
										 $prenom10 = htmlspecialchars($_POST['prenom10']); 
										 $nom10 = htmlspecialchars($_POST['nom10']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 10 ");
										 $req->execute([$prenom10, $nom10, $image10]);
					    }
					    /*end if noms*/	
					    /*end if 10*/

 ?>