<?php
// if (!$_SESSION) {
//     header('location: ../controler/indexControler.php');
// }

include_once(__DIR__ .'/../service/EmployesService.php');
include_once(__DIR__ . '/../presentation/employepres.php ');


    // ajouter
    if (isset($_GET['action']) && $_GET['action']=="ajout" &&
        isset($_POST['noemp']) && !empty($_POST['noemp'])){

            $noemp=$_POST['noemp'];
            $nom=$_POST['nom']? $_POST['nom'] : NULL;
            $prenom=$_POST['prenom']? $_POST['prenom'] : NULL;
            $emploi=$_POST['emploi']? $_POST['emploi'] : NULL;
            $sup=$_POST['sup']? $_POST['sup'] : NULL;
            $embauche=$_POST['embauche']? $_POST['embauche'] : NULL;
            $sal=$_POST['sal']? $_POST['sal'] : NULL;
            $comm=$_POST['comm']? $_POST['comm'] : NULL;
            $noserv=$_POST['noserv']? $_POST['noserv'] : NULL;

            $rs=EmployesService :: addEmp($noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv);
            
            /* affiche un message en cas d'échec ou de réussite de l'ajout*/
            
            html();
            afficherMess($rs,$_POST['noemp']);
                            
                    
    }
        
    // supprimer
    elseif (isset($_GET['action']) && $_GET['action']=="delete" &&
            isset($_GET['noemp']) && !empty($_GET['noemp'])){

            $rs=EmployesService:: deleteEmp($_GET['noemp']);

            html();
            afficherMessDel($rs, $_GET['noemp']); 
            
    }

    
    //modifier
    elseif (isset($_GET['action']) && $_GET['action']=="modifier" &&
            isset($_POST['noemp']) && !empty($_POST['noemp'])){

                $noemp=$_GET['noemp'];
                $nom=$_POST['nom']? $_POST['nom'] : NULL;
                $prenom=$_POST['prenom']? $_POST['prenom'] : NULL;
                $emploi=$_POST['emploi']? $_POST['emploi'] : NULL;
                $sup=$_POST['sup']? $_POST['sup'] : NULL;
                $embauche=$_POST['embauche']? $_POST['embauche'] : NULL;
                $sal=$_POST['sal']? $_POST['sal'] : NULL;
                $comm=$_POST['comm']? $_POST['comm'] : NULL;
                $noserv=$_POST['noserv']? $_POST['noserv'] : NULL;

                $rs = EmployesService :: modifEmp($noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv);

                html();
                afficherMessModif($rs); 
                
    }

    //consulter
    if (isset ($_GET["action"]) && $_GET["action"]=="consulter" && 
                isset($_GET['noemp']) && !empty($_GET['noemp'])){

                    //CONSULTATION
                    $emp= EmployesMysqliDao :: researchNE($_GET['noemp']);
                    

                    html();
                    boutons($_GET, $_SESSION['profil']);
                    affichagetb($_SESSION['profil'], $_GET);
                    consultation($emp, $_SESSION['profil']);
    }
    
    //affichage globale
    else{
        $data= EmployesMysqliDao :: research();
        
        $donnees= EmployesMysqliDao :: tridelete();
        $nomvalue='noemp';
        $taille=count($donnees);

        html();
        boutons($_GET, $_SESSION['profil']);
        affichagetb($_SESSION['profil'], $_GET);
        affichageGlobal($data, $_SESSION['profil'], $donnees, $nomvalue, $taille);
    
    }