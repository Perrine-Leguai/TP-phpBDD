<!-- contient la fonction addEmploye -->
<?php
include_once('ParentMysqliDao.php');
include_once(__DIR__ .'/../class/Employe.php');
require_once(__DIR__ . '/../dao/interface.php');
require_once(__DIR__ . '/../dao/RechercheSup.php');

class EmployesMysqliDao extends ParentMysqliDao implements communDAO, RechercheSup{

    //AJOUTER QUELQU'UN
    public function add ($objet){
        $a= $objet->getNoemp();
        $b=$objet->getNom();
        $c=$objet->getPrenom();
        $d=$objet->getEmploi();
        $e=$objet->getSup();
        $f=$objet->getEmbauche();
        $g=$objet->getSal();
        $h=$objet->getComm();
        $i=$objet->getNoserv(); 

        $db=parent :: connect();
        
        // on insère les nouvelles données
        $stmt=$db->prepare("INSERT INTO emp values (?,?,?,?,?,?,?,?,?)") ;
        $stmt->bind_param('isssisddi', $a, $b,$c, $d, $e, $f, $g, $h, $i);
        $rs=$stmt->execute();
        
        $db->close();
        return $rs;
    }

    //SUPPRIMER QUELQU'UN
    public  function delete($a){

        $db=parent :: connect();
        
        // on supprime les données
        $stmt=$db->prepare("DELETE FROM emp WHERE noemp=?");
        $stmt->bind_param('i', $a);
        $stmt->execute();
        $rs=$stmt->get_result();
                
        $db->close();
        return $rs;
    }

    //MODIFIER DES DONNEES
    public  function edit($objet){

        $a= $objet->getNoemp();
        $b=$objet->getNom();
        $c=$objet->getPrenom();
        $d=$objet->getEmploi();
        $e=$objet->getSup();
        $f=$objet->getEmbauche();
        $g=$objet->getSal();
        $h=$objet->getComm();
        $i=$objet->getNoserv(); 
        
        $db=parent :: connect();
        
        // mise à jour des données
        $stmt=$db->prepare("UPDATE emp SET nom=?, prenom=?, emploi=?, sup=?, embauche=?, sal=?, comm=?, noserv=? WHERE noemp=?");
        $stmt->bind_param('sssisddii',$b,$c, $d, $e, $f, $g, $h, $i, $a);
        $rs=$stmt->execute();

        $db->close();
                    
        return $rs;
    }

    //RECHERCHER DANS LA BDD
    public  function research(){
        
        $db= parent :: connect();

        //récupère toute les données de la table emp
        $stmt=$db->prepare("SELECT * FROM emp");
        $stmt->execute();
        $rs=$stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);

        $i=0;
        foreach($data as $key=>$value){
            $emp= new Employe();
            $emp->setNoemp($value['noemp'])->setNom($value['nom'])->setPrenom($value['prenom'])->setEmploi($value['emploi'])->setSup($value['sup'])->setEmbauche($value['embauche'])->setSal($value['sal'])->setComm($value['comm'])->setNoserv($value['noserv']);
            $data[$i]=$emp;
            $i++;
        }
        
        $rs->free();
        $db->close();

        return $data;
    }
        
    //RECHERCHE POUR LA CONSULTATION
    public  function researchNE(int $a){
        $db= parent :: connect();

        //récupère les données d'un employé précisé
        $stmt=$db->prepare("SELECT * FROM emp WHERE noemp=?");
        $stmt->bind_param('i', $a);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_array(MYSQLI_ASSOC);
        $emp = new Employe();
        $emp->setNoemp($data['noemp'])->setNom($data['nom'])->setPrenom($data['prenom'])->setEmploi($data['emploi'])->setSup($data['sup'])->setEmbauche($data['embauche'])->setSal($data['sal'])->setComm($data['comm'])->setNoserv($data['noserv']);
        
        $rs->free();
        $db->close();

        return $emp;

    }

    //TRI DE CELLES ET CEUX QUI NE PEUVENT ÊTRE SUPPRIMÉ.E.S
    public  function rechercheSup(){
        $db= parent :: connect();
        
        //sélectionne les employés qui ont des subalternes
        $stmt=$db->prepare("SELECT DISTINCT noemp FROM `emp` WHERE noemp IN(SELECT DISTINCT sup FROM emp)");
        $stmt->execute();
        $rs=$stmt->get_result();
        $donnees=$rs->fetch_all(MYSQLI_ASSOC);
        
        return $donnees;
    }
}
?>