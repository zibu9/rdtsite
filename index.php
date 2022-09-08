	<?php   
	 session_start();
   ?>
      <?php 
      include("rdtnav.php"); 
       ?>
       <?php require_once('base.php');
  ?>
   <?php include('modification.php'); ?>
   
					                 <?php if (isset($_SESSION['flash'])): ?>
                                  <?php foreach($_SESSION['flash'] as $type=> $message): ?>
                                  <div class="container">
                                  	<div class="row">
                                  		<div class="col-lg-3"></div>
                                 <div class="col-lg-6">
                                    <div class="bg-<?= $type; ?> text-center text-white alert alert-dismissible fade show">
                                     <h6 class="bg-<?= $type; ?>"><?= $message; ?></h6>   
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
                                    </div>
                                </div>
                                    <div class="col-lg-3"></div>
                                </div>
                            </div>
                                  <?php endforeach; ?>
                                  <?php unset($_SESSION['flash']); ?> 
                              <?php endif; ?>

			<section id="home" class="main-banner" style="background: url('images/rdt.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
			<div class="heading">

					<h1 class="text-white mt-5 mb-0">Bienvenue au RDT</h1> <br>
					<h2 class="text-white mt-0">Rassemblement des Démocrates Tshisekedistes</h2>
					<h3 class="cd-headline clip is-full-width">
					 une plateforme politique et electorale</h3>
						<div class="btn-ber">
						<h4>
							<a class="learn_btn hvr-bounce-to-top js-scroll-trigger" href="#preambule"><i class="fa fa-angle-down"></i> Voir Plus</a>
							<?php if (isset($_SESSION['auth'])) { ?>
							<a class="get_btn hvr-bounce-to-top" href="compte.php"><?php if (isset($_SESSION['admin'])){ ?><i class="fas fa-user-edit ">
							<?php }
								 else
								 {?>  
								 	<i class="fa fa-user">
								 <?php
								 }?> </i> 
								<?php echo ($_SESSION['auth']->prenom .' '. $_SESSION['auth']->nom); ?></a>
								 <?php }
								 else
								 {?> 
								 	
											<a class="get_btn hvr-bounce-to-top" href="Adhesion.php"> <i class="fa fa-user"></i> Membres</a>
								<?php  
											     }
								 ?> 
						</div>
					</h4>
				</div>
			</section>
			
	<div id="preambule" class="container-fluid">
		<section class="row">	<br>
				<div class="col-lg-12 col-md-12 col-sm-12"><br>
							<h3 class=" text-center text-danger font-weight-bold">
								QUI SOMMES-NOUS?
							</h3>
					</div>

						<div class="col-md-12 col-lg-6 col-xl-6 col-sm-12">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators"> <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> 
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> 
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> 
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                         <li data-target="#carouselExampleIndicators" data-slide-to="5"></li> 
                    </ol>
									<div class="carousel-inner">
															<?php 
								  		$img = $sql->query( " SELECT photos_diap FROM `fichiers` ORDER BY id ASC LIMIT 0, 1") ;
								  		          
								   				 while ($donnees = $img->fetch()) 
                                          {
                                          	?>

                                          	<div class="carousel-item active">
												<img src="images/<?php echo $donnees['photos_diap']; ?>" class="d-block w-100" alt="..." style="width:auto;height:280px;">
										</div>
										<?php
											}
											$img->closeCursor();
										?>
										<?php
										$img = $sql->query( " SELECT photos_diap FROM `fichiers` ORDER BY id ASC LIMIT 1, 5") ;
								  		          
								   				 while ($donnees = $img->fetch()) 
                                          {
                                          	echo 
                                      
											'<div class="carousel-item">' . 
												'<img class="d-block w-100" style="width:auto;height:280px;"' . 'src="images/' . $donnees['photos_diap'] . '"></div>';
											}
											$img->closeCursor();
										?>
									</div>
									<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
								</div>
						</div>
						<br>
						
			  <?php 
			  		$req = $sql->query( "SELECT * FROM `titres` WHERE id = 1");
			  		while ( $donnees =$req->fetch())
			  		 {?>
					<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
						<div class="text-justify text-black p-0">
                                         <?php 
                                         	$preambule = $donnees['preambule'];
											$taille = strlen($preambule);
											if ($taille>=930) {

												$text = substr($preambule, 0, 930);
                                             echo $text;
                                           }else{
                                           			echo $donnees['preambule'];
                                           } ?>
                                           
						</div>		
						
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="text-justify text-black p-0">
	                  <?php 
                     	$preambule = $donnees['preambule'];
						$taille = strlen($preambule);
						if ($taille>=930) {

							$text = substr($preambule, 930, 20000);
                         echo $text;
                       } ?> 
                       	</div>      
					</div>
					                 <?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
                                     		<br><br>
                                  <button type="button" class="btn-s main-button pull-right ml-auto" data-toggle="modal" data-target="#modification_preambule">Modifier_preambule</button>
							<?php } ?>
				</section>
		</div>
			<div id="histoire" class="container-fluid">
				<section class="row">
			   <br>
			        <div class="col-lg-12 col-md-12 col-sm-12 p-2 text-black"><br>
							<h3 class=" text-center text-danger font-weight-bold">
							 APERCU HISTORIQUE
							</h3>
					</div>
					
					<div class="col-md-12 col-lg-8 col-sm-12">
						<p class="text-justify text">
								    <?php
								    $histoire = htmlspecialchars($donnees['histoire']);
                                         echo
                                         $histoire;
                                      ?>
						</p>
					</div>
					<br>
					<div class="col-md-12 col-lg-4 col-xl-4 col-sm-12">
						<div class="card">
					    	<img src="images/<?php echo $donnees[('image')]; ?>" class="card-img-top" style=" height: 300px;">
					</div>	 <?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
                                     		<br>
                                  <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#modification_histoire">Modifier_histoire</button>
							<?php } ?>
							</div>
								</section>
							</div>
		<div id="mission" class="container-fluid">
			<section class="row">
					<div class="col-lg-12 col-md-12 p-2 text-black"><br>
							<h3  class="text-center text-danger font-weight-bold">
								MISSION
							</h3>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
					  <p class="text-justify text font-weight-bold">
					  	  <?php echo htmlspecialchars($donnees['mission']);?>
					</p>
						<?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
                     <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#modification_mission">Modifier_mission</button>
							<?php } ?>
					</div>
					</section>
	</div>				
	<div id="objectif" class="container-fluid">
		<section class="row">
					<div class="col-lg-12 col-md-12 p-2 text-black"><br>
							<h3  class="text-center text-danger font-weight-bold">
								OBJECTIFS
							</h3>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
					  	<p class="text-justify text">
					  			  <?php
                                         echo htmlspecialchars($donnees['objectif']);
                                      ?>

						</p>
							 <?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
                           
                                  <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#modification_objectif">Modifier_objectif</button>
                                  	<br><br>
							<?php } ?>
					</div>
					</section>
	</div>		
	
	<div class="p-3  alert-primary">		
	<div id="charte" class="container-fluid" style="width:100%;">
		<section class="row">
				<div class="col-lg-12 col-md-12 p-2 text-black"><br>
									<h3  class=" text-center font-weight-bold">
										CHARTE
									</h3>
							</div>
							<div class="col-md-12 col-lg-12">
							<div class="alert alert-primary" role="alert">
									<h2 id="charte" class=" text-center">
										<a download href="fichiers/charte.pdf"><i class="fas fa-book"></i> Télécharger notre Charte(.PDF<i class="fas fa-file-pdf"></i>)</a>
									</h2>
							</div>
					</div>
			</section>
	</div>
    </div>
	<div id="qui" class="container-fluid">
		<section class="row">
					<div class="col-lg-12 col-md-12 p-2 text-black"><br>
							<h3  class="text-center text-danger font-weight-bold">
								MODALITES D'ADHESION
							</h3>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
					
					   	<p class="text-justify"><?php  echo $donnees['adhesion']; ?></p>
					   		 <?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
                           
                                  <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#modification_condition_adhesion">Modifier_condition_adhesion</button>
                                  	<br><br>
							<?php } ?>
					</div>
		</section>
	</div>
	<?php 
						
							}
							 $req->closeCursor();
						?>
   <div class="p-3 text-white">
			<div class="container-fluid" id="assemble">
				<section class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 p-2 text-black"><br>
							<h3  class="text-center text-danger font-weight-bold">
								ASSEMBLEE GENERALE
							</h3>
					</div>
					<?php 
						$req = $sql->query( "SELECT * FROM `ass_gen` WHERE id = 1");
			  		while ( $donnees =$req->fetch())
			  		 {?>
					 <div class="col-lg-4 col-md-4 col-sm-12">	</div>
					 <div class="col-lg-4 col-md-4 col-sm-12"> <br>
													<!-- Card -->
											<div class="card testimonial-card">
													<!-- Background color -->
													<div class="card-up bg-primary lighten-1"></div>

													<!-- Avatar -->
													<div class="avatar mx-auto white">
														<img src="images/<?php  echo $donnees[('photo')]; ?>" class="rounded-circle" alt="woman avatar">
													</div>

													<!-- Content -->
													<div class="card-body">
													<h4 class="card-title text-dark"><?php  echo $donnees[('role')]; ?></h4>
														<hr>
														<!-- Name -->
														<h4 class="card-title text-dark"><?php  echo $donnees[('prenom')].'   '. $donnees[('nom')];?></h4>
													</div>

											</div>
							<br>
					  			<?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
                           
                                  <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#modification_assemble">Modifier_assemblé</button>
                                  	<br><br>
							<?php } ?>							<!-- Card -->
					 </div>
					 	<div class="col-lg-4 col-md-4 col-sm-12">	</div>
					 	<?php
					 	}
							 $req->closeCursor();
						?>

						</section>
					  </div>
				  </div> 
			
				<div class="p-3 bg-light text-dark">
						<div class="row" id="coordination">	
									<div class="col-lg-12 col-md-12 p-2 text-black"><br>
												<h3  class="text-center text-danger font-weight-bold">
													COORDINATION NATIONALE
												</h3>
									</div>
									<div class="col-lg-4 col-md-12 col-sm-12">
									
									</div>
									<?php
											$req = $sql->query( " SELECT * FROM `coord_nat` ORDER BY id ASC LIMIT 0, 1") ;
  		          
								   				 while ($donnees = $req->fetch()) 
                                          {?>
									
								<div class="col-lg-4 col-md-12 col-sm-12">
													<!-- Card -->
											<div class="card testimonial-card">
													<!-- Background color -->
													<div class="card-up bg-primary lighten-1"></div>

													<!-- Avatar -->
													<div class="avatar mx-auto white">
														<img src="images/<?php  echo $donnees[('photo')]; ?>" class="rounded-circle" alt="woman avatar">
													</div>

													<!-- Content -->
													<div class="card-body">
													<h4 class="card-title"><?php  echo $donnees[('role')]; ?></h4>
														<hr>
														<!-- Name -->
														<h4 class="card-title"><?php  echo $donnees[('prenom')].'   '. $donnees[('nom')];?></h4>
													</div>

											</div>
														<!-- Card -->
										<?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
                                     		<br>
                                  <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#president">Modifier_les_infos</button>
							<?php } ?>
								</div>
						     <?php
									}
									$req->closeCursor();
								?>
									<div class="col-lg-4 col-md-12 col-sm-12"></div>
						</div>		
								<div class="row"><br></div>
								
								<div class="row">
											<table class="table table-dark">
													<thead>
														<tr>
															<th scope="col">#</th>												
															<th scope="col">Rôle</th>
															<th scope="col">Prénom</th>
															<th scope="col">Nom</th>
										<?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
															<th scope="col">Action</th>
															<?php } ?>
														</tr>
													</thead>
													<tbody>
															<?php
											$req = $sql->query( " SELECT * FROM `coord_nat` WHERE id >=2");
  		          
								   				 while ($donnees = $req->fetch()) 
                                          {
                                          	$j = ($donnees[('id')])-1;$i= $j+1;?>
                                             
														   <tr>
															<th scope="row"><?php echo($j);?></th>
															<td> <?php echo($donnees[('role')]); ?></td>
															<td> <?php echo($donnees[('prenom')]); ?></td>
															<td> <?php echo($donnees[('nom')]); ?>  </td>
															<?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
															<td> <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#coordination<?php echo($i);?>">Modifier</button></td>
															<?php } ?>
													      </tr>
								<?php 		}
									$req->closeCursor();
								?>
													</tbody>
												</table>
								</div>
				
				</div>
				<div id="bureau" class="container-fluid row">
					<div class="col-lg-12 col-md-12 p-2 text-black"><br>
							<h3  class="text-center text-danger font-weight-bold">
								BUREAU POLITIQUE
							</h3>
					</div>
					<div class="col-lg-12 col-md-12">
					<div class="text-center">
						<p class="text">Le bureau politique est dirigé par le  <a class="js-scroll-trigger font-weight-bold" href="#coordination"> Coordonateur National</a></p>
						
					</div>
					</div>
	</div>
	<div class="p-3 bg-light text-dark">
								<div class="row" id="cm">
											
						<div class="col-lg-12 col-md-12 p-2 text-black"><br>
									<h3  class="text-center text-danger font-weight-bold">
										CONFEDERATION DES FEMMES
									</h3>
						</div>
										 <div class="col-lg-4 col-md-4 col-sm-12">	</div>
								<?php
											$req = $sql->query( " SELECT * FROM `coord_mam` WHERE id = 1");
  		          
								   				 while ($donnees = $req->fetch()) 
                                          {?>	
						<div class="col-lg-4 col-md-4 col-sm-12">
										<!-- Card -->
										
											<div class="card testimonial-card">
											<!-- Background color -->
											<div class="card-up bg-primary lighten-1"></div>

											<!-- Avatar -->
											<div class="avatar mx-auto white">
												<img src="images/<?php  echo $donnees[('photo')]; ?>" class="rounded-circle" alt="woman avatar">
											</div>

											<!-- Content -->
											<div class="card-body">
											<h4 class="card-title"><?php  echo $donnees[('role')]; ?></h4>
												<hr>
												<!-- Name -->
												<h4 class="card-title"><?php  echo $donnees[('prenom')].'   ' .  $donnees[('nom')]; ?></h4>
											</div>

											</div>
											<!-- Card -->	<br>
								 <?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
                                  <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#modification_maman<?php echo $donnees[('id')];?>">Modifier</button>
                                  	<br><br>
							<?php } ?>
						</div> 
						 <div class="col-lg-4 col-md-4 col-sm-12">	</div>
						<?php 
											}
									$req->closeCursor();
								?>
						<div class="col-lg-1 col-md-1 col-sm-12"></div>
						
								</div>
		</div>
		<div class="p-3 bg-white text-dark">
								<div class="row" id="cnj">	
					<div class="col-lg-12 col-md-12 p-2 text-black"><br>
								<h4  class="text-center text-danger font-weight-bold">
									CONFEDERATION DES JEUNES
								</h4>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-12">
					
					</div>
														<?php
											$req = $sql->query( " SELECT * FROM `coord_jeunes` ORDER BY id ASC");
  		          
								   				 while ($donnees = $req->fetch()) 
                                          {?>	
						<div class="col-lg-4 col-md-4 col-sm-12">
										<!-- Card -->
										
											<div class="card testimonial-card">
											<!-- Background color -->
											<div class="card-up bg-primary lighten-1"></div>

											<!-- Avatar -->
											<div class="avatar mx-auto white">
												<img src="images/<?php  echo $donnees[('photo')]; ?>" class="rounded-circle" alt="woman avatar">
											</div>

											<!-- Content -->
											<div class="card-body">
											<h4 class="card-title"><?php  echo $donnees[('role')]; ?></h4>
												<hr>
												<!-- Name -->
												<h4 class="card-title"><?php  echo $donnees[('prenom')].'   ' .  $donnees[('nom')]; ?></h4>
											</div>

											</div>
											<!-- Card -->	<br>
							  <?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
                                  <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#modification_cne<?php  echo $donnees[('id')];?>">Modifier</button>
                                  	<br><br>
							<?php } ?>

						</div> 
						<div class="col-md-2 col-lg-2"></div>
						<?php 
											}
									$req->closeCursor();
								?>
					<div class="col-lg-1 col-md-1 col-sm-12"></div>

								</div>
		</div>				
	
  <?php include("rdtfooter.php"); ?>