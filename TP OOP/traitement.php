<?php
session_start();
include_once('crud.php');

        
//ajoute dans la BDD
if (isset($_GET['action']) && $_GET['action']=="ajout" &&
    isset ($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['mdp']) && !empty($_POST['mdp'])){

        $hash= PASSWORD_HASH($_POST['mdp'], PASSWORD_DEFAULT);

        insertUser($_POST['email'], $hash , 'utilisateur');
        
    }

// test de connexion 
elseif(isset($_GET['action']) && $_GET['action']=="connect" &&
    isset ($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['mdp']) && !empty($_POST['mdp'])){
        
        

        //recherche l'utilisateur
        $data= searchUserMail($_POST['email']);

        //verification mdp
        $verifMdp = password_verify($_POST['mdp'], $data['mdp']); //renvoie un booléen
    

        //connexion nouvelle page
        if (!$data ){
           
           header('Location: inscription.php');
        }else{
            if ($verifMdp){

                $_SESSION['mailUser']= $_POST['email'];
                $_SESSION['profil']=$data['profil'];
                header('Location: accueil.php');
            }else {
            
                header('Location: connexion.php');
            }
        } 
}


?>
