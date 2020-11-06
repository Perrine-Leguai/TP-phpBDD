<!-- contient la fonction addEmploye -->
<?php

include 'connection.php';

// AJOUTER QUELQU'UN
function add ($objet){
     $a=$objet->getNoserv();
     $b=$objet->getServ();
     $b=$b? $b : NULL;
     $c=$objet->getVille();
     $c=$c? $c : NULL;
    
    $db =connect();
    
    // on insère les nouvelles données
    $stmt=$db->prepare("INSERT INTO serv values (?,?,?)") ;
    $stmt->bind_param('iss', $a, $b, $c);
    $stmt->execute();
    $rs=$stmt->get_result();

    $db->close();
    
    return $rs;
}

//SUPPRIMER QUELQU'UN
function delete($a){
    $aa=$a;

    $db =connect();
    // on supprime les données
    $stmt=$db->prepare("DELETE FROM serv WHERE noserv=?");
    $stmt->bind_param('i', $aa);
    $stmt->execute();
    $rs=$stmt->get_result();
               
    $db->close();

    return $rs;
}

//MODIFIER DES DONNEES
function edit($objet){
    $a=$objet->getNoserv();
    $b=$objet->getServ();
    $b=$b? $b : NULL;
    $c=$objet->getVille();
    $c=$c? $c : NULL;
   
    $db =connect();
    
    // MISE A JOUR DES DONNEES
    $stmt=$db->prepare("UPDATE serv SET serv=?, ville=? WHERE noserv=?");
    $stmt->bind_param('ssi',$b,$c, $a);
    $stmt->execute();
    $rs=$stmt->get_result();

    $db->close();
                        
    return $rs;
}

//RECHERCHER DANS LA BDD
function research(){
    
    $db =connect();

    $stmt=$db->prepare("SELECT * FROM serv");
    $stmt->execute();
    $rs=$stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);

    $rs->free();
    $db->close();

    return $data;

}
    
//RECHERCHE POUR LA CONSULTATION
function consult($a){
    $aa=$a;
    
    $db =connect();

    $stmt=$db->prepare("SELECT * FROM serv WHERE noserv=?");
    $stmt->bind_param('i',$aa);
    $stmt->execute();
    $rs=$stmt->get_result();
    $data=$rs->fetch_array(MYSQLI_ASSOC);
    
    $rs->free();
    $db->close();

    return $data;
    
}


function tridelete(){
    
    $db=connect();
    $stmt=$db->prepare("SELECT DISTINCT s.noserv FROM `serv` AS s
                        INNER JOIN `emp` AS e 
                        ON e.noserv= s.noserv
                        WHERE e.noserv IN (SELECT DISTINCT e.noserv FROM `emp` AS e)");
    $stmt->execute();
    $rs=$stmt->get_result();
    $donnees=$rs->fetch_all(MYSQLI_ASSOC);
  
    return $donnees;
    
}
?>