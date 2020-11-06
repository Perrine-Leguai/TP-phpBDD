<!-- contient la fonction addEmploye -->
<?php
include 'connection.php';
include_once('../class/Employe.php');

//AJOUTER QUELQU'UN
function add ($objet){
    $a= $objet->getNoemp();
    $b=$objet->getNom();
    $b= $b? $b : NULL;
    $c=$objet->getPrenom();
    $c = $c? $c: NULL;
    $d=$objet->getEmploi();
    $d= $d? $d : NULL;
    $e=$objet->getSup();
    $e= $e? $e: NULL;
    $f=$objet->getEmbauche();
    $f=$f? $f: NULL;
    $g=$objet->getSal();
    $g=$g? $g : NULL;
    $h=$objet->getComm();
    $h= $h? $h : NULL;
    $i=$objet->getNoserv();
    $i=$i? $i : NULL;  

    $db=connect();
    
    // on insère les nouvelles données
    $stmt=$db->prepare("INSERT INTO emp values (?,?,?,?,?,?,?,?,?)") ;
    $stmt->bind_param('isssisddi', $a, $b,$c, $d, $e, $f, $g, $h, $i);
    $stmt->execute();
    $rs=$stmt->get_result();
    
    return $rs;
    
    $db->close();
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
    $b= $b? $b : NULL;
    $c=$objet->getPrenom();
    $c = $c? $c: NULL;
    $d=$objet->getEmploi();
    $d= $d? $d : NULL;
    $e=$objet->getSup();
    $e= $e? $e: NULL;
    $f=$objet->getEmbauche();
    $f=$f? $f: NULL;
    $g=$objet->getSal();
    $g=$g? $g : NULL;
    $h=$objet->getComm();
    $h= $h? $h : NULL;
    $i=$objet->getNoserv();
    $i=$i? $i : NULL;  
    
    $db=connect();
    
    // MISE A JOUR DES DONNEES
    $stmt=$db->prepare("UPDATE emp SET nom=?, prenom=?, emploi=?, sup=?, embauche=?, sal=?, comm=?, noserv=? WHERE noemp=?");
    $stmt->bind_param('sssisddii',$b,$c, $d, $e, $f, $g, $h, $i, $a);
    $stmt->execute();

    $db->close();
                        
}

//RECHERCHER DANS LA BDD
function research(){
    
    $db= connect();
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
    
    $stmt=$db->prepare("SELECT DISTINCT noemp FROM `emp` WHERE noemp IN(SELECT DISTINCT sup FROM emp)");
    $stmt->execute();
    $rs=$stmt->get_result();
    $donnees=$rs->fetch_all(MYSQLI_ASSOC);
     
     return $donnees;
}
?>