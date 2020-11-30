<?php 
    
    include_once(__DIR__ .'/../1dao/ServicesMysqliDao.php');
    require_once(__DIR__ . '/../2service/CommunService.php');
    require_once(__DIR__.'/../2service/InterfaceServServ.php');
    require_once(__DIR__.'/../2service/ExceptionService.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class ServicesService implements InterfaceServService, CommunService{
        public function addService (?int $id, ?string $serv, ?string $ville){
            try{
              $service = new Service();
                $service->setNoserv($id)->setServ($serv)->setVille($ville);
                $rs=ServicesMysqliDao :: add($service);
            return $rs;  
            }catch(ExceptionDAO $eserv){
                throw new ExceptionService( $eserv->getCode());
            }catch(Exception $eserv){
                throw new ExceptionService( $eserv->getCode());
            }
        }

        public  function deleteS(?int $getserv)  {
            try{
                $rs=ServicesMysqliDao ::delete($getserv);
                return $rs;
            }catch(ExceptionDAO $eserv){
                throw new ExceptionService( $eserv->getCode());
            }catch(Exception $eserv){
                throw new ExceptionService( $eserv->getCode());
            }
        }

        public  function modifServ(?int $id, ?string $serv, ?string $ville) {
            try{
                $service = new Service();
                $service->setNoserv($id)->setServ($serv)->setVille($ville);
                $rs=ServicesMysqliDao :: edit($service);
                return $rs;
            }catch(ExceptionDAO $eserv){
                throw new ExceptionService( $eserv->getCode());
            }catch(Exception $eserv){
                throw new ExceptionService( $eserv->getCode());
            }
        }

        public  function tableau(){
            try{
                return ServicesMysqliDao :: research();
            }catch(ExceptionDAO $eserv){
                throw new ExceptionService( $eserv->getCode());
            }catch(Exception $eserv){
                throw new ExceptionService( $eserv->getCode());
            }
        }
    }
?>