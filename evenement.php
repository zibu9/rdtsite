  <?php
  session_start();
 header('content-type: text/html; charset=utf-8');
   ?>
  <?php
   require_once 'base2.php';?>
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
 <a class="navbar-brand js-scroll-trigger" href="#"> 
   <div class="container">
        <h3 class="text-white"><img src="images/logrdt.jpg" class="mr-2"width="50px" height="40px">
       RDT</h3></a> 
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
                  <span class="navbar-toggler-icon"></span> </button> <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                 
            <ul class="navbar-nav ml-auto">
	             <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="index.php"><i class="fas fa-home"></i>Accueil</a>
	              </li>
                                <li class="nav-item active"> 
                              <a class="nav-link" href="evenement.php">
                               <i class="fas fa-calendar-week"></i> Agenda </a> 
                               </li> 
                            <li class="nav-item"> 
                            <a class="nav-link " href="actualite.php" role="button">
                               <i class="far fa-newspaper"></i> Actualités </a> 
                             </li>
                            <li class="nav-item"> 
                               <a class="nav-link " href="leader.php"> 
                            	  <i class="fas fa-crown"></i> Notre Leader </a> 
                             </li> 
              </ul>
                </div>
  </nav>
                                              <?php if (isset($_SESSION['flash'])): ?>
                                                 
                                                      <?php foreach($_SESSION['flash'] as $type=> $message): ?>
                                                        <div class="col-xs-1 col-sm-12 col-md-4">
                                                        <div class="text-<?= $type; ?>">
                                                         <h4><?= $message; ?></h4>   
                                                        </div>
                                                      <?php endforeach; ?>
                                                      <?php unset($_SESSION['flash']); ?>
                                                   </div>
                                                  <?php endif; ?>
            <?php  $reponse = $bdd->query('SELECT id, photo, DATE_FORMAT(ladate, \'%d/%m/%Y\')AS ladate, DATE_FORMAT(heure, \'%H:%i\')AS lheure, titre, details  FROM evenement WHERE ladate > CURRENT_DATE() ');
                           $verification = $reponse->rowCount();
                          if ($verification) 
                          {

                              while ($donnees = $reponse->fetch()) 
                               {?> 
                                        
                                        <br>
                          <div class="container-fluid">
                            <div class="media">
                        <img style="width:240px;height: 200px;" src="images/img/<?=$donnees->photo;?>" class="align-self-start mr-3">
                        <div class="media-body">
                          <h4 class="mt-0"><?=$donnees->titre;?></h4>
                          <p> <?=$donnees->details;?></p>
                          <h5 class="text-muted">En date du : <?=$donnees->ladate;?> prévu à : <?=$donnees->lheure;?></h5>
                        </div>
                      </div>
                          </div>                   
                          <?php } } 
                          else
                          {
                          ?>
                              <div class="container">
                                    <br>
                              <div class="alert alert-danger" role="alert">
                              <h4 class="alert-heading">Oup's</h4>
                              <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                              </div>
                              <p>  Pas d'évenements en approche à afficher </p>
                              <hr>
                              <p class="mb-0">Aucun n'evenements n'a été signaler </p>
                            </div>
                          </div>

                        <?php } ?>
  <br> <section class="row">
            <div class="container">
              <?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<= 5) AND isset($_SESSION['admin'])) { ?>
                  <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#evenement">Ajouter un évènement</button>
                  <br><br>
                <?php } ?>
            </div>
        </section>


   <div class="modal fade bd-example-modal-xl" id="evenement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modification_histoire">Ajoutez un évenement</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="evenement_post.php" method="POST"  enctype="multipart/form-data">
                <div class="row">                                             
                  <div class="form-label-group col-lg-8 col-md-8 col-sm-8">
                          <div class="custom-file">
                              <input type="file" name="image" class="custom-file-input">
                              <label class="custom-file-label">Choisir l'image...</label>
                            </div>
                       </div>
                       <br>
                      <div class="col-lg-8 col-md-8 col-sm-8">
                         <div class="row container-fluid">
                        <div class="col-lg-5 col-md-5 col-sm-8">
                        <div class="form-group">
                            <label>Choisir la date de l'evenement</label>
                            <input type="date"  name="ladate" class="form-control form-sm">
                          </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12"></div>
                            <div class="col-lg-5 col-md-5 col-sm-8">
                           <div class="form-group">
                            <label>Inserer l'heure de l'evenement</label>
                            <input type="Time"  name="lheure" class="form-control form-sm">
                          </div>
                        </div>
                        </div>
                       </div>
                       <br>
                       <br>
                </div>
                <div class="container-fluid">
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
                              <textarea class="titre" name="titre" maxlength="180" placeholder="Entrer le titre"></textarea>
                           </div>
                       </div>
                </div>
              </div>
                  <div class="container-fluid">
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
                              <textarea class="modales" name="details" placeholder="Entrer le details de l'évènement"></textarea>
                           </div>
                       </div>
                </div>
              </div>
                  <div class="modal-footer">
                    <input type="submit" value="Ajouter" class="btn-s main-button pull-right"/>
                     </div>   
              </form>
         
          </div>
        </div>
      </div>

                       <style type="text/css">
            .nav-scroller .nav
          {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            padding-top: 6rem;
            margin-top: 1px;
            overflow-x: auto;
            color: rgba(255, 255, 255, .75);
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
          }
            .contact-form textarea.input
          {
              height: 200px;
          }
          .contact-form .input 
          {
              margin-bottom: 20px;
          }
            textarea.modales 
              {
              height: 200px;
              width: 100%;
              border: 1px solid black;
              border-radius: 4px;
              background: black;
              color: white;
              padding-left: 15px;
              padding-right: 15px;
              -webkit-transition: 0.2s border-color;
              transition: 0.2s border-color;
          }
            textarea.titre
              {
              height: 60px;
              width: 100%;
              border: 1px solid black;
              border-radius: 4px;
              background: black;
              color: white;
              padding-left: 15px;
              padding-right: 15px;
              -webkit-transition: 0.2s border-color;
              transition: 0.2s border-color;
          }
               input.input
              {
              height: 40px;
              width: 200%;
              border: 1px solid black;
              border-radius: 4px;
              background: black;
              color: white;
              padding-left: 15px;
              padding-right: 15px;
              -webkit-transition: 0.2s border-color;
              transition: 0.2s border-color;
          }
                textarea {
              -webkit-writing-mode: horizontal-tb !important;
              text-rendering: auto;
              color: -internal-light-dark-color(black, white);
              letter-spacing: normal;
              word-spacing: normal;
              text-transform: none;
              text-indent: 0px;
              text-shadow: none;
              display: inline-block;
              text-align: start;
              -webkit-appearance: textarea;
              background-color: -internal-light-dark-color(white, black);
              -webkit-rtl-ordering: logical;
              flex-direction: column;
              resize: auto;
              cursor: text;
              white-space: pre-wrap;
              overflow-wrap: break-word;
              margin: 0em;
              font: 400 13.3333px Arial;
              border-width: 1px;
              border-style: solid;
              border-color: rgb(169, 169, 169);
              border-image: initial;
              padding: 2px;
          }
          textarea:focus {
              outline-offset: -2px;
          }
          .main-button {
              position: relative;
              display: inline-block;
              padding: 10px 30px;
              background-color:  #007bff;
              border: 2px solid transparent;
              border-radius: 40px;
              color: #FFF;
              -webkit-transition: 0.2s all;
              transition: 0.2s all;
          }
          .btn-s{
            padding: 8px 15px;
          }
          button {
              -webkit-appearance: button;
              -webkit-writing-mode: horizontal-tb !important;
              text-rendering: auto;
              color: buttontext;
              letter-spacing: normal;
              word-spacing: normal;
              text-transform: none;
              text-indent: 0px;
              text-shadow: none;
              display: inline-block;
              text-align: center;
              align-items: flex-start;
              cursor: default;
              background-color: buttonface;
              box-sizing: border-box;
              margin: 0em;
              font: 400 13.3333px Arial;
              padding: 1px 6px;
              border-width: 2px;
              border-style: outset;
              border-color: buttonface;
              border-image: initial;
          }
          .main-button:hover, .main-button:focus {
              background-color: #fff;
              border: 2px solid #007bff;
              color: #007bff;
          }
          .main-button.icon-button:hover, .main-button.icon-button:focus {
              padding-right: 45px;
          }
  </style>
                          <script src="js/jquery.js"></script>
                        <script src="js/bootstrap.js"></script>
                         <script src="js/mdb.js"></script>
                        <script src="js/all.js"></script>
                        <script type="text/javascript" src="js/popper.js"></script>
    </body>
</html>

