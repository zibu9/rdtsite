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
<body> 
  <?php if (isset($_SESSION['auth'])){ ?>
  <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary"> <a class="navbar-brand" href="index.php">  <div class="container">
        <h3 class="text-white"><img src="images/logrdt.jpg" class="mr-2"width="50px" height="40px">
       RDT</h3></a> 
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
                  <span class="navbar-toggler-icon"></span> </button> <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
            <ul class="navbar-nav ml-auto"> <li class="nav-item bg-dark"> <a class="nav-link" href="Compte.php"><i class=" fas fa-angle-left"></i>
             Retour</a> </li>

              </ul>
                </div></div>
  </nav>
   <?php if (isset($_SESSION['flash'])): ?>
                                  <?php foreach($_SESSION['flash'] as $type=> $message): ?>
                                    <div class="font-weight-bold h-10 text-center text-<?= $type; ?>">
                                        <h4><?= $message; ?></h4>
                                    </div>
                                  <?php endforeach; ?>
                                  <?php unset($_SESSION['flash']); ?> 
                              <?php endif; ?>

                  <u><h2 class="text-center">Messages</h2></u> 
                  <?php
                if (!empty(($_SESSION['auth'])))
                {
                          $prenom = ($_SESSION['auth']->prenom);
                           $id_us = ($_SESSION['auth']->id);
                           $vers = $bdd->prepare('SELECT * FROM questions_reponses WHERE id_us = :id_us AND prenom = :prenom');
                          $vers->execute(['id_us' => $id_us,'prenom' => $prenom ]);
                          $donnes = $vers->fetch();
                          if ($donnes)
                          {
                            $_SESSION['vers'] = $donnes;
                          }?>
                          <div class="row">
                          <div class="container">
                          <?php
                              $message = $bdd->prepare('SELECT id_us, prenom, nom, photo AS img1, question, DATE_FORMAT(ladate, \'%d/%m/%Y à %H:%i\')AS ladate, reponses, photo_rep AS img2 FROM questions_reponses  WHERE id_us= ? ORDER BY id ASC LIMIT 0,10');
                              $message->execute([$id_us]); 
                            while ($donnees = $message->fetch()) 
                              { 
                            if (!empty($donnees->question))
                                  {?>   
                                  <div class="col-lg-8">                             
                                        <div class="media">
                                    <img src="<?php echo($donnees->img1);?>" style="border-radius: 100%;border: 1px solid #007bff;" class="mr-2" width="60px" height="60px">
                                    <div class="media-body">
                                      <h5 class="mb-1 mt-0">Vous</h5>
                                        <b class="font-weight-bold"><?php echo($donnees->question);?></b><br>
                                         <small class="text-muted">  <?=$donnees->ladate;?></small> 
                                    </div>
                                  </div>
                                </div>  
                                  <?php } 
                             if (!empty($donnees->reponses))
                                  {?>
                                    <div class="col-lg-12">
                                      <div class="media">
                                         <div class="media-body ml-3 text-right">
                                          <h5 class="mt-0 mb-1">Admin</h5>
                                          <b class="font-weight-bold"><?=$donnees->reponses; ?></b><br>
                                          <small class="text-muted">  <?=$donnees->ladate;?></small> 
                                        </div>
                                          <img src="<?=$donnees->img2; ?>" class="ml-2" style="border-radius: 100%;border: 1px solid #007bff;" class="ml-2" width="60px" height="60px">
                                      </div></div>
                                    <?php }
                          ?><br>

 
 <?php       
                        }/*end while*/?>    
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="card-body">
                                            <!-- contact form -->
                                          <div class="col-md-12 col-lg-12 col-sm-12">
                                            <div class="contact-form">
                                              <h4>Répondre</h4>
                                             <form action="question.php" method="POST">
                                                <textarea class="input" name="message" placeholder="Entrer votre Message" style="height: 80px;"></textarea>
                                                <button type="submit" class="main-button icon-button pull-right">Envoyer</button>
                                              </form>
                                            </div>
                                          </div>
                                          <!-- /contact form -->

                          </div>
                        </div>
                       </div>
                       </div>
                      <?php
                  }/*end if get*/
                  else
                  {
                     header('location: index.php');
                      exit();
                  }

                  ?>

<?php 
}/*end if admin*/
                   else
                  {
                     header('location: index.php');
                      exit();
                  }
?>
             <style type="text/css">
                  input.input, textarea 
                  {
                  height: 50px;
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
                    textarea
                   {
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
                        <script src="js/all.js"></script>
                        <script src="js/mdb.js"></script>
                        <script type="text/javascript" src="js/popper.js"></script>
</body>
</html>