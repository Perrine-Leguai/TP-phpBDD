<!-- contient la fonction addEmploye -->
<?php
include 'connection.php';
include_once('../class/Employe.php');

//AJOUTER QUELQU'UN
function add ($objet){
    $a= $objet->getNoemp();
    $b=$objet->getNom();
    $c=$objet->getPrenom();
    $d=$objet->getEmploi();
    $e=$objet->getSup();
    $f=$objet->getEmbauche();
    $g=$objet->getSal();
    $h=$objet->getComm();
    $i=$objet->getNoserv(); 

    $db=connect();
    
    // on insère les nouvelles données
    $stmt=$db->prepare("INSERT INTO emp values (?,?,?,?,?,?,?,?,?)") ;
    $stmt->bind_param('isssisddi', $a, $b,$c, $d, $e, $f, $g, $h, $i);
    $rs=$stmt->execute();
    
    $db->close();
    return $rs;
}

//SUPPRIMER QUELQU'UN
function delete($a){
    $aa=$a;

    $db=connect();
    
    // on supprime les données
    $stmt=$db->prepare("DELETE FROM emp WHERE noemp=?");
    $stmt->bind_param('i', $aa);
    $stmt->execute();
    $rs=$stmt->get_result();
               
    $db->close();
    return $rs;
}

//MODIFIER DES DONNEES
function edit($objet){

    $a= $objet->getNoemp();
    $b=$objet->getNom();
    $c=$objet->getPrenom();
    $d=$objet->getEmploi();
    $e=$objet->getSup();
    $f=$objet->getEmbauche();
    $g=$objet->getSal();
    $h=$objet->getComm();
    $i=$objet->getNoserv(); 
    
    $db=connect();
    
    // mise à jour des données
    $stmt=$db->prepare("UPDATE emp SET nom=?, prenom=?, emploi=?, sup=?, embauche=?, sal=?, comm=?, noserv=? WHERE noemp=?");
    $stmt->bind_param('sssisddii',$b,$c, $d, $e, $f, $g, $h, $i, $a);
    $rs=$stmt->execute();

    $db->close();
                   
    return $rs;
}

//RECHERCHER DANS LA BDD
function research(){
    
    $db= connect();

    //récupère toute les données de la table emp
    $stmt=$db->prepare("SELECT * FROM emp");
    $stmt->execute();
    $rs=$stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);

    $rs->free();
    $db->close();

    return $data;
}
    
//RECHERCHE POUR LA CONSULTATION
function researchNE($a){
    $db= connect();

    //récupère les données d'un employé précisé
    $stmt=$db->prepare("SELECT * FROM emp WHERE noemp=?");
    $stmt->bind_param('i',$a);
    $stmt->execute();
    $rs=$stmt->get_result();
    $data=$rs->fetch_array(MYSQLI_ASSOC);
    
    $rs->free();
    $db->close();

    return $data;

}

//TRI DE CELLES ET CEUX QUI NE PEUVENT ÊTRE SUPPRIMÉ.E.S
function tridelete(){
    $db= connect();
    
    //sélectionne les employés qui ont des subalternes
    $stmt=$db->prepare("SELECT DISTINCT noemp FROM `emp` WHERE noemp IN(SELECT DISTINCT sup FROM emp)");
    $stmt->execute();
    $rs=$stmt->get_result();
    $donnees=$rs->fetch_all(MYSQLI_ASSOC);
     
     return $donnees;
}
?>