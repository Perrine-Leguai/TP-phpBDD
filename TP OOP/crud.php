<?php
include_once('tableaux/connection.php');
function insertUser($email, $mdp, $profil){
          
        $db=connect();
        $stmt= $db->prepare("INSERT INTO `user_oop` (`id`, `email`,`mdp`, `profil`) VALUES (null,?,?,?)");
        $stmt->bind_param('sss', $email, $mdp, $profil);
    

        if ($stmt->execute()) {
            echo "Query executed. \n";
            //renvoie à l'ajout
            header('Location: connexion.php');

        } else{
            header('Location: inscription.php?p=bug');
        }

        // $rs->free(); que pour le select
        $db->close();
}

function verif($mdp, $hash){
    
if (password_verify($mdp, $hash)) {
    echo 'Le mot de passe est valide ! ';
} else {
    echo 'Le mot de passe est invalide.';
}

}



function searchUserMail(string $email){
    //connexion déjà établie  
    $db=connect();
    
    //requete SQL
    $stmt=$db->prepare("SELECT * FROM `user_oop` WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute(); //renvoie un booléen;
    $rs=$stmt->get_result(); //récupère l'objet contenant id, email, mdp, profil
    $data=$rs->fetch_array(MYSQLI_ASSOC); //le met en tableau
    return $data;
    
    //libération des resultats et de la connexion
    $rs->free();  //libération possible car select
    $db->close(); 
    
}
