<?php 
    include_once '../Controler/employesControler.php';
    include_once '../dao/EmployesMysqliDao.php';

    class EmployesService {

        public static function addEmp(int $id, string $nom,string $prenom, string $emploi, int $sup, string $embauche, float $sal, float $comm, int $noserv) : void{
                $emp= new Employe();
                $emp->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoServ($noserv);
                EmployesMysqliDao :: add($emp);
        }

        public static function deleteEmp(int $getnoemp) :Void {
            EmployesMysqliDao::delete($getnoemp);
        }

        public static function modifEmp(int $id, string $nom,string $prenom, string $emploi, int $sup, string $embauche, float $sal, float $comm, int $noserv) : void{
            $emp= new Employe();
            $emp->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoServ($noserv);
            EmployesMysqliDao :: edit($emp);
        }
    
    }