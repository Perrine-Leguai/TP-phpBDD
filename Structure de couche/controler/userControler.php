
<?php
session_start();
include_once(__DIR__ .'/../service/UsersService.php');
include_once(__DIR__ . '/../presentation/userpres.php');

    if (!isset($_SESSION['mailUser'])){
        header('Location: ../controler/indexControler.php');
    }

    //redirection vers l'accueil
    if (isset($_GET['action']) && $_GET['action']=="connected"){
        html();
        lienSE($_SESSION['mailUser']);
    }
    

    //ajoute dans la BDD
    if (isset($_GET['action']) && $_GET['action']=="ajout" &&
        isset ($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['mdp']) && !empty($_POST['mdp'])){
            
            $rs= UsersService :: addUser($_POST['mdp'], $_POST['email']);
            
            if ($rs) {
                echo "Query executed. \n";
                //renvoie à l'ajout
                header('Location: ../presentation/connexion.php');
    
            } else{
                header('Location: ../presentation/inscription.php?p=bug');
            }
        }

    // test de connexion 
    elseif  (isset($_GET['action']) && $_GET['action']=="connect" &&
            isset ($_POST['email']) && !empty($_POST['email'])) {
            
            //recherche l'utilisateur
            $data= UsersService :: testCo($_POST['email']);
            var_dump($data);
            if (!$data ){
                header('Location: ../presentation/connexion.php?p=nomail');
        
            }elseif (isset($_POST['mdp']) && !empty($_POST['mdp'])){  
                //verification mdp
                $verifMdp = UsersService :: checkMdp($_POST['mdp'], $data['mdp']); //renvoie un booléen

                //connexion nouvelle page
                if ($verifMdp){

                    $_SESSION['mailUser']= $_POST['email'];
                    $_SESSION['profil']=$data['profil'];
                    header('Location: ../controler/userControler.php?action=connected');
                }else {
                
                    header('Location: ../presentation/connexion.php?p=nomdp');
                }
            } 
    }

    elseif (isset($_GET['p'])  &&  $_GET['p']=="deco") {
        session_destroy();
        header('Location: ../controler/indexControler.php');
    }

?>
