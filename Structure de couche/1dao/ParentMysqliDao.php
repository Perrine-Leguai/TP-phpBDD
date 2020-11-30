<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// include_once(__DIR__ . '/../4presentation/userpres.php');

class ParentMysqliDao {
    
    public static function connect (){
        try{
          $db = new mysqli('localhost','perrine.leguai','Mysql2020','gestion_employes');  
          return $db;
        }catch(mysqli_sql_exception $mse){
            afficherMessage($mse->getCode());
        }
    }
}
?>