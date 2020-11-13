<?php
// if (!$_SESSION) {
//     header('location: ../controler/indexControler.php');
// }
    include_once(__DIR__ .'/../service/ServicesService.php');
    include_once(__DIR__ . '/../presentation/servicepres.php ');

    

        // ajouter
            if (isset($_GET['action']) && $_GET["action"]=="ajout" && !empty($_POST) &&
                isset($_POST['noserv']) && !empty($_POST['noserv'])){

                    $noserv=$_POST['noserv'];
                    $serv=$_POST['serv']? $_POST['serv'] : NULL;
                    $ville=$_POST['ville']? $_POST['ville'] : NULL;

                        $rs= ServicesService :: addService($noserv, $serv, $ville);
                        
                        /* affiche un message en cas d'échec ou de réussite de l'ajout*/
                        html();
                        afficherMess($rs, $_POST['noserv']);
                    }
            
            
            // supprimer
            elseif (isset($_GET['action']) && $_GET["action"]=="delete" && 
                    isset($_GET['noserv'])){

                        $rs=ServicesService:: deleteService($_GET['noserv']);

                        html();
                        afficherMessDel($rs, $_GET['noserv']);
                    
            }
        
            
            //modifier
            elseif (isset($_GET["action"]) && $_GET["action"]=="modifier" && 
                    isset($_POST['noserv']) && !empty($_POST['noserv'])){
                        
                        $noserv=$_GET['noserv'];
                        $serv=$_POST['serv']? $_POST['serv'] : NULL;
                        $ville=$_POST['ville']? $_POST['ville'] : NULL;

                        $rs = ServicesService :: modifServ($noserv, $serv, $ville);

                        //affichage réussite ou échec de l'action
                        html();
                        afficherMessModif($rs);
                        
                    }

            //consulter
            if (isset ($_GET["action"]) && $_GET["action"]=="consulter" && 
                isset($_GET['noserv']) && !empty($_GET['noserv'])){

                    //CONSULTATION
                    $data= ServicesMysqliDao ::researchNE($_GET['noserv']);

                    html();
                    boutons($_GET, $_SESSION['profil']);
                    affichagetb($_SESSION['profil'], $_GET);
                    consultation($data);
            }

            //affichage globale
            else{
                $data= ServicesMysqliDao :: research();
                $donnees= ServicesMysqliDao :: tridelete();
                $nomvalue='noserv';
                $taille=count($donnees);

                html();
                boutons($_GET, $_SESSION['profil']);
                affichagetb($_SESSION['profil'], $_GET);
                affichageGlobal($data, $_SESSION['profil'], $donnees, $nomvalue, $taille);
            
            }

?>