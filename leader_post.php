<?php 
session_start();
require_once 'base2.php';
if (($_SESSION['auth']->id<=5) AND isset($_SESSION['admin']))
{
    if(!empty($_POST))
  {
            $errors = array();
              if(isset($_POST['parcours']) AND (!preg_match('#^[ ]#', $_POST['parcours'])))
            {
                  $parcours = stripcslashes($_POST['parcours']);
                  $parcours = htmlspecialchars($parcours);
                  
                    if(isset($_POST['etudes']) AND (!preg_match('#^[ ]#', $_POST['etudes'])))
                    {
                  $etudes = stripcslashes($_POST['etudes']); 
                  $etudes = htmlspecialchars($etudes);
                      }
                      else
                      {
                      $_SESSION['flash']['danger'] = "veuillez remplir le champs 2 etudes : obligatoire";
                      header('Location: leader.php');
                    exit();
                      }
                    if(isset($_POST['etudes2']) AND (!preg_match('#^[ ]#', $_POST['etudes2'])))
                    {
                  $etudes2 = stripcslashes($_POST['etudes2']); 
                  $etudes2 = htmlspecialchars($etudes2);
                      }
                      else
                      {
                      $_SESSION['flash']['danger'] = "veuillez remplir le champs 3 etudes : obligatoire";
                      header('Location: leader.php');
                    exit();
                      }
              }
              else{
                  $_SESSION['flash']['danger'] = "veuillez remplir le champs 1 : parcours : obligatoire";
                  header('Location: leader.php');
                exit();
              }
                 if (empty($errors))
                   {
               $req = $bdd->prepare('UPDATE leader SET parcours = ?, etudes = ?, etudes2 =? WHERE id = 1 ');
              $req->execute([$parcours, $etudes, $etudes2]);
               $_SESSION['flash']['success'] = "Modifier avec succes";
                 header('location: leader.php');
                 exit();
               }

          }
          else{
              $_SESSION['flash']['danger'] = "remplissez au moins un champs";
              header('Location: leader.php');
              exit();
          }
  }

 ?>