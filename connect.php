 <?php 
session_start();
  if (isset($_COOKIE['remember'])) 
  {
   require_once 'base2.php';
    $souvenir = $_COOKIE['remember'];
    $parts = explode('==', $souvenir);
    $user_id = $parts[0];
    $req = $bdd->prepare("SELECT * FROM users WHERE id = ?");
      $req->execute([$user_id]);
      $user = $req->fetch();
      if ($user)
      {
        $moins = $user_id . '==' . $user->cookies_tok . sha1($user_id . 'ratonlaveurs');
        if ($moins == $souvenir) 
        {
            $_SESSION['auth'] = $user;
               setcookie('remember', $souvenir, time()+ 60 * 60 * 24 * 7);
           unset($_SESSION['flash']);
          header('location: compte.php');
            exit();
        }else{setcookie('remember',NULL,-1);}
      }else{setcookie('remember',NULL,-1);}

  }elseif (!empty($_POST)) 
  {
        if (!empty($_POST) && isset($_POST['mail']) && isset($_POST['mdp']))
       {
         require_once 'base2.php';
          $req = $bdd->prepare("SELECT * FROM users WHERE email = :mail AND confirmdate IS NOT NULL");
            $req->execute(['mail' => $_POST['mail']]);
            $user = $req->fetch();
              function str_random($length)
                  {
              $cle = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
              return substr(str_shuffle(str_repeat($cle, $length)), 0, $length);
              }
            if (($user) AND (password_verify($_POST['mdp'], $user->passwords)))
            {
              
                $_SESSION['auth'] = $user;
                
              
              if (isset($_POST['remember']))
                    {
                $souvenir = str_random(255);
                  $bdd->prepare("UPDATE users SET cookies_tok = ? WHERE id = ?")->execute([$souvenir, $user->id]);
                     
                     setcookie('remember', $user->id . '==' . $souvenir . sha1($user->id . 'ratonlaveurs'), time()+ 60 * 60 * 24 * 7);
                      $_SESSION['flash']['success'] = "vous êtes connecté";
                     header('location:index.php');
                    /*header('location: https://zibu.000webhostapp.com/rdt/index.php');*/
                    exit();
                    }
                    else{
                      $_SESSION['flash']['success'] = "vous êtes connecté";
                      header('location:index.php');
                     /* header('location: https://zibu.000webhostapp.com/rdt/index.php');*/
                      exit();
                      
                }
            }else
            {
              $_SESSION['flash']['danger'] = "adresse email ou mot de passe ne correspondent à aucun compte";
              header('location:adhesion.php');
                     /* header('location: https://zibu.000webhostapp.com/rdt/adhesion.php');*/
                      exit();
            }
             function debug ($var){
            echo '<pre>'. print_r($var,true).'</pre>';
          }
      }
      else
            {
              $_SESSION['flash']['danger'] = "veuiller remplir tout les champs";
              header('location:adhesion.php');
               /*header('location: https://zibu.000webhostapp.com/rdt/adhesion.php');*/
               
               exit();
                    
            }
  }
  
 ?>