<?php 
 session_start();
 if (isset($_SESSION['auth']) AND (($_SESSION['auth']->id)<=5))
              
 {
			   if (isset($_COOKIE['admin'])) 
			  {
						   require_once 'base2.php';
			    $souvenir = $_COOKIE['admin'];
			    $parts = explode('==', $souvenir);
			    $admin_id = $parts[0];
			    $req = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
			      $req->execute([$admin_id]);
			      $admin = $req->fetch();
			      if ($admin)
			      {
			        $moins = $admin_id . '==' . $admin->cookies_tok . sha1($admin_id . 'bintufornegatif');
			        if ($moins == $souvenir) 
			        {
			            $_SESSION['admin'] = $admin;
			               setcookie('admin', $souvenir, time()+ 60 * 60 * 24 * 7);
			           unset($_SESSION['flash']);
			          header('location: compte.php');
			            exit();
			        }else{setcookie('admin',NULL,-1);}
			      }else{setcookie('admin',NULL,-1);}

			  }
				  elseif (!empty($_POST)) 
				  {
				        if (!empty($_POST) && isset($_POST['nom']) && isset($_POST['mdp']))
				       {
			                 require_once 'base2.php';
				          $req = $bdd->prepare("SELECT * FROM admin WHERE utilisateur = :nom");
				            $req->execute(['nom' => $_POST['nom']]);
				            $admin = $req->fetch();
				              function str_random($length)
				                  {
				              $cle = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
				              return substr(str_shuffle(str_repeat($cle, $length)), 0, $length);
				              }
				            if (($admin) AND (password_verify($_POST['mdp'], $admin->password)))
				            {
				              
				                $_SESSION['admin'] = $admin;
				              
				              if (isset($_POST['admin']))
				                    {
				                $souvenir = str_random(255);
				                  $bdd->prepare("UPDATE admin SET cookies_tok = ? WHERE id = ?")->execute([$souvenir, $admin->id]);;
				                     
				                     setcookie('admin', $admin->id . '==' . $souvenir . sha1($admin->id . 'bintufornegatif'), time()+ 60 * 60 * 24 * 7);
				                      $_SESSION['flash']['success'] = "vous êtes connecté en tant qu'administrateur";
				                     header('location: index.php');
				                     exit();
				                    }
				                    else{
				                      $_SESSION['flash']['success'] = "vous êtes connecté en tant que administrateur";
				                      header('location: index.php');
				                      exit();
				                }
				            }else
				            {
				              $_SESSION['flash']['danger'] = "accès refuser les identifiants sont incorrect";
				              header('location: compte.php');
				                      exit();
				            }

				      }
				      else
				            {
				              $_SESSION['flash']['danger'] = "veuiller remplir tout les champs";
				              header('location: compte.php');
				                      exit();
				            }
				  }

 }
 ?>