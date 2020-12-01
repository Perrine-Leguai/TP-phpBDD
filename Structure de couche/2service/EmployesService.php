<?php 
    
    include_once(__DIR__ .'/../1dao/EmployesMysqliDao.php');
    require_once(__DIR__.'/../2service/InterfaceEmpService.php');
    require_once(__DIR__ . '/../2service/CommunService.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    require_once('ExceptionService.php');

    class EmployesService implements InterfaceEmpService, CommunService{

        public  function addEmp(int $id, ?string $nom, ?string $prenom, ?string $emploi, ?int $sup, ?string $embauche, ?float $sal, ?float $comm, int $noserv, string $dateAjout) {
                $emp= new Employe();
                $emp->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoServ($noserv)->setDateAjout($dateAjout);
                try{
                    $rs=EmployesMysqliDao :: add($emp);
                    return $rs;
                }catch(ExceptionDAO $eserv){
                    throw new ExceptionService( $eserv->getCode());
                }catch(Exception $eserv){
                    throw new ExceptionService( $eserv->getCode());
                }
        }

        public  function deleteS(int $getnoemp)  {
            try{
                $rs=EmployesMysqliDao::delete($getnoemp);
                return $rs;
            }catch(ExceptionDAO $eserv){
                throw new ExceptionService( $eserv->getCode());
            }catch(Exception $eserv){
                throw new ExceptionService( $eserv->getCode());
            }
        }

        public  function modifEmp(int $id, ?string $nom, ?string $prenom, ?string $emploi, ?int $sup, ?string $embauche, ?float $sal, ?float $comm, int $noserv, string $dateAjout) {
            $emp= new Employe();
            $emp->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoServ($noserv)->setDateAjout($dateAjout);
            try{
                $rs=EmployesMysqliDao :: edit($emp);
                return $rs;
            }catch(ExceptionDAO $eserv){
                throw new ExceptionService( $eserv->getCode());
            }catch(Exception $eserv){
                throw new ExceptionService( $eserv->getCode());
            }
        }
    
        public  function tableau($where=null){
            try{
              return EmployesMysqliDao :: research($where);  
            }catch(ExceptionDAO $eserv){
                throw new ExceptionService( $eserv->getCode());
            }catch(Exception $eserv){
                throw new ExceptionService( $eserv->getCode());
            }
            
        }

        public function nbrAjoutCService(){
            try{
                return EmployesMysqliDao :: nombreAjout();
            }catch(ExceptionDAO $eserv){
                throw new ExceptionService( $eserv->getCode());
            }catch(Exception $eserv){
                echo "pb serveur";
            }
        }
    }