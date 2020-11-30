<?php

include_once(__DIR__ . '/../4presentation/formEmppres.php');
include_once(__DIR__ .'/../1dao/EmployesMysqliDao.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once(__DIR__ .'/../3controler/ExceptionControler.php');

if (!$_SESSION) {
    header('location: ../3controler/indexControler.php');
}
html();

    // AJOUTER UN EMPLOYE
    if (empty($_GET)){
        $action="ajout";
        $data= null;
        try{
            formulaire($action, $data);
        }catch(ExceptionService $econ){
            afficherMessage($econ->getCode());;
        }catch(Exception $econ){
            echo "site en maintenance, merci de revenir ultérieurement";
        }
    }

    // MODIFIER LES DONNEES  
    elseif ( !empty($_GET) && $_GET['action']=='modifier' && 
        isset($_GET['noemp']) && !empty($_GET['noemp'])){

                    $action='modifier';
                    try{
                        $employe=EmployesMysqliDao :: researchNE($_GET['noemp']);
                        formulaire($action, $employe);
                    }catch(ExceptionService $econ){
                        afficherMessage($econ->getCode());;
                    }catch(Exception $econ){
                        echo "site en maintenance, merci de revenir ultérieurement";
                    }
    } 

finhtml();

