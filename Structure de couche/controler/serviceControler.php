<?php

    include_once('../service/ServicesService.php');

        // ajouter
            if (isset($_GET['action']) && $_GET["action"]=="ajout" && !empty($_POST) &&
                isset($_POST['noserv']) && !empty($_POST['noserv'])){

                    $noserv=$_POST['noserv'];
                    $serv=$_POST['serv']? $_POST['serv'] : NULL;
                    $ville=$_POST['ville']? $_POST['ville'] : NULL;

                        $rs= ServicesService :: addService($noserv, $serv, $ville);
                        
                        /* affiche un message en cas d'échec ou de réussite de l'ajout*/
                        if ($rs){ ?>
                            <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
                                <p class="text-center p-0 m-0"> Le service n° <?php echo($_POST['noserv']) ?> a bien été ajouté . </p>
                            </div>
                        <?php }else { ?>
                            <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
                                <p class="text-center p-0 m-0"> Echec de l'ajout </p>
                            </div>
                        <?php }
                    }
            
            
            // supprimer
            elseif (isset($_GET['action']) && $_GET["action"]=="delete" && 
                    isset($_GET['noserv'])){

                        ServicesService:: deleteService($_GET['noserv']); ?>

                        <!-- message de succès -->
                        <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
                            <p class="text-center p-0 m-0"> Le service n° <?php echo($_GET['noserv']) ?> a bien été supprimé . </p>
                        </div>
            <?php
            }
        
            
            //modifier
            elseif (isset($_GET["action"]) && $_GET["action"]=="modifier" && 
                    isset($_POST['noserv']) && !empty($_POST['noserv'])){
                        
                        $noserv=$_GET['noserv'];
                        $serv=$_POST['serv']? $_POST['serv'] : NULL;
                        $ville=$_POST['ville']? $_POST['ville'] : NULL;

                        $rs = ServicesService :: modifService($noserv, $serv, $ville);

                        //affichage réussite ou échec de l'action
                        if ($rs){ ?>
                            <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
                                <p class="text-center p-0 m-0">  Les modifications ont bien été enregistrées . </p>
                            </div>
                        <?php }else { ?>
                            <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
                                <p class="text-center p-0 m-0"> Echec des modifications </p>
                            </div>
                        <?php }
                        
                    }

            //consulter

                            ?>