<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Service</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    
    <?php

    include_once(__DIR__ .'/../dao/ServicesMysqliDao.php');
        
        // AJOUTER QUELQU'UN 
        if (empty($_GET)){
            $action="ajout";
        }

        // MODIFIER LES DONNEES
        elseif (!empty($_GET) && $_GET['action']== 'modifier' && 
                isset($_GET['noserv']) && !empty($_GET['noserv'])){
                    
                    $action='modifier';
                    $data= ServicesMysqliDao :: consult($_GET['noserv']);
                }
    ?>

<!-- CATEGORIE -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="employes col-6 offset-3  m-2  ">
                <div class="row justify-content-md-center m-4">
                    <h3 class="employes col-4   ">Services</h3>
                </div>

                <!-- formulaire d'ajout -->
                <div class="row">        
                    <div class="col-12">
                        <div>
                            <form action="<?php  if( $action == "modifier"){ echo "../controler/serviceControler.php?action=modifier"; }else{ echo "../controler/serviceControler.php?action=ajout" ; } ?>&amp;noserv=<?php if( $action== "modifier"){echo $_GET['noserv']; }?>" method="POST">
                                <div class="row justify-content-md-center">
                                    <!-- NOSERV -->
                                    <div class="d-flex justify-content-end m-2 p-1">
                                        <label for="NumeroService"> N° service : </label>
                                        <input type="number" name="noserv" id ="NumeroService" placeholder="ex : 2" value="<?php if ($action =='modifier'){ echo $data['noserv'];}?>">
                                    </div>
                                    <!-- SERVICES -->
                                    <div class="d-flex justify-content-end m-2 p-1">
                                        <label for="Service"> Service : </label>
                                        <input type="text" name="serv" id ="Service" placeholder="ex: logistique" value="<?php if ($action =='modifier'){ echo $data['serv'];}?>">
                                    </div>
                                    <!-- VILLE -->
                                    <div class="d-flex justify-content-end m-2 p-1">
                                        <label for="ville"> Ville : </label>
                                        <input type="text" name="ville" id ="ville" placeholder="ex : Seclin" value="<?php if ($action =='modifier'){ echo $data['ville'];}?>">
                                    </div>
                                    <div class="d-flex justify-content-center m-4" > 
                                        <button type="submit"  class="btn btn-primary"> <?php if ($action == "modifier"){ echo ("Modifier") ;} else{ echo "Ajouter" ;}?></button>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>                     
            </div>
        </div>
    </div>

                                    
</body>
</html>