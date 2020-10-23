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
    
<!-- CATEGORIE SERVICES -->
<div class="services">
    <h3>Services</h3><br>
    <?php

        // MODIFIER LES DONNEES  
        if ($_GET['action']=='modifier' && 
            isset($_GET['noserv']) && !empty($_GET['noserv'])){


                        $noserv= $_GET['noserv'];
                        $action=$_GET['action'];

                        $db = mysqli_init();
                        mysqli_real_connect($db,'localhost','root','','afpatest');
                        $rs = mysqli_query ($db, "select * from services where noserv='$noserv'");
                        $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
                        
                        mysqli_free_result($rs);
                        mysqli_close($db);
        }
                        
        // AJOUTER QUELQU'UN
        elseif (empty($_GET)){
            $action="ajout";
        }

        ?>
        <div class="container-fluid row">
            <div class="col-4">
                <form action="<?php  if( $action == "modify"){ ?>modif_employes.php?action=modify<?php }elseif($action=="ajout"){?>modif_employes.php?action=ajout<?php } ?>&no_employe=<?php if( $action== "modify"){echo $data['noemp']; }?>" method="POST">
            </div>
        </div>    
        <form action="services.php?action=ajout" method="post">
            <label for="NumeroService"> N° service </label>
            <input type="number" name="noserv" id ="NumeroService" placeholder="ex : 2">
            <label for="Service"> Service </label>
            <input type="text" name="serv" id ="Service" placeholder="ex: logistique">
            <label for="ville"> Ville </label>
            <input type="text" name="ville" id ="ville" placeholder="ex : Seclin">
            <button type="submit"  class="btn btn-primary"> Ajouter</button>
        </form>
        <?php
            


        
                        
                ?>
                
        <form action="services.php?action=modifier&noserv=<?php echo $_GET['noserv'];?>" method="post">
        <label for="NumeroService"> N° service </label>
            <input type="number" name="noserv" id ="NumeroService" value=<?php echo $data['noserv'] ?>>
            <label for="Service"> Service </label>
            <input type="text" name="serv" id ="Service" value=<?php echo $data['serv'] ?>>
            <label for="ville"> Ville </label>
            <input type="text" name="ville" id ="ville" value=<?php echo $data['ville'] ?>>
            <button type="submit"  class="btn btn-primary"> Modifier</button>

        </form>
        <?php 
            }
            ?>
</div>
</body>
</html>