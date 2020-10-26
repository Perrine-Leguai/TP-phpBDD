<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
<a href="formulaire.php"><button type="button" class="btn btn-primary btn-lg" >Remplir le questionnaire</button></a>
    <?php 

        include 'crudE.php';
   
         // AJOUTER
        if (isset($_GET['action']) && $_GET['action']=="ajout" &&
            isset($_POST['noemp']) && !empty($_POST['noemp'])){ 
                                        
                    add($_POST['noemp'],$_POST['nom'], $_POST['prenom'],$_POST['emploi'],$_POST['embauche'],$_POST['sal'],$_POST['comm'],$_POST['sup'],$_POST['noserv'],$_POST['noproj']);
                    
        } 

        // SUPPRIMER
        elseif (isset($_GET["action"]) && $_GET["action"]=="delete" && 
                isset($_GET['noemp'])){                 

                    delete($_GET['noemp']);
        }

        // MODIFIER
        elseif (isset($_GET["action"]) && $_GET["action"]=="modifier" && 
                isset($_POST['noemp']) && !empty($_POST['noemp'])){

                edit($_GET['noemp'],$_POST['nom'], $_POST['prenom'], $_POST['emploi'], $_POST['embauche'], $_POST['sal'], $_POST['comm'], $_POST['sup'], $_POST['noserv'], $_POST['noproj'] );
                
            }

    ?>
<!-- afficher tableau -->
<table class="table stripped table-hover">
    <thead class="thead-light table-bordered" >
        <tr>
            <th> N° Employé </th>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Emploi </th>
            <th> Embauche </th>
            <th> Salaire </th>
            <th> Commission </th>
            <th> Supérieur </th>
            <th> N° Service </th>
            <th> N° projet </th>
            <th> Supprimer </th>
            <th> Modifier </th>
            <th> Consulter </th>
        </tr>
    </thead>
    <tfoot class="thead-light table-bordered" >
        <tr>
            <th> N° Employé </th>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Emploi </th>
            <th> Embauche </th>
            <th> Salaire </th>
            <th> Commission </th>
            <th> Supérieur </th>
            <th> N° Service </th>
            <th> N° projet </th>
            <th> Supprimer </th>
            <th> Modifier </th>
            <th> Consulter </th>

        </tr>
    </tfoot>
    <tbody>
    <!-- LECTURE DE LA BDD -->
        <?php

        
                if (isset ($_GET["action"]) && $_GET["action"]=="consulter" && 
                    isset($_GET['noemp']) && !empty($_GET['noemp'])){

                       
                       $data=researchNE($_GET['noemp']);
                        
                        foreach ($data as $key => $n){
                            echo "<td>$n</td>";
                        }
                }
                else {
             
                    $data=research();
            
            
                    foreach ($data as $key => $value) {
                        echo"<tr>";
                    
                    foreach ($value as $k=> $v) {
                        echo "<td>$v</td>";
                    }
                    
                    echo "<td>";
                    // fontion qui recense les personnes ayant des subalternes (liste de noemp dans un tableau)
                    $donnees=tridelete();
                    $taille=count($donnees);
                    
                    $flag=false;

                    for ($i=0; $i<$taille; $i++) {
                        
                        if ($value['noemp'] == $donnees[$i]['noemp']){
                            $flag=true;
                            break;
                        } 
                    }

                        if(!$flag){  
                    ?>
                            <a href='employes.php?action=delete&amp;noemp=<?php echo $value['noemp']?>'>
                            <button class='btn btn-outline-danger' value='Remove'>Supprimer</button>
                            </a>  
                    <?php
                        } 
                        else {
                    ?>      <p> Ne peut être supprimé.e </p> <?php
                        }
                       
                            
                        ?>
                        </td>
                    
                        <td>
                            <a href='formulaire.php?action=modifier&amp;noemp=<?php echo $value['noemp'] ?>'>
                            <button class='btn btn-outline-success' value='Modify'>Modifier</button>
                            </a> 
                        </td>
                        <td>
                            <a href='employes.php?action=consulter&amp;noemp=<?php echo $value['noemp'] ?>'>
                            <button class='btn btn-outline-info' value='Modify'>Consulter</button>
                            </a> 
                        </td>
                </tr>
            <?php
            } 
        }
                ?>
    </tbody>
</table>

</body>
</html>