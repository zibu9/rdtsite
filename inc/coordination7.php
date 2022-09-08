<?php 

						if (isset($_FILES['image7']) AND !empty($_FILES['image7']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image7']['size'] <= $taille)
									{
										$extension7 = strtolower(substr(strrchr($_FILES['image7']['name'], '.'), 1));
										if (in_array($extension7, $extensionvalid))
										{
										$chemin7 = "coordon7" . "." . $extension7;

										$resultat7 = move_uploaded_file($_FILES['image7']['tmp_name'], "images/" . $chemin7);
											if ($resultat7)
											{
											   $image7 = $chemin7;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =7");
								 $image = $img->fetch();
							     $image7 = $image->photo;
						    }
				         if(isset($_POST['prenom7'])AND (isset($_POST['nom7'])))
						{
										 $prenom7 = htmlspecialchars($_POST['prenom7']); 
										 $nom7 = htmlspecialchars($_POST['nom7']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 7 ");
										 $req->execute([$prenom7, $nom7, $image7]);
					    }
					    /*end if noms*/	
					    /*end if 7*/

 ?>