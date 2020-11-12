<?php
include_once(__DIR__.'/../presentation/indexpres.php');

if (empty($_GET)){
    menu();
}

elseif (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action']=="connection"){
    html();
    if (isset($_GET['p']) && $_GET['p']=="nomail"){
        $test="Mail invalide ou non lié à un compte";
    }elseif (isset($_GET['p']) && $_GET['p']=='nompd'){
        $test="Mot de passe invalide";
    } else {
        $_GET['p'] = "rien";
        $test=" ";
    }
    connexion($_GET['p'],$test);

}
elseif (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action']=="inscription"){
    html();
    if(empty($_GET['p']) && !isset($_GEt['p'])){
        $_GET['p']="rien";
    }
    inscription($_GET['p']);
}