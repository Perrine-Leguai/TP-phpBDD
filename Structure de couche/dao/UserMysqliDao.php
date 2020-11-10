<?php
include_once(__DIR__ . '/ParentMysqliDao.php');


class UserMysqliDao extends ParentMysqliDao {

    public static function insertUser($email, $mdp, $profil){
            
            $db=parent :: connect();
            $stmt= $db->prepare("INSERT INTO `user_oop` (`id`, `email`,`mdp`, `profil`) VALUES (null,?,?,?)");
            $stmt->bind_param('sss', $email, $mdp, $profil);
            $rs=$stmt->execute();
        
            $db->close();
            return $rs;
    }

    public static function verif($mdp, $hash){
        
    if (password_verify($mdp, $hash)) {
        echo 'Le mot de passe est valide ! ';
    } else {
        echo 'Le mot de passe est invalide.';
    }

    }



    public static function searchUserMail(string $email){
        //../presentation/connexion déjà établie  
        $db= parent :: connect();
        
        //requete SQL
        $stmt=$db->prepare("SELECT * FROM `user_oop` WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute(); //renvoie un booléen;
        $rs=$stmt->get_result(); //récupère l'objet contenant id, email, mdp, profil
        $data=$rs->fetch_array(MYSQLI_ASSOC); //le met en tableau
        
        
        //libération des resultats et de la connexion
        $rs->free();  //libération possible car select
        $db->close(); 

        return $data;
        
    }

}
