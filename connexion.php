<?php 

function connect (){

    $db = mysqli_init();
    mysqli_real_connect($db,'localhost','root','','afpatest');
    
    return $db;
}


?>