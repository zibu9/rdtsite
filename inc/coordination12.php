<?php 

						if (isset($_FILES['image12']) AND !empty($_FILES['image12']['name']))
						{ 
							    $taille = 20000000; 	
							    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png', "JPG", "JPEG", "GIF","PNG");
								if ($_FILES['image12']['size'] <= $taille)
									{
										$extension12 = strtolower(substr(strrchr($_FILES['image12']['name'], '.'), 1));
										if (in_array($extension12, $extensionvalid))
										{
										$chemin12 = "coordon12" . "." . $extension12;

										$resultat12 = move_uploaded_file($_FILES['image12']['tmp_name'], "images/" . $chemin12);
											if ($resultat12)
											{
											   $image12 = $chemin12;
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
								 $img = $bdd->query("SELECT photo FROM coord_nat WHERE id =12");
								 $image = $img->fetch();
							     $image12 = $image->photo;
						    }
				         if(isset($_POST['prenom12'])AND (isset($_POST['nom12'])))
						{
										 $prenom12 = htmlspecialchars($_POST['prenom12']); 
										 $nom12 = htmlspecialchars($_POST['nom12']); 	
								         $req = $bdd->prepare("UPDATE coord_nat SET prenom = ?, nom = ?, photo = ? WHERE id = 12 ");
										 $req->execute([$prenom12, $nom12, $image12]);
					    }
					    /*end if noms*/	
					    /*end if 12*/

 ?>