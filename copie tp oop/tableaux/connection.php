<?php 

function connect (){

    $db = new mysqli('localhost','perrine.leguai','Mysql2020','gestion_employes');
    
    return $db;
}


?>