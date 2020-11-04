<?php

function insertUser($email, $mdp, $profil){
        $db = new mysqli('localhost','perrine.leguai','Mysql2020','gestion_employes');  
        
        $stmt= $db->prepare("INSERT INTO `user_oop` (`id`, `email`,`mdp`, `profil`) VALUES (null,?,?,?)");
        $stmt->bind_param('sss', $email, $mdp, $profil);
    

        if ($stmt->execute()) {
            echo "Query executed. \n";
            //renvoie à l'ajout
            header('Location: connexion.php');

        } else{
            echo "Query error. \n";
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
    //connection
    $db= new mysqli("localhost","perrine.leguai","Mysql2020",'gestion_employes');

    
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
