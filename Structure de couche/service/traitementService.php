<?php
session_start();
include('../dao/UserMysqliDao.php');

        
//ajoute dans la BDD
if (isset($_GET['action']) && $_GET['action']=="ajout" &&
    isset ($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['mdp']) && !empty($_POST['mdp'])){
        // hash le mdp
        $hash= PASSWORD_HASH($_POST['mdp'], PASSWORD_DEFAULT);
        // insert un nouvel utilisateur
        UserMysqliDao :: insertUser($_POST['email'], $hash , 'utilisateur');
        
    }

// test de connexion 
elseif(isset($_GET['action']) && $_GET['action']=="connect" &&
    isset ($_POST['email']) && !empty($_POST['email'])) {
        
        //recherche l'utilisateur
        

        $data= UserMysqliDao ::searchUserMail($_POST['email']);
        if (!$data ){
            header('Location: ../connexion.php?p=nomail');
       
        }

        elseif (isset($_POST['mdp']) && !empty($_POST['mdp'])){  
            //verification mdp
            $verifMdp = password_verify($_POST['mdp'], $data['mdp']); //renvoie un booléen
    

            //connexion nouvelle page
            if ($verifMdp){

                $_SESSION['mailUser']= $_POST['email'];
                $_SESSION['profil']=$data['profil'];
                header('Location: ../accueil.php');
            }else {
            
                header('Location: ../connexion.php?p=nomdp');
            }
        } 
    }

elseif (isset($_GET['p'])  &&  $_GET['p']=="deco") {
    session_destroy();
    header('Location: ../connexion.php');
}

?>
