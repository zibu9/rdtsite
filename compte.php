  <?php
  session_start();
 header('content-type: text/html; charset=utf-8');
   ?>
<?php
require_once 'base2.php';
 ?>

       <!DOCTYPE html>
<html lang="fr">
<head>
            <meta http-equiv="content-Type" content="text/html; charset=UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="css.css">
            <link rel="stylesheet" href="css/all.css">
            <link rel="stylesheet" href="css/bootstraps.css">
            <link rel="stylesheet" href="css/mdbs.css">
            <link rel="icon" type="image/x-icon" href="images/logrdt.jpg">
            
            <title>::Bienvenue sur RDT</title>
                                        
</head>
<body id="haut" style="background-color:#f2f3f5;"> 
   <?php if (isset($_SESSION['auth'])) { ?>
 <?php include('modal.html'); ?>
          <div class="nav-scroller bg-white shadow-sm">
      <div class="container-fluid">
        <nav class="nav  nav-underline">
            <h4 class="text-primary font-weight-bold">
              <a class="text-primary font-weight-bold" data-toggle="collapse" href="#collapseExample" role="button">
                <img src="<?php echo $_SESSION['auth']->image; ?>" style="border-radius: 100%;border: 1px solid #007bff;" class="mr-2" width="60px" height="60px"><?php if ($_SESSION['auth']->genre == 'Homme') {
                      echo "Mr";
                    } else{echo "Mme";} ?> <?php echo $_SESSION['auth']->nom; ?></a></h4>

                <?php if (empty($_SESSION['admin'])) {?>
                 
                <a class="nav-link" data-toggle="collapse" href="#collapseExample1" role="button"><span class="badge badge-pill bg-success">Poser une question</span></a> <a class="nav-link" href="messagerie.php"><span class="badge badge-pill bg-success">Réponses</span></a>  <?php } ?>
                    <?php if ((($_SESSION['auth']->id <= 5)) AND empty($_SESSION['admin'])) {?>

                        <a class="nav-link active"  data-toggle="modal" href="#exampleModal2"><span class="badge badge-pill bg-success">Se connecter en tant qu'administrateur</span></a>
                    <?php } ?>
                        <?php if ((($_SESSION['auth']->id <= 5)) AND !empty($_SESSION['admin'])) {?>

                        <a class="nav-link" href="#msg"><span class="badge badge-pill bg-success">Messages</span></a>
                         <a class="nav-link active" href="deconne_a.php"><span class="badge badge-pill bg-danger">Déconnexion administrateur</span></a>
                    <?php } ?>
                     <?php if ((($_SESSION['auth']->id == 1)) AND !empty($_SESSION['admin'])) {?>
                        <a class="nav-link active"  data-toggle="modal" href="#exampleModal3"><span class="badge badge-pill bg-success">Changer le mot de 
                        passe_administration</span></a>
                    <?php } ?>

            <a class="nav-link active"  data-toggle="modal" href="#exampleModal"><span class="badge badge-pill bg-success">Modifier le mot de passe</span></a>
            <a class="nav-link" href="deconne.php"><span class="badge badge-pill bg-danger">Déconnexion</span></a>
        </nav>
      </div>
    </div>
    </div>  
    <div class="container">
           <div class="row">
            
           
                      <div class="col-lg-12 col-md-12 col-sm-12">
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
                      </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <br>
                </div>
                 </div>
           <?php if (($_SESSION['auth']->id <= 5) AND !empty($_SESSION['admin'])) {?>
              <div class="connainer"> 
                       <div class="row">
                          <div class="col-lg-4 col-md-5">
                            
                          </div>
                   <div class="col-lg-4 col-md-4">
                              <u><h2 id="msg" class="font-weight-bold text-center">Messages</h2></u> 
                    <?php
                        $message = $bdd->query ('SELECT id, id_us, prenom, nom, photo, question, DATE_FORMAT(ladate, \'%d/%m/%Y à %H:%i\')AS ladate  FROM questions_reponses ORDER BY id DESC');
                           while ($donnees = $message->fetch()) 
                                {  

                                 if (!empty($donnees->question))
                                  {?>   
                              <div class="container">
                                <div class="alert alert-success" role="alert">
                                   <div class="media">
                                   <a class="mr-3" href="http://localhost/rdtretouche/message_ad.php?id_us=<?=$donnees->id_us; ?>&prenom=<?= $donnees->prenom; ?>"><img src="<?php echo($donnees->photo);?>" style="border-radius: 100%;border: 1px solid #007bff;" width="50px" height="50px">
                                    <div class="media-body">
                                      <h5 class="mb-1 mt-0"> <?php echo($donnees->prenom.' '.$donnees->nom);?></h5>
                                         </a> 
                                    <hr>
                                    <p class="mb-0"><small class="text-muted">  <?php echo($donnees->ladate);?></small> </p>
                                  </div>
                                 </div>
                                     
                                 </div> <br> 
                          </div>
                         
                          <div class="col-lg-4 col-md-4"></div>
                  <?php }
                  }/*end while*/
                  ?>
                            </div>
                        </div>
                    <?php } ?>
                  </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="collapse" id="collapseExample">
                          <div class="card-body  alert-primary">
                               <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2 class=" text-center">
                          Modifications des informations
                        </h2>
                    </div>

                           <form action="change_inf.php" method="POST" class="form-signin" enctype="multipart/form-data">
                                    <div class="row">
                                  <div class="form-label-group col-lg-6">
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['auth']->prenom; ?>" name="nom1" placeholder="Prénom" maxlength="15">
                                    <label>Prénom</label>
                                  </div>
                                   <div class="form-label-group col-lg-6">
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['auth']->nom; ?>" name="nom2" placeholder="Nom" maxlength="15">
                                    <label>Nom</label>
                                  </div>
                                    <div class="form-label-group col-lg-6">
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['auth']->postnom; ?>" name="nom3" placeholder="Postnom" maxlength="15">
                                    <label>Postnom</label>
                                  </div>
                                   <div class="form-label-group col-lg-6">
                                    <div class="checkbox mb-3">
                                      <input type="radio" name="genre" value="Homme"> Homme <input type="radio" name="genre" value="Femme"> Femme
                                  </div>
                                  </div>
                                   <div class="form-label-group col-lg-6">
                                    <input type="date" class="form-control" value="<?php echo $_SESSION['auth']->naissance; ?>" name="nais" placeholder="Date de naissance">
                                    <label>Date de naissance</label>
                                  </div>
                                  <div class="form-label-group col-lg-6">
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['auth']->ville; ?>" name="ville" placeholder="Ville">
                                    <label>Ville</label>
                                  </div>
                                  <div class="form-label-group col-lg-12">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input">
                                        <label class="custom-file-label">Choisir une photo de profile...</label>
                                      </div>
                                  </div>
                                  <div class="form-label-group text-center col-lg-12">
                                    <br>
                                   <button class="main-button pull-right" type="submit">Enregistrer</button>
                                   </div>
                                  </div>
                                </form>

                          </div>
                        </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
           
                     <div class="collapse" id="collapseExample1">
                          <div class="card-body  alert-primary">
                               <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2 class=" text-center">
                          Poser une question aux administrateurs
                        </h2>
                    </div>

                           <form action="question.php" method="POST" class="form-signin">
                                            <!-- contact form -->
                                          <div class="col-md-6">
                                            <div class="contact-form">
                                              <h4>Envoyer un message</h4>
                                              <form>
                                                <textarea class="input" name="message" placeholder="Entrer votre Message"></textarea>
                                                <button type="submit" class="main-button icon-button pull-right">Envoyer</button>
                                              </form>
                                            </div>
                                          </div>
                                          <!-- /contact form -->
                                </form>

                          </div>
                        </div>
          </div>
          </div>
      </div>
             <?php } 
            else{ $_SESSION['flash']['danger'] = "vous devez d'abord vous connecter";
                    header('location: adhesion.php');
                     exit();
                 }
                 ?>
      <?php 
      include("rdtfooter.php"); 
       ?>