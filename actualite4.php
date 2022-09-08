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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top"> <a class="navbar-brand js-scroll-trigger" href="index.php">  
  <div class="container">
        <h3 class="text-white"><img src="images/logrdt.jpg" class="mr-2"width="50px" height="40px">
       RDT</h3></a> 
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
                  <span class="navbar-toggler-icon"></span> </button> <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                 
            <ul class="navbar-nav ml-auto">
             <li class="nav-item bg-dark"> <a class="nav-link js-scroll-trigger" href="index.php"><i class="fas fa-home"></i>Accueil</a>
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
                </div></div>
  </nav>
                <div class="container">
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
                                                  <section class="row container">
                         <?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<= 5) AND isset($_SESSION['admin'])) { ?>
                          <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#actualite">Ajouter l'actualité</button>
                            <br><br>
              <?php } ?>
                    </section> 
                                  <div class="col-lg-12 col-md-12 col-sm-12 p-2 text-black">
              <h4 class=" text-center text-danger font-weight-bold">
              <u> ACTUALITES</u>
              </h4>
          </div>
                    <section class="row">
                    <?php
                        $message = $bdd->query ('SELECT id, badge, titre, photo, details, DATE_FORMAT(ladate, \'%d/%m/%Y à %H:%i\')AS ladate  FROM actualite ORDER BY id DESC LIMIT 27,36');
                           while ($donnees = $message->fetch()) 
                                {  

                                  ?>
                                         <div class="col-lg-4 col-sm-12 col-md-6 col-xs-1 mt-2">
                                              <span class="badge badge-danger"><?php echo $donnees->badge;?></span>
                                                 <!-- Card Light -->
                                              <div class="card">
                                                <!-- Card image -->
                                                <div class="view overlay">
                                                  <!--<a href="http://localhost/rdtretouche/details.php?id=<?=$donnees->id; ?>&titre=<?=$donnees->titre; ?>"> -->
                                                     <a href="https://zibu.000webhostapp.com/rdt/details.php?id=<?=$donnees->id; ?>&titre=<?=$donnees->titre; ?>">
                                                    <img class="card-img-top" src="images/img/<?php echo $donnees->photo;?>" style="height:200px;">
                                                  
                                                    <div class="mask rgba-white-slight"></div>
                                                  </a>
                                                </div>

                                                <!-- Card content -->
                                                <div class="card-body">
                                                 <!-- Title -->
                                                  <h5 class="card-title font-weight-bold">
                                                           <?php
                                                       echo
                                                       $donnees->titre;
                                                    ?></h5>
                                                    <small class="text-muted"><i class="far fa-clock"></i> <?php echo($donnees->ladate);?></small>
                                                  <hr>
                                                  <!-- Link -->
                                                  <a href="http://localhost/rdtretouche/details.php?id=<?=$donnees->id; ?>&titre=<?=$donnees->titre; ?>" class="black-text d-flex justify-content-end">
                                                    <!-- <a href="https://zibu.000webhostapp.com/rdt/details.php?id=<?=$donnees->id; ?>&titre=<?=$donnees->titre; ?>" class="black-text d-flex justify-content-end"> -->
                                                    <h6>Lire plus <i class="fas fa-angle-double-right"></i></h6></a>
                                                </div>
                                              </div>      
                                          <br>
                                         </div>

                          <?php } ?>
                    </section>
     
                </div>
                      <div class="container"> 
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                          <li class="page-item">
                                            <a class="page-link" href="actualite3.php">Page precedente</a>
                                          </li>
                                          <li class="page-item disabled">
                                            <a class="page-link" href="actualite5.php">Page suivante</a>
                                          </li>
                                        </ul>
                                      </nav>
                        </div>

                                 <footer class="page-footer font-small blue-grey lighten-5 ">
                                <div class="bg-primary">
                                  <div class="container">
                              
                                    <!-- Grid row-->
                                    <div class="row py-4 d-flex align-items-center">
                              
                                      <!-- Grid column -->
                                      <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                                        <h6 class="text-white mb-0">Regoignez nous sur les reseaux sociaux</h6>
                                      </div>
                                      <!-- Grid column -->
                              
                                      <!-- Grid column -->
                                      <div class="col-md-6 col-lg-7 text-center text-md-right">
                              
                                        <!-- Facebook -->
                                        <a class="fb-ic">
                                          <i class=" fab fa-facebook-f white-text mr-4 fa-2x "> </i>
                                        </a>
                                        <!-- Twitter -->
                                        <a class="tw-ic">
                                          <i class="fab fa-twitter white-text mr-4 fa-2x  blue-text"> </i>
                                        </a>
                                        <!-- Google +-->
                                        <a class="gplus-ic">
                                          <i class="fab fa-google-plus-g white-text mr-4 fa-2x  red-text"> </i>
                                        </a>
                                            <!-- Whatsapp -->
                                            <a class="yt-ic">  
                                              <i class="fab fa-youtube white-text mr-4 fa-2x"> </i>
                                            </a>

                                      </div>
                                      <!-- Grid column -->
                              
                                    </div>
                                    <!-- Grid row-->
                              
                                  </div>
                                </div>
                              
                                  <!-- Footer Links -->
                                <div class="container text-center text-md-left mt-5">
                              
                                  <!-- Grid row -->
                                  <div class="row mt-3 dark-grey-text">
                              
                                    <!-- Grid column -->
                                    <div class="col-md-6 col-lg-6 col-xl-6 mb-4">
                                      <!-- Content -->
                                      <h6 class="text-uppercase font-weight-bold">Rassemblement des Democrates Tshisekedistes</h6>
                                      <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                      <p>ce site vous permet de visualiser l'actualité de notre leader en particulier  et du parti RDT en generale.</p>
                                  </div>
                                    <!-- Grid column -->
                              
                                    <!-- Grid column -->
                                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                              
                                      <!-- Links -->
                                      <h6 class="text-uppercase font-weight-bold">Menu Rapide</h6>
                                      <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                      <p>
                                        <a class="dark-grey-text js-scroll-trigger" href="#home">Accueil</a>
                                      </p>
                                      <p>
                                        <a class="dark-grey-text" href="actualite.php">Actualité</a>
                                      </p>
                                      <p>
                                        <a class="dark-grey-text js-scroll-trigger" href="#haut">Haut</a>
                                      </p>
                                    </div>
                                    <!-- Grid column -->
                            
                                    <!-- Grid column -->
                                    <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-md-0 mb-4">
                              
                                      <!-- Links -->
                                      <h6 class="text-uppercase font-weight-bold">Contact</h6>
                                      <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                      <p>
                                        <i class="fas fa-home mr-3"></i> KITAMBO, RUFUDJI 006, KINSHASA</p>

                                      <p>
                                        <i class="fas fa-envelope mr-3"></i><a href="mailto:" style="color: black;"> info@gmail.com </a></p>
                                      <p>
                                        <i class="fas fa-phone mr-3"></i> +243850070961</p>
                                      <p>
                                        <i class="fas fa-phone mr-3"></i> +243821657202</p>
                                    </div>
                                    <!-- Grid column -->
                              
                                  </div>
                                  <!-- Grid row -->
                              
                                </div>
                                <!-- Footer Links -->
                              
                              
                                <!-- Copyright -->
                                <div class="footer-copyright text-center footer-text-white-50 py-3 bg-dark">© 2020 Copyright RDT designed by
                                  <a class="white-text" href="https://zibu.000webhostapp.com"> zibu_l'international</a>
                                </div>
                                <!-- Copyright -->
                              
                              </footer>
                              <!-- Footer -->  
 <div class="modal fade bd-example-modal-xl bg-dark" id="actualite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modification_histoire">Ajouter l'actualité</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="actualite_post.php" method="POST"  enctype="multipart/form-data">
                <div class="row">                                             
                  <div class="form-label-group col-lg-8 col-md-8 col-sm-8">
                          <div class="custom-file">
                              <input type="file" name="image" class="custom-file-input">
                              <label class="custom-file-label">Choisir l'image...</label>
                            </div>
                       </div>
                       <br><br>
                </div>
                <div class="container-fluid">
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
                              <textarea class="titre" name="titre" maxlength="180" placeholder="Entrer le titre"></textarea>
                           </div>
                       </div>
                      <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="badge" id="exampleRadios1" value="RDT" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                  RDT
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="badge" id="exampleRadios2" value="Le mininistre">
                                <label class="form-check-label" for="exampleRadios2">
                                  Le mininistre
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="badge" id="exampleRadios3" value="Actualité">
                                <label class="form-check-label" for="exampleRadios3">
                                 Actualité
                                </label>
                              </div>
                       </div>
                </div>
              </div>
                  <div class="container-fluid">
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
                              <textarea class="modales" name="details" placeholder="Entrer le details de l'actualité"></textarea>
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
                        <script src="js/jquery.js"></script>
                        <script src="js/bootstrap.js"></script>
                         <script src="js/mdb.js"></script>
                        <script src="js/all.js"></script>
                        <script type="text/javascript" src="js/popper.js"></script>
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
              height: 100px;
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
</body>
</html>