<!-- contient la fonction addEmploye -->
<?php

include_once('ParentMysqliDao.php');
include_once(__DIR__ .'/../0class/Service.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once('exceptionDAO.php');


class ServicesMysqliDao extends ParentMysqliDao  { //implements communDAO
    // AJOUTER QUELQU'UN
    public static function add ($objet){
        $a=$objet->getNoserv();
        $b=$objet->getServ();
        $c=$objet->getVille();
        try{
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
        }catch(ExceptionDAO $edao){
            throw new ExceptionDAO ($edao->getCode());
        }catch(Exception $edao){
            throw new Exception($edoa->getCode());
        }
    }

    //SUPPRIMER QUELQU'UN
    public static function delete($a){
        $aa=$a;
        try{
        $db =parent :: connect();

        // on supprime les données
        $stmt=$db->prepare("DELETE FROM serv WHERE noserv=?");
        $stmt->bind_param('i', $aa);
        $stmt->execute();
        $rs=$stmt->get_result();
        
        //fermeture bdd
        $db->close();

        return $rs;
        }catch(ExceptionDAO $edao){
            throw new ExceptionDAO ($edao->getCode());
        }catch(Exception $edao){
            throw new Exception($edoa->getCode());
        }
    }

    //MODIFIER DES DONNEES
    public static function edit($objet){
        $a=$objet->getNoserv();
        $b=$objet->getServ();
        $c=$objet->getVille();
        try{
            $db =parent :: connect();
            
            // mise à jour bdd
            $stmt=$db->prepare("UPDATE serv SET serv=?, ville=? WHERE noserv=?");
            $stmt->bind_param('ssi',$b,$c, $a);
            $rs=$stmt->execute();

            //fermeture bdd
            $db->close();
                                
            return $rs;
        }catch(ExceptionDAO $edao){
            throw new ExceptionDAO ($edao->getCode());
        }catch(Exception $edao){
            throw new Exception($edoa->getCode());
        }
    }

    //RECHERCHER DANS LA BDD
    public static function research(){
        try{
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
        }catch(ExceptionDAO $edao){
            throw new ExceptionDAO ($edao->getCode());
        }catch(Exception $edao){
            throw new Exception($edoa->getCode());
        }

    }
        
    //RECHERCHE POUR LA CONSULTATION
    public static function researchNE($a){
        $aa=$a;
        
        try{
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
        }catch(ExceptionDAO $edao){
            throw new ExceptionDAO ($edao->getCode());
        }catch(Exception $edao){
            throw new Exception($edoa->getCode());
        }
        
    }


    public static function tridelete(){
        try{
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
        }catch(ExceptionDAO $edao){
            throw new ExceptionDAO ($edao->getCode());
        }catch(Exception $edao){
            throw new Exception($edoa->getCode());
        }
    }
}
?>