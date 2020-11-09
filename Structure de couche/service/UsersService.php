<?php
include_once(__DIR__ .'/../dao/UserMysqliDao.php');
include_once(__DIR__ . '/../controler/userControler.php');

        
class UsersService {

    public static function addUser(string $mdp, string $email) {

        // hash le mdp
        $hash= PASSWORD_HASH($mdp, PASSWORD_DEFAULT);
        // insert un nouvel utilisateur
        $rs= UserMysqliDao :: insertUser($email, $hash , 'utilisateur');

        return $rs;

        
    }
        
    public static function testCo($email){
        $data= UserMysqliDao ::searchUserMail($email);
        return $data;
    }

    public static function checkMdp($mdp, $dataMdp){
        $rs= password_verify($mdp, $dataMdp);
        return $rs;
    }

}
?>
