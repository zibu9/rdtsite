<?php
    session_start();
  if (isset($_GET['id'])&& !empty($_GET['id']))
  {
        $user_id = $_GET['id']; 
        $confirmation = $_GET['confirmation'];
         require_once 'base2.php';
        function debug ($var){
            echo '<pre>'. print_r($var,true).'</pre>';
        }
        function str_random($length){
        
            $cle = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($cle, $length)), 0, $length);
        }
        function code($length){
        
            $clef = "0123456789AZERTYUIOPQSDFGHJKLMWXCVBN";
        return strtoupper(substr(str_shuffle(str_repeat($clef, $length)), 0, $length));
        }
        $req = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $req->execute([$user_id]);
        $user = $req->fetch(); 
        
        if($user && $user->confirmation == $confirmation)
        {
          
           $bdd->query("UPDATE users SET confirmation = NULL, confirmdate = NOW() WHERE id = $user_id");
           $_SESSION['flash']['success'] = "votre mail a bien été valider";
            $_SESSION['auth'] = $user;
            header('location: index.php');
            exit();
        }
        else
        {
            $_SESSION['flash']['danger'] = "Ce lien est Invalide ou  deja  utiliser";
            header('location: adhesion.php');
            exit();
        }
  }
  else
  {
     $_SESSION['flash']['danger'] = "Accès refusé inscrivez vous d'abord";
            header('location: adhesion.php');
            exit();
  }

 ?>