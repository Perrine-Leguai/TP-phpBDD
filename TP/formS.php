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
<div class="services column col-4 container-fluid ">
    <div class="text-center m-2"><h3>Services</h3><br></div>
    <?php

        // AJOUTER QUELQU'UN
        if (empty($_GET)){
        ?>
        <form action="services.php?action=ajout" method="post">
            <div class="d-flex">
                <label for="NumeroService"> N° service </label>
                <input type="number" name="noserv" id ="NumeroService" placeholder="ex : 2">
            </div>
            <div>
                <label for="Service"> Service </label>
                <input type="text" name="serv" id ="Service" placeholder="ex: logistique">
            </div>
            <div>
                <label for="ville"> Ville </label>
                <input type="text" name="ville" id ="ville" placeholder="ex : Seclin">
            </div>
            <div>
                <button type="submit"  class="btn btn-primary"> Ajouter</button>
            </div>
            </form>
        <?php
            }


        // MODIFIER LES DONNEES  
        elseif ($_GET['action']=='modifier' && 
                isset($_GET['noserv']) && !empty($_GET['noserv'])){


                        $noserv= $_GET['noserv'];
                        $db = mysqli_init();
                        mysqli_real_connect($db,'localhost','root','','afpatest');
                        $rs = mysqli_query ($db, "select * from services where noserv='$noserv'");
                        $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
                        
                        mysqli_free_result($rs);
                        mysqli_close($db);
                        
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