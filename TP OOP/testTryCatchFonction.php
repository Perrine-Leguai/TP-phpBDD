<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once('exception.php');

function connect (){
    try{
        $db= new mysqli('localhost','perrine.leguai','Mysql2020','gestion_employes');
        return $db;
    }catch (mysqli_sql_exception $mse){
        throw new ExceptionDetectee("aie, aie, aie", 1900);
    }

}



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

    try{
        $db=connect();
        
        // on insère les nouvelles données
        $stmt=$db->prepare("INSERT INTO emp values (?,?,?,?,?,?,?,?,?)") ;
        $stmt->bind_param('isssisddi', $a, $b,$c, $d, $e, $f, $g, $h, $i);
    
        $rs=$stmt->execute();
        $db->close();
        return $rs;
    }catch(mysqli_sql_exception $mse){
            throw new ExceptionDetectee($mse->getMessage(), 2000);
        
    }
    
    
    
}

public function add(object $employe)
    {
        try {
            $noemp = $employe->getNo_emp();
            $nom= $employe->getNom();
            $prenom= $employe->getPrenom();
            $emploi = $employe->getEmploi();
            $embauche = $employe->getEmbauche()->format('Y-m-d');
            $sal = $employe->getSal();
            $comm = $employe->getComm();
            $noserv = $employe->getNoserv();
            $sup = $employe->getSup();
            $noproj = $employe->getNoproj();

            $connexion = new Connexion();
            $db = $connexion->connexion();

            $stmt = $db->prepare("INSERT INTO employe VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


            $stmt->bind_param('issssddiii', $noemp, $nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj);
            if ($stmt->execute())
            {
                echo "<script>alert('employe ajouter')</script>";
            }
            else 
                echo "<script>alert('non ajouter')</script>";
            $db->close(); 
        }
        catch (ExecuteException $e) {
            throw new ExecuteException("Erreur lors de l'ajout de l'employé", 7010);
        }
        catch (mysqli_sql_exception $e) {
            throw new Exception("Cet employé existe déjà", 7110);
        } 
    }