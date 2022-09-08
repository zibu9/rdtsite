<?php 
session_start();
    require_once 'base2.php';
        if (!empty($_POST) AND !empty($_SESSION['admin']))
        {     
                $password = $_SESSION['admin']->password;
                if (password_verify($_POST['mdp1'], $password))
                {  
                    if(!empty($_POST['mdp']) && $_POST['mdp'] == $_POST['mdp2'])
                        {
                             $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);   
                             $req = $bdd->prepare("UPDATE admin SET password = ? WHERE utilisateur = ?");
                             $req->execute([$mdp,$_SESSION['admin']->utilisateur]);
                             $_SESSION['flash']['success'] = "le mot de passe_admin a bien été modifier";
                                    $req = $bdd->prepare("SELECT * FROM admin WHERE utilisateur = ?");
                                    $req->execute([$_SESSION['admin']->utilisateur]);
                                    $user = $req->fetch();
                                    $_SESSION['admin'] = $user;
                              header('location: compte.php');
                        exit();
                        }
                        else
                            { 
                             $_SESSION['flash']['danger'] = "les mots de passes_admin sont different";
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
        $_SESSION['flash']['danger'] = "Assurez vous d'etre connecter à l'administration et veuillez remplir tout les champs";
        header('location: compte.php');
        exit();
        }
 ?>