<?php
include_once('crud.php');

if (isset ($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['mdp']) && !empty($_POST['mdp'])){

        $hash= PASSWORD_HASH($_POST['mdp'], PASSWORD_DEFAULT);

        insertUser($_POST['email'], $hash , 'utilisateur') . "\n";
        "\n" . verif($_POST['mdp'], $hash);
        checkConnection($_POST['email'], $hash);
    }

