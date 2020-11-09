<?php

include_once('../service/EmployesService.php');

    // ajouter
            if (isset($_GET['action']) && $_GET['action']=="ajout" &&
                isset($_POST['noemp']) && !empty($_POST['noemp'])){

                    $noemp=$_POST['noemp'];
                    $nom=$_POST['nom']? $_POST['nom'] : NULL;
                    $prenom=$_POST['prenom']? $_POST['prenom'] : NULL;
                    $emploi=$_POST['emploi']? $_POST['emploi'] : NULL;
                    $sup=$_POST['sup']? $_POST['sup'] : NULL;
                    $embauche=$_POST['embauche']? $_POST['embauche'] : NULL;
                    $sal=$_POST['sal']? $$_POST['sal'] : NULL;
                    $comm=$_POST['comm']? $_POST['comm'] : NULL;
                    $noemp=$_POST['noemp']? $_POST['noemp'] : NULL;

                    $rs= EmployesService :: addEmp($noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv);
                    
                    /* affiche un message en cas d'échec ou de réussite de l'ajout*/
                    if ($rs){ ?>
                        <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
                            <p class="text-center p-0 m-0"> Le service n° <?php echo($_POST['noemp']) ?> a bien été ajouté . </p>
                        </div>
                    <?php }else { ?>
                        <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
                            <p class="text-center p-0 m-0"> Echec de l'ajout </p>
                        </div>
                    <?php }
                }
        
    
    // supprimer
    elseif (isset($_GET['action']) && $_GET['action']=="ajout" &&
            isset($_POST['noemp']) && !empty($_POST['noemp'])){

                EmployesService:: deleteEmp($_GET['noemp']); ?>

                <!-- message de succès -->
                <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
                    <p class="text-center p-0 m-0"> Le service n° <?php echo($_GET['noemp']) ?> a bien été supprimé . </p>
                </div>
    <?php
    }

    
    //modifier
    elseif (isset($_GET['action']) && $_GET['action']=="ajout" &&
            isset($_POST['noemp']) && !empty($_POST['noemp'])){

                $noemp=$_GET['noemp'];
                $nom=$_POST['nom']? $_POST['nom'] : NULL;
                $prenom=$_POST['prenom']? $_POST['prenom'] : NULL;
                $emploi=$_POST['emploi']? $_POST['emploi'] : NULL;
                $sup=$_POST['sup']? $_POST['sup'] : NULL;
                $embauche=$_POST['embauche']? $_POST['embauche'] : NULL;
                $sal=$_POST['sal']? $$_POST['sal'] : NULL;
                $comm=$_POST['comm']? $_POST['comm'] : NULL;
                $noemp=$_POST['noemp']? $_POST['noemp'] : NULL;

                $rs = EmployesService :: modifEmp($noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv);

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