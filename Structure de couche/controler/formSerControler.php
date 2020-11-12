<?php

include_once(__DIR__ . '/../presentation/formSerpres.php');
include_once(__DIR__ .'/../dao/ServicesMysqliDao.php');

if (!$_SESSION) {
    header('location: ../controler/indexControler.php');
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
                    $data= ServicesMysqliDao :: consult($_GET['noserv']);
                    formulaire($action, $data);
    } 

finhtml();
