 <?php session_start(); ?>
 <!DOCTYPE html>
<html lang="fr,en">
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
<body>
<nav class="navbar navbar-dark bg-primary sticky-top"> <a class="navbar-brand js-scroll-trigger" href="index.php">
        <h3 class="text-white"><img src="images/logrdt.jpg" class="mr-2"width="50px" height="40px">
       Connexion :</h3></a> 
          <form action="connect.php" method="POST" class="form-inline">
        <div class="form-group mb-2">
         <label for="inputPassword2" class="sr-only">Email</label>
          <input type="mail" name="mail" class="form-control" id="inputPassword2" placeholder="Email">
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <label for="inputPassword2" class="sr-only">Mot de passe</label>
          <input type="password" name="mdp" class="form-control" id="inputPassword2" minlength="4" maxlength="8" placeholder="Password">
        </div>
           <div class="form-check mb-2">
                 
        <label class="form-check-label text-white"><input class="form-check-input" name="remember" type="checkbox" value="1"/>Se souvenir de moi</label>
          </div>
           <div class="form-group mx-sm-3 mb-2">
        <input type="submit" value="Connexion" class="btn btn-sm btn-success">
               <a data-toggle="modal" href="#exampleModal" class="text-white">(Mot de passe oublie ?)</a>
        </div>
      </form>

  </nav>
  <div class="alert-primary">
                          <?php if (isset($_SESSION['flash'])): ?>
                                  <?php foreach($_SESSION['flash'] as $type=> $message): ?>
                                  <div class="container">
                                    <div class="row">
                                      <div class="col-lg-4"></div>
                                 <div class="col-lg-4">
                                    <div class="bg-<?= $type; ?> text-center text-white">
                                     <h6 class="bg-<?= $type; ?>"><?= $message; ?></h6>   
                                    </div>
                                </div>
                                    <div class="col-lg-4"></div>
                                </div>
                            </div>
                                  <?php endforeach; ?>
                                  <?php unset($_SESSION['flash']); ?> 
                              <?php endif; ?>
      <div class="row container-fluid">
                  <div class="col-lg-2">
                    <br>

                  </div>
                  <div class="col-lg-8">
                    
                <div class="col-lg-12 col-md-12 col-sm-12"><br>
                  <h2 class="text-center ">
                    <a class="text-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> Inscription</a>
                  </h2>
              </div>
                  <div class="collapse" id="collapseExample">
                    <div class="card-body  alert-primary">
                     <form action="post.php" method="POST" class="form-signin">
                              <div class="row">
                            <div class="form-label-group col-lg-6">
                              <label class="form-check-label">Adresse Email</label>
                              <input type="email"  class="form-control" name="mail" placeholder="Email"  required autofocus>
                              
                            </div>
                            <div class="form-label-group col-lg-6">
                              <label class="form-check-label">Prénom</label>
                              <input type="text" class="form-control" name="nom1" placeholder="Prénom" maxlength="15" required>
                              
                            </div>
                             <div class="form-label-group col-lg-6">
                              <label class="form-check-label">Nom</label>
                              <input type="text" class="form-control" name="nom2" placeholder="Nom" maxlength="15" required>
                              
                            </div>
                              <div class="form-label-group col-lg-6">
                               <label class="form-check-label">Postnom</label>
                              <input type="text" class="form-control" name="nom3" placeholder="Postnom" maxlength="15" required>
                             
                            </div>
                             <div class="form-label-group col-lg-6">
                              <div class="checkbox mb-3">
                                <input type="radio" required name="genre" value="Homme"> Homme <input type="radio" required name="genre" value="Femme"> Femme
                            </div>
                            </div>

                              <div class="form-label-group col-lg-6">
                              <div class="checkbox mb-3">
                            </div>
                            </div>

                             <div class="form-label-group col-lg-6">
                              <label class="form-check-label">Date de naissance</label>
                              <input type="date" class="form-control" name="nais" placeholder="Date de naissance" required>
                              
                            </div>
                            <div class="form-label-group col-lg-6"> 
                              <label class="form-check-label">Ville</label>
                              <input type="text" class="form-control" name="ville" placeholder="Ville" required>
                             
                            </div>
                                <div class="form-label-group col-lg-6">
                                  <label class="form-check-label">Mot de passe</label>
                              <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" minlength="4" maxlength="8" required> 
                            </div>
                            <div class="form-label-group col-lg-6">
                              <label class="form-check-label">Confirmer le Mot de passe</label>
                              <input type="password" class="form-control" name="mdp2" placeholder="Confirmer mot de passe" minlength="4" maxlength="8" required>
                              
                            </div>
                              <div class="form-label-group col-lg-6">
                              <div class="checkbox mb-3">
                                <input type="checkbox" name="oui" checked="true"> J'accepte <a download href="fichiers/charte.pdf"> les conditions et chartes</a>
                            </div>
                            </div>
                            <div class="form-label-group col-lg-6">
                            </div>
                            <div class="form-label-group text-center col-lg-12">
                             <button class="btn btn-md btn-primary" type="submit">S'inscrire</button>
                             </div>
                            </div>
                          </form>

                    </div>
                  </div>
                                  
                  </div>
                   <div class="col-lg-2">
                    <br>

                  </div>
      </div><br>
      </div>
      <div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Mot de passe oublier</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="reset.php" method="POST">
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Entrer votre email</label>
                        <input type="mail" minlength="4" name="mail" class="form-control" required>
                      </div>  
                       <div class="modal-footer">
                    <input type="submit" value="reinitialiser" class="btn btn-sm btn-primary"/>
                     </div> </div>  
              </form>
          </div>
        </div>
      </div>
                                     <footer class="page-footer font-small blue-grey lighten-5 fixed-bottom">
                                <!-- Copyright -->
                                <div class="footer-copyright text-center footer-text-white-50 py-3 bg-dark">© 2020 Copyright RDT designed by
                                  <a class="white-text" href="https://zibu.000webhostapp.com"> zibu_l'international</a>
                                </div>
                                <!-- Copyright -->
                              
                              </footer>
                              <!-- Footer -->  
                             <script src="js/jquery.js"></script>
                        <script src="js/bootstrap.js"></script>
                         <script src="js/mdb.js"></script>
                        <script src="js/all.js"></script>
                        <script type="text/javascript" src="js/popper.js"></script>
                        <script type="text/javascript">
                            
                            (function($) {
                          "use strict";

                              
                              // Smooth scrolling using jQuery easing
                                $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
                                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                                  var target = $(this.hash);
                                  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                                  if (target.length) {
                                  $('html, body').animate({
                                    scrollTop: (target.offset().top - 54)
                                  }, 1000, "easeInOutExpo");
                                  return false;
                                  }
                                }
                                });
                              
                                // Closes responsive menu when a scroll trigger link is clicked
                                $('.js-scroll-trigger').click(function() {
                                $('.navbar-collapse').collapse('hide');
                                $('.dropdown-menu').dropdown('hide');
                                });
                          })(jQuery);
                          </script>
</body>
</html>                  
          