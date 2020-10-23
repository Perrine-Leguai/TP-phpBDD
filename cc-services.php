<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
    <a href="c-forms.php"><button type="button" class="btn btn-primary btn-lg" >Remplir le questionnaire</button></a>
    <?php 

        include 'crud.php';    
               

            // ajouter
            if (isset($_GET['action']) && $_GET["action"]=="ajout" && !empty($_POST) &&
                isset($_POST['noserv']) && !empty($_POST['noserv'])){

                        add($_POST['noserv'], $_POST['serv'], $_POST['ville']);    
                    }
            
            
            // supprimer
            elseif (isset($_GET['action']) && $_GET["action"]=="delete" && 
                    isset($_GET['noserv'])){

                        delete($_GET['noserv']);
            }
        
            
            //modifier
            elseif (isset($_GET["action"]) && $_GET["action"]=="modifier" && 
                    isset($_POST['noserv']) && !empty($_POST['noserv'])){

                       edit($_GET['noserv'],$_POST['serv'], $_POST['ville'] );
                        
                    }
                            ?>


    <!-- affichage du tableau -->
    <table class="table stripped table-hover">
        <thead class="thead-light table-bordered" >
            <tr>
                <th> N° service </th>
                <th> service</th>
                <th> ville </th>
                <th> Supprimer</th>
                <th> Modifier </th>
                <th> Consulter </th>
            </tr>
        </thead>
        <tbody>
        
        <!-- lecture des données de la BDD -->
        <?php


           if (isset ($_GET["action"]) && $_GET["action"]=="consulter" && 
                isset($_GET['noserv']) && !empty($_GET['noserv'])){

                    $data=consult($_GET['noserv']);

                    foreach ($data as $key => $n){
                        echo "<td>$n</td>";
                        }
            }
            else {
                 
                $data=research();
                
                foreach ($data as $key => $value) {
                    echo"<tr>";

                foreach ($value as $k => $v) {
                        echo "<td>$v</td>";
                    }
                
                echo "<td>";
                // fonction qui recense les services ayant des salariés
                $donnees=tridelete();
                $taille=count($donnees);
                

                $flag=false;
                    
                for ($i=0; $i<$taille; $i++) {
                        
                    if ($value['noserv'] == $donnees[$i]['noserv']){
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
                        <a href='c-forms.php?action=modifier&amp;noserv=<?php echo $value['noserv']?>'> 
                            <button class='btn btn-outline-success' value='Modify'>Modifier</button>
                            </a> 
                    </td>
                    <td>
                            <a href='cc-services.php?action=consulter&amp;noserv=<?php echo $value['noserv'] ?>'>
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