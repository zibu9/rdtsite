<?php 
    session_start();
    $user_id = $_GET['id'];
    $reset = $_GET['reset'];
   require_once 'base2.php';
    function debug ($var){
        echo '<pre>'. print_r($var,true).'</pre>';
    }
    $req = $bdd->prepare("SELECT * FROM users WHERE id = ? AND resetdate > DATE_SUB(NOW(), INTERVAL 30 MINUTE)");
    $req->execute([$user_id]);
    $user = $req->fetch(); 
    
    if($user && $user->oublielien == $reset){
        if (!empty($_POST))
        {
                if (!empty($_POST['mdp']) && $_POST['mdp'] == $_POST['mdp2'])
                {
                     $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);   
                     $req = $bdd->prepare("UPDATE users SET passwords = ?, oublielien = NULL, resetdate = NULL");
                     $req->execute([$mdp]);
                     $_SESSION['flash']['succes'] = "votre mot de passe a bien été modifier";
                      header('location: adhesion.php');
                exit();
                }
        }
            
    }
    else{
        $_SESSION['flash']['danger'] = "Ce lien est Invalide ou  a déjà  expirer";
        header('location: reset.php');
    }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <title> reinitialisation du mot de passe</title>
 </head>
 <body>
                    <form action="" method="POST">
            <table>
                <tr>
                    <td>
                        <label for="mdp">nouveau mot de passe</label>
                    </td>
                    <td><input type="password" placeholder="8 caracteres max" name="mdp" maxlength="8"></td>
                </tr>
                <tr>
                    <td>
                        <label for="mdp2"> Confirmer le mot de passe</label>
                    </td>
                    <td><input type="password" placeholder="confirm password" name="mdp2" maxlength="8"></td>

                </tr>
                <tr>
                    <td></td>
                    <td><input type="Submit" value="Envoyer"></td>

                </tr>
            </table>
            </form>
 </body>
 </html>