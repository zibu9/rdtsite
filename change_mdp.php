<?php 
session_start();
require_once 'base.php';
        if (!empty($_POST))
        {
                if (password_verify($_POST['mdp1'], $_SESSION['auth']->passwords))
                {
                    if(!empty($_POST['mdp']) && $_POST['mdp'] == $_POST['mdp2'])
                        {
                             $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);   
                             $req = $bdd->prepare("UPDATE users SET passwords = ? WHERE email = ?");
                             $req->execute([$mdp,$_SESSION['auth']->email]);
                             $_SESSION['flash']['success'] = "votre mot de passe a bien été modifier";
                                    $req = $bdd->prepare("SELECT * FROM Users WHERE email = :mail AND confirmdate IS NOT NULL");
                                    $req->execute(['mail' => $_SESSION['auth']->email]);
                                    $user = $req->fetch();
                                    $_SESSION['auth'] = $user;
                              header('location: compte.php');
                        exit();
                        }
                        else
                            { 
                             $_SESSION['flash']['danger'] = "les mots de passes sont different";
                             header('location: compte.php');
                             exit();
                            }
                }
                else
                { 
                    $_SESSION['flash']['danger'] = "Ancien mot de passe incorrect";
                     header('location: compte.php');
                     exit();
                }
        }
        else
        {
        $_SESSION['flash']['danger'] = "veuillez remplir tout les champs";
        header('location: compte.php');
        exit();
        }
 ?>