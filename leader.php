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
  <style type="text/css">
    
    /*------------------------------------------------------------------
    SECTIONS
-------------------------------------------------------------------*/

.main-banner{
  height: 100%;
  position: relative;
}

.main-banner{
  display: table;
    width: 100%;
    height: 100%;
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
  -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
}
.main-banner::after {
    content: " ";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #000;
    z-index: 0;
    opacity: 0.8;
}
.heading{
  color: #fff;
  display: table-cell;
  vertical-align: middle;
  position: relative;
  z-index: 1;
}
.heading h1{
  color: #ffffff;
  font-weight: 700;
  font-size: 62px;

}
.heading p{
  font-size: 13px;
  padding: 15px 0px;
}

.testimonial-card .card-up {
  height: 100px;
  overflow: hidden;
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem;
  }
  .testimonial-card .avatar {
    width: 200px;
    margin-top: -75px;
    overflow: hidden;
    border: 6px solid #fff;
    border-radius: 50%;
  }
  .indigo.lighten-1 {
  background-color: #5c6bc0 !important;
  }
  .testimonial-card .card-body {
  text-align: center;
  }
  .testimonial-card .avatar img {
            width: 100%;
  }
  .rounded-circle {
            border-radius: 50% !important;
  }
  </style>
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
                                <li class="nav-item"> 
                              <a class="nav-link" href="evenement.php">
                               <i class="fas fa-calendar-week"></i> Agenda </a> 
                               </li> 
                            <li class="nav-item"> 
                            <a class="nav-link " href="actualite.php" role="button">
                               <i class="far fa-newspaper"></i> Actualités </a> 
                             </li>
                            <li class="nav-item active"> 
                               <a class="nav-link " href="leader.php"> 
                            	  <i class="fas fa-crown"></i> Notre Leader </a> 
                             </li> 
              </ul>
                </div>
  </nav>
 <?php if (isset($_SESSION['flash'])): ?>
                                  <?php foreach($_SESSION['flash'] as $type=> $message): ?>
                                    <div class="text-center text-<?= $type; ?>">
                                     <h4><?= $message; ?></h4>   
                                    </div>
                                  <?php endforeach; ?>
                                  <?php unset($_SESSION['flash']); ?> 
                              <?php endif; ?>
        <section id="home" class="main-banner card testimonial-card" style="background: url('images/rdt1.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center; height: 100%;">
      <div class="heading">
        <!-- Background color -->
        <div class="container-fluid">
          <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="card-up lighten-1"></div>
                          <!-- Avatar -->
                          <div class="avatar mx-auto white">
                            <img src="images/coordon1.jpg" class="rounded-circle" alt="woman avatar">
                          </div>
                            <!-- Content -->
                          <div class="card-body">
                          <h5 class="card-title mt-0">Docteur</h5>
                            <hr class="bg-white">
                            <!-- Name -->
                            <h5 class="card-title"> Sylvain Mutombo Kabinga</h5>
                            <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                   <a href="" src="sdkpreparse">
                                  <img src="images/img/twitter.png" style="width: 40px; height: 40px;">
                                </a>
                                <a target="_blank" href="">
                                  <img src="images/img/facebook.png" style="width: 40px; height: 40px;">
                                </a>
                                            </div>
                                            <div class="col-lg-3"></div>
                                          </div>
                          </div>
              </div>
          <?php 
    $req = $bdd->query( "SELECT * FROM `leader` WHERE id = 1");
    while ( $donnees =$req->fetch())
     {
      ?>
                  <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="col-lg-12 col-sm-12 col-md-12"> <h5 class="text-center text-danger">Parcours politique</h5>
           </div>
      <p class="mt-0 text-justify">
                 <?php
                                                       echo
                                                       $donnees->parcours;
                                                    ?> <br>
        <?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->id<=5) AND isset($_SESSION['admin'])) { ?>
                          <button type="button" class="btn-s main-button pull-right" data-toggle="modal" data-target="#actualite">Modifier</button><br>
                            
              <?php } ?></p>
                         
  </div>
        </div>

            </div>
          </div>
      </section> <br>
      <div class="container">
          <div class="row">
           <div class="col-lg-12"> <h3 class="text-center text-danger"> Etudes faites</h3>
           </div>
            <div class="col-lg-6">
                    <p class="card-text text-justify"><br>
                <?php 
                 echo ($donnees->etudes);?> 

        </p><br>
            </div>
            <div class="col-lg-6">
                    <p class="card-text text-justify"><br>
                <?php 
                 echo ($donnees->etudes2);?></p><br>
            </div>
        </div>                  
      </div><br><br>
       <div class="modal fade bd-example-modal-xl bg-dark" id="actualite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modification_histoire">Modifications</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="leader_post.php" method="POST"  enctype="multipart/form-data">
                  <div class="container-fluid">
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
                              <textarea class="titre" name="parcours"><?php 
                 echo ($donnees->parcours);?></textarea>
                           </div>
                       </div>
                </div>
              </div>
                <div class="container-fluid">
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
                              <textarea class="titre" name="etudes"><?php 
                 echo ($donnees->etudes);?></textarea>
                           </div>
                       </div>
                </div>
              </div>
                <div class="container-fluid">
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
                              <textarea class="titre" name="etudes2"><?php 
                 echo ($donnees->etudes2);?></textarea>
                           </div>
                       </div>
                </div>
              </div>
                  <div class="modal-footer">
                    <input type="submit" value="Enregistrer" class="btn-s main-button pull-right"/>
                     </div>   
              </form>
         
          </div>
        </div>
      </div>
    <?php } ?>
             
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
    <?php include("rdtfooter.php"); ?>
