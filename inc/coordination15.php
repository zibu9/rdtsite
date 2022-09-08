<?php 

						if (isset($_FILES['image15']) AND !empty($_FILES['image15']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image15']['size'] <= $taille)
									{
										$extension15 = strtolower(substr(strrchr($_FILES['image15']['name'], '.'), 1));
										if (in_array($extension15, $extensionvalid))
										{
										$chemin15 = "coordon15" . "." . $extension15;

										$resultat15 = move_uploaded_file($_FILES['image15']['tmp_name'], "images/" . $chemin15);
											if ($resultat15)
											{
											   $image15 = $chemin15;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =15");
								 $image = $img->fetch();
							     $image15 = $image->photo;
						    }
				         if(isset($_POST['prenom15'])AND (isset($_POST['nom15'])))
						{
										 $prenom15 = htmlspecialchars($_POST['prenom15']); 
										 $nom15 = htmlspecialchars($_POST['nom15']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 15 ");
										 $req->execute([$prenom15, $nom15, $image15]);
					    }
					    /*end if noms*/	
					    /*end if 15*/

 ?>