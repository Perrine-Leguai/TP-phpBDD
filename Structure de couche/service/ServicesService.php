<?php 
    include_once '../Controler/serviceControler.php';
    include_once '../dao/ServicesMysqliDao.php';

    class serviceService {
        public static function addService (int $id, string $serv,string $ville) : void{
            $service = new Service();
            $service->setNoserv($id)->setServ($serv)->setVille($ville);
            ServicesMysqliDao :: add($service);
        }

        public static function deleteService(int $getserv) :Void {
            Service_mysqli_DAO::delete($getserv);
        }

        public static function modifServ(int $id, string $serv, string $ville) : void{
            $service = new Service();
            $service->setNoserv($id)->setServ($serv)->setVille($ville);
            ServicesMysqliDao :: edit($service);
        }
    }
?>