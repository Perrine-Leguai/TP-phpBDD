<?php mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// nom_exception mysqli: mysqli_sql_exception 

    require("testTryCatchFonction.php");
    require_once("exception.php");


$objet=new Objet();
$objet->setNoemp(1000)->setNoserv(7);


    try{
        add ($objet); 
    }catch(ExceptionDetectee $ed){
        
        echo ($ed->message);
        print_r($ed->code);
    }

// $driver= new mysqli_driver();
// $driver->report_mode= MYSQLI_REPORT_ERROR;

// print ($driver->report_mode);