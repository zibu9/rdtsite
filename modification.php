
        <div class="modal fade bd-example-modal-xl bg-dark" id="modification_preambule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modification_preambule">Preambule</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                              <?php 
    $req = $sql->query( "SELECT * FROM `titres` WHERE id = 1");
    while ( $donnees =$req->fetch())
     {
      ?>
              <form action="preambule.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                     <div class="form-group col-lg-4 col-md-6 col-sm-6">
                          <div class="custom-file">
                              <input type="file" name="image1" class="custom-file-input">
                              <label class="custom-file-label">modifier l'image1...</label>
                            </div>
                       </div>
                       <div class="form-group col-lg-4 col-md-6 col-sm-6">
                          <div class="custom-file">
                              <input type="file" name="image2" class="custom-file-input">
                              <label class="custom-file-label">modifier l'image2...</label>
                            </div>
                       </div>
                       <div class="form-group col-lg-4 col-md-6 col-sm-6">
                          <div class="custom-file">
                              <input type="file" name="image3" class="custom-file-input">
                              <label class="custom-file-label">modifier l'image3...</label>
                            </div>
                       </div>
                                            <div class="form-group col-lg-4 col-md-6 col-sm-6">
                          <div class="custom-file">
                              <input type="file" name="image4" class="custom-file-input">
                              <label class="custom-file-label">modifier l'image4...</label>
                            </div>
                       </div>
                       <div class="form-group col-lg-4 col-md-6 col-sm-6">
                          <div class="custom-file">
                              <input type="file" name="image5" class="custom-file-input">
                              <label class="custom-file-label">modifier l'image5...</label>
                            </div>
                       </div>
                       <div class="form-group col-lg-4 col-md-6 col-sm-6">
                          <div class="custom-file">
                              <input type="file" name="image6" class="custom-file-input">
                              <label class="custom-file-label">modifier l'image6...</label>
                            </div>
                       </div>
                       <br><br>
                </div>
                
                
                  <div class="container-fluid">
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
                              <textarea class="modales" name="preambule"><?php echo $donnees['preambule']; ?></textarea>
                           </div>
                       </div>
                </div>
              </div>
                  <div class="modal-footer">
                    <input type="submit" value="Changer" class="btn-s main-button pull-right"/>
                     </div>   
              </form>
         
          </div>
        </div>
      </div>
      <div class="modal fade bd-example-modal-xl bg-dark" id="modification_histoire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modification_histoire">Histoire</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="histoire.php" method="POST"  enctype="multipart/form-data">
                <div class="row">                                             
                  <div class="form-label-group col-lg-8 col-md-8 col-sm-8">
                          <div class="custom-file">
                              <input type="file" name="image" class="custom-file-input">
                              <label class="custom-file-label">modifier l'image...</label>
                            </div>
                       </div>
                       <br><br>
                </div>
                
                
                  <div class="container-fluid">
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
                              <textarea class="modales" name="histoire" placeholder="Entrer votre Message"><?php echo $donnees['histoire']; ?></textarea>
                           </div>
                       </div>
                </div>
              </div>
                  <div class="modal-footer">
                    <input type="submit" value="Changer" class="btn-s main-button pull-right"/>
                     </div>   
              </form>
         
          </div>
        </div>
      </div>
      <div class="modal fade bd-example-modal-xl bg-dark" id="modification_mission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modification_mission">Mission</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="mission.php" method="POST">                
               
                  <div class="container-fluid"> 
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
                              <textarea class="modales" name="mission" placeholder="Entrer votre Message"><?php echo $donnees['mission'];?>  
                              </textarea>
                            </div>
                           </div>

                </div>
              </div>
                  <div class="modal-footer">
                    <input type="submit" value="Changer" class="btn-s main-button pull-right"/>
                     </div>   
              </form>
         
          </div>
        </div>
      </div>
          <div class="modal fade bd-example-modal-xl bg-dark" id="modification_objectif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modification_objectif">Objectif</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="objectif.php" method="POST">                
                
                  <div class="container-fluid">
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
               
                              <textarea class="modales" name="objectif" placeholder="Entrer votre Message"><?php echo $donnees[('objectif')];?></textarea>
                           </div>
                       </div>
                </div>
              </div>
                  <div class="modal-footer">
                    <input type="submit" value="Changer" class="btn-s main-button pull-right"/>
                     </div>   
              </form>
         
          </div>
        </div>
      </div>
                <div class="modal fade bd-example-modal-xl bg-dark" id="modification_condition_adhesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modification_condition_adhesion">Condition d'adhesion</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="adherer.php" method="POST">                
                  <div class="container-fluid">
                    <div class="row">
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <div class="contact-form">
                              <textarea class="modales" name="adhesion" placeholder="Entrer votre Message"><?php  echo $donnees['adhesion']; ?></textarea>
                           </div>
                       </div>

                </div>
              </div>
                  <div class="modal-footer">
                    <input type="submit" value="Changer" class="btn-s main-button pull-right"/>
                     </div>   
              </form>
         
          </div>
        </div>
      </div>
        <?php 
            
              }
               $req->closeCursor();
            ?>
        <div class="modal fade bd-example-modal-xl bg-dark" id="modification_assemble" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Assemblé générale</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-dark" aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="ass_gen.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                               <?php 
            $req = $sql->query( "SELECT * FROM `ass_gen`");
            while ( $donnees =$req->fetch())
             {
              ?> 
                    <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-12">
                           <div class="form-group">
                              <label for="recipient-name" class="col-form-label"><?php echo($donnees['role']);?>:Prenom</label>
                              <input type="text" maxlength="14" name="prenom<?php echo($donnees['id']);?>" value="<?php echo($donnees['prenom']);?>" class="form-control">
                            </div>
                        </div>
                          <div class="col-lg-4 col-md-4 col-sm-12">
                           <div class="form-group">
                              <label for="recipient-name" class="col-form-label"><?php echo($donnees['role']);?>:nom</label>
                              <input type="text" maxlength="14" name="nom<?php echo($donnees['id']);?>" value="<?php echo($donnees['nom']);?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="col-form-label">modifier l'image <?php echo($donnees['role']);?>...</label>
                                  <input type="file" name="image<?php echo($donnees['id']);?>" class="form-control">
                                </div>
                           </div>
                        </div>
                        <?php   }
               $req->closeCursor();
            ?>
                     </div>

                  <div class="modal-footer">
                    <input type="submit" value="Enregistrer" class="btn-s main-button pull-right"/>
                     </div>   
              </form>
         
          </div>
        </div>
      </div>
       <div class="modal fade bd-example-modal-xl bg-dark" id="president" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Coordonnateur Nationale</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-dark" aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="coord_nat.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
          <?php 
            $req = $sql->query( "SELECT * FROM `coord_nat` WHERE id = 1");
            while ( $donne =$req->fetch())
             {
              ?> 
                    <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-12">
                           <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Prenom</label>
                              <input type="text" maxlength="14" name="prenom1" value="<?php echo($donne['prenom']);?>" class="form-control">
                            </div>
                        </div>
                          <div class="col-lg-4 col-md-4 col-sm-12">
                           <div class="form-group">
                              <label for="recipient-name" class="col-form-label">nom</label>
                              <input type="text" maxlength="14" name="nom1" value="<?php echo($donne['nom']);?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="col-form-label">modifier l'image ...</label>
                                  <input type="file" name="image1" class="form-control">
                                </div>
                           </div>
                        </div>
            <?php   }
               $req->closeCursor();
            ?>
                     </div>

                  <div class="modal-footer">
                    <input type="submit" value="Enregistrer" class="btn-s main-button pull-right"/>
                     </div>   
              </form>
         
          </div>
        </div>
      </div>
                <?php 
            $req = $sql->query( "SELECT * FROM `coord_nat` WHERE id > 1");
            while ( $donne =$req->fetch())
             { $j = ($donne[('id')])-1;$i= $j+1;
              ?> 
            <div class="modal fade bd-example-modal-xl bg-dark" id="coordination<?php echo($i);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Coordination Nationale / <?php echo($donne[('role')]);?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-dark" aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="coordination.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-12">
                           <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Prenom</label>
                              <input type="text" maxlength="14" name="prenom<?php echo($i);?>" value="<?php echo($donne['prenom']);?>" class="form-control">
                            </div>
                        </div>
                          <div class="col-lg-4 col-md-4 col-sm-12">
                           <div class="form-group">
                              <label for="recipient-name" class="col-form-label">nom</label>
                              <input type="text" maxlength="14" name="nom<?php echo($i);?>" value="<?php echo($donne['nom']);?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="col-form-label">modifier l'image ...</label>
                                  <input type="file" name="image<?php echo($i);?>" class="form-control">
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
               <?php   }
            ?>
                    <?php 
            $req = $sql->query( "SELECT * FROM `coord_mam`");
            while ( $donne =$req->fetch())
             { $i = ($donne[('id')]);
              ?> 
            <div class="modal fade bd-example-modal-xl bg-dark" id="modification_maman<?php echo($i);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Coordination des Mamans / <?php echo($donne[('role')]);?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-dark" aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="mamans.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-12">
                           <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Prenom</label>
                              <input type="text" maxlength="14" name="prenom<?php echo($i);?>" value="<?php echo($donne['prenom']);?>" class="form-control">
                            </div>
                        </div>
                          <div class="col-lg-4 col-md-4 col-sm-12">
                           <div class="form-group">
                              <label for="recipient-name" class="col-form-label">nom</label>
                              <input type="text" maxlength="14" name="nom<?php echo($i);?>" value="<?php echo($donne['nom']);?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="col-form-label">modifier l'image ...</label>
                                  <input type="file" name="image<?php echo($i);?>" class="form-control">
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
               <?php   }
            ?>
                               <?php 
            $req = $sql->query( "SELECT * FROM `coord_jeunes`");
            while ( $donne =$req->fetch())
             { $i = ($donne[('id')]);
              ?> 
            <div class="modal fade bd-example-modal-xl bg-dark" id="modification_cne<?php echo($i);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Coordination de la Jeunesse / <?php echo($donne[('role')]);?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-dark" aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="jeunes.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-12">
                           <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Prenom</label>
                              <input type="text" maxlength="14" name="prenom<?php echo($i);?>" value="<?php echo($donne['prenom']);?>" class="form-control">
                            </div>
                        </div>
                          <div class="col-lg-4 col-md-4 col-sm-12">
                           <div class="form-group">
                              <label for="recipient-name" class="col-form-label">nom</label>
                              <input type="text" maxlength="14" name="nom<?php echo($i);?>" value="<?php echo($donne['nom']);?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="col-form-label">modifier l'image ...</label>
                                  <input type="file" name="image<?php echo($i);?>" class="form-control">
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
               <?php   }
            ?>
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