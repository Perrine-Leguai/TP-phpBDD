<?php

include_once(__DIR__ . '/../4presentation/formSerpres.php');
include_once(__DIR__ .'/../1dao/ServicesMysqliDao.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once(__DIR__ .'/../3controler/ExceptionControler.php');

if (!$_SESSION) {
    header('location: ../3controler/indexControler.php');
}
html();

    // AJOUTER UN EMPLOYE
    if (empty($_GET)){
        $action="ajout";
        $data= "";
        formulaire($action, $data);
    }

    // MODIFIER LES DONNEES  
    elseif ( !empty($_GET) && $_GET['action']=='modifier' && 
        isset($_GET['noserv']) && !empty($_GET['noserv'])){

                $action='modifier';
                try{
                    $data= ServicesMysqliDao :: consult($_GET['noserv']);
                    formulaire($action, $data);
                }catch(ExceptionService $econ){
                    afficherMessage($econ->getCode());
                }catch(Exception $econ){
                    throw new Exception( $econ->getCode());
                }
    } 

finhtml();
