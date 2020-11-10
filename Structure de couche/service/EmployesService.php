<?php 
    
    include_once(__DIR__ .'/../dao/EmployesMysqliDao.php');

    class EmployesService {

        public static function addEmp(int $id, ?string $nom, ?string $prenom, ?string $emploi, ?int $sup, ?string $embauche, ?float $sal, ?float $comm, int $noserv) {
                $emp= new Employe();
                $emp->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoServ($noserv);
                $rs=EmployesMysqliDao :: add($emp);
                return $rs;
        }

        public static function deleteEmp(int $getnoemp)  {
            $rs=EmployesMysqliDao::delete($getnoemp);
            return $rs;
        }

        public static function modifEmp(int $id, ?string $nom, ?string $prenom, ?string $emploi, ?int $sup, ?string $embauche, ?float $sal, ?float $comm, int $noserv) {
            $emp= new Employe();
            $emp->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoServ($noserv);
            $rs=EmployesMysqliDao :: edit($emp);
            return $rs;
        }
    
        public static function tableau(){
            return EmployesMysqliDao :: research();
        }
    }