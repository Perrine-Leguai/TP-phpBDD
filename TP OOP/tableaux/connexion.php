<?php 

function connect (){

    $db = mysqli_init();
    mysqli_real_connect($db,'localhost',"perrine.leguai","Mysql2020",'gestion_employes');
    
    return $db;
}


?>