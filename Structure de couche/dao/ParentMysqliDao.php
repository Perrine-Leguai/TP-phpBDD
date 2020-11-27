<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class ParentMysqliDao {
    
    public static function connect (){
        try{
          $db = new mysqli('localhost','perrine.leguai','Mysql2020','gestion_employes');  
          return $db;
        }catch(mysqli_sql_exception $mse){
            throw new ExceptionDAO("Connexion à la base de donnée impossible", 1900);
        }
    }
}
?>