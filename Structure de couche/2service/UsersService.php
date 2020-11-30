<?php
include_once(__DIR__ .'/../1dao/UserMysqliDao.php');
include_once(__DIR__ . '/../3controler/userControler.php');
require_once(__DIR__.'/../2service/ExceptionService.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        
class UsersService {

    public static function addUser(string $mdp, string $email) {
        try{
            // hash le mdp
            $hash= PASSWORD_HASH($mdp, PASSWORD_DEFAULT);
            // insert un nouvel utilisateur
            $rs= UserMysqliDao :: insertUser($email, $hash , 'utilisateur');

            return $rs;
        }catch(ExceptionDAO $eserv){
            throw new ExceptionService( $eserv->getCode());
        }catch(Exception $eserv){
            throw new ExceptionService( $eserv->getCode());
        }
    }
        
    public static function testCo($email){
        try{
            $data= UserMysqliDao ::searchUserMail($email);
            return $data;
        }catch(ExceptionDAO $eserv){
            throw new ExceptionService($eserv->getCode());
        }catch(Exception $eserv){
            throw new ExceptionService( $eserv->getCode());
        }
    }

    public static function checkMdp($mdp, $dataMdp){
        try{
            $rs= password_verify($mdp, $dataMdp);
            return $rs;
        }catch(ExceptionDAO $eserv){
            throw new ExceptionService( $eserv->getCode());
        }catch(Exception $eserv){
            throw new ExceptionService( $eserv->getCode());
        }
    }

}
?>
