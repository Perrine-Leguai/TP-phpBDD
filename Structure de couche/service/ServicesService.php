<?php 
    
    include_once(__DIR__ .'/../dao/ServicesMysqliDao.php');

    class ServicesService {
        public static function addService (int $id, string $serv,string $ville) : void{
            $service = new Service();
            $service->setNoserv($id)->setServ($serv)->setVille($ville);
            ServicesMysqliDao :: add($service);
        }

        public static function deleteService(int $getserv)  {
            $rs=ServicesMysqliDao ::delete($getserv);
            return $rs;
        }

        public static function modifServ(int $id, string $serv, string $ville) {
            $service = new Service();
            $service->setNoserv($id)->setServ($serv)->setVille($ville);
            $rs=ServicesMysqliDao :: edit($service);
            return $rs;
        }

        public static function tableau(){
            return ServicesMysqliDao :: research();
        }
    }
?>