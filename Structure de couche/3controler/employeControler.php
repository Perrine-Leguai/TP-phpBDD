<?php
// if (!$_SESSION) {
//     header('location: ../controler/indexControler.php');
// }

include_once(__DIR__ .'/../2service/EmployesService.php');
include_once(__DIR__ . '/../4presentation/employepres.php ');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once('exceptionControler.php');

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

            try{
                $rs=EmployesService :: addEmp($noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv);
            
                /* affiche un message en cas d'échec ou de réussite de l'ajout*/
                
                html();
                afficherMess($rs,$_POST['noemp']);
            }catch(ExceptionService $econ){
                afficherMessage($econ->getCode());
            }catch(Exception $econ){
                echo "site en maintenance, merci de revenir ultérieurement";
            }
            
                            
                    
    }
        
    // supprimer
    elseif (isset($_GET['action']) && $_GET['action']=="delete" &&
            isset($_GET['noemp']) && !empty($_GET['noemp'])){
            try{
                $rs=EmployesService:: deleteEmp($_GET['noemp']);

                html();
                afficherMessDel($rs, $_GET['noemp']); 
            }catch(ExceptionService $econ){
                afficherMessage($econ->getCode());
            }catch(Exception $econ){
                echo "site en maintenance, merci de revenir ultérieurement";
            }
            
            
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
                try{
                    $rs = EmployesService :: modifEmp($noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv);

                    html();
                    afficherMessModif($rs); 
                }catch(ExceptionService $econ){
                    afficherMessage($econ->getCode());
                }catch(Exception $econ){
                    echo "site en maintenance, merci de revenir ultérieurement";
                }
    }

    //consulter
    if (isset ($_GET["action"]) && $_GET["action"]=="consulter" && 
                isset($_GET['noemp']) && !empty($_GET['noemp'])){
                    try{
                        //CONSULTATION
                        $emp= EmployesMysqliDao :: researchNE($_GET['noemp']);
                        html();
                        boutons($_GET, $_SESSION['profil']);
                        affichagetb($_SESSION['profil'], $_GET);
                        consultation($emp, $_SESSION['profil']);
                    }catch(ExceptionService $econ){
                        afficherMessage($econ->getCode());
                    }catch(Exception $econ){
                        echo "site en maintenance, merci de revenir ultérieurement";
                    }
    }
    
    //affichage globale
    else{
        try{
            $data= EmployesMysqliDao :: research();
            
            $donnees= EmployesMysqliDao :: rechercheSup();
            $nomvalue='noemp';
            $taille=count($donnees);

            html();
            boutons($_GET, $_SESSION['profil']);
            affichagetb($_SESSION['profil'], $_GET);
            affichageGlobal($data, $_SESSION['profil'], $donnees, $nomvalue, $taille);
        }catch(ExceptionService $econ){
            afficherMessage($econ->getCode());
        }catch(Exception $econ){
            echo "site en maintenance, merci de revenir ultérieurement";
        }
    
    }