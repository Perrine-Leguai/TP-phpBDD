<?php

include_once(__DIR__ . '/../presentation/formEmppres.php');
include_once(__DIR__ .'/../dao/EmployesMysqliDao.php');

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
        isset($_GET['noemp']) && !empty($_GET['noemp'])){

                    $action='modifier';
                    $data=EmployesMysqliDao :: researchNE($_GET['noemp']);
                    formulaire($action, $data);
    } 

finhtml();

