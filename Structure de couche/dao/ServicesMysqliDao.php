<!-- contient la fonction addEmploye -->
<?php

include_once('ParentMysqliDao.php');
include_once(__DIR__ .'/../class/Service.php');
// require_once(__DIR__ .'/../dao/interface.php');

class ServicesMysqliDao extends ParentMysqliDao  { //implements communDAO
    // AJOUTER QUELQU'UN
    public static function add ($objet){
        $a=$objet->getNoserv();
        $b=$objet->getServ();
        $c=$objet->getVille();
        
        //connexion à la bdd
        $db =parent :: connect();
        
        // on insère les nouvelles données
        $stmt=$db->prepare("INSERT INTO serv values (?,?,?)") ;
        $stmt->bind_param('iss', $a, $b, $c);
        $rs=$stmt->execute();
       

        //fermeture bdd
        $db->close();
        
        //renvoi des données
        return $rs;
    }

    //SUPPRIMER QUELQU'UN
    public static function delete($a){
        $aa=$a;

        $db =parent :: connect();

        // on supprime les données
        $stmt=$db->prepare("DELETE FROM serv WHERE noserv=?");
        $stmt->bind_param('i', $aa);
        $stmt->execute();
        $rs=$stmt->get_result();
        
        //fermeture bdd
        $db->close();

        return $rs;
    }

    //MODIFIER DES DONNEES
    public static function edit($objet){
        $a=$objet->getNoserv();
        $b=$objet->getServ();
        $c=$objet->getVille();
    
        $db =parent :: connect();
        
        // mise à jour bdd
        $stmt=$db->prepare("UPDATE serv SET serv=?, ville=? WHERE noserv=?");
        $stmt->bind_param('ssi',$b,$c, $a);
        $rs=$stmt->execute();

        //fermeture bdd
        $db->close();
                            
        return $rs;
    }

    //RECHERCHER DANS LA BDD
    public static function research(){
        
        $db =parent :: connect();

        //récupérer les infos de la table serv
        $stmt=$db->prepare("SELECT * FROM serv");
        $stmt->execute();
        $rs=$stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);

        //libération des données & fermeture bdd
        $rs->free();
        $db->close();

        return $data;

    }
        
    //RECHERCHE POUR LA CONSULTATION
    public static function researchNE($a){
        $aa=$a;
        
        $db =parent :: connect();

        // récupérer les infos d'un service précisé
        $stmt=$db->prepare("SELECT * FROM serv WHERE noserv=?");
        $stmt->bind_param('i',$aa);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_array(MYSQLI_ASSOC);
        
    //libération des données & fermeture bdd
        $rs->free();
        $db->close();

        //envoi du résultat
        return $data;
        
    }


    public static function tridelete(){
        //ouverture bdd
        $db=parent :: connect();

        //sélectionne les services où il y a des employés
        $stmt=$db->prepare("SELECT DISTINCT s.noserv FROM `serv` AS s
                            INNER JOIN `emp` AS e 
                            ON e.noserv= s.noserv
                            WHERE e.noserv IN (SELECT DISTINCT e.noserv FROM `emp` AS e)");
        $stmt->execute();
        $rs=$stmt->get_result();
        $donnees=$rs->fetch_all(MYSQLI_ASSOC);
    
        //libération des données & fermeture bdd
        $rs->free();
        $db->close();

        //envoi du résultat
        return $donnees;
        
    }
}
?>