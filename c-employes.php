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
    
         // AJOUTER
        if ($_GET['action']=="ajout"){
            if  (isset($_POST['noemp']) && !empty($_POST['noemp'])){

                    $noemp=$_POST['noemp'];
                    $nom= $_POST['nom']? $_POST['nom'] : 'NULL';
                    $prenom = $_POST['prenom']? $_POST['prenom']: 'NULL';
                    $emploi=$_POST['emploi']? $_POST['emploi'] : 'NULL';
                    $embauche= $_POST['embauche']? $_POST['embauche']: 'NULL';
                    $sal=$_POST['sal']? $_POST['sal']: 'NULL';
                    $comm=$_POST['comm']? $_POST['comm'] : 'NULL';
                    $sup=$_POST['sup']? $_POST['sup'] : 'NULL';
                    $noserv=$_POST['noserv'];
                    $noproj=$_POST['noproj']? $_POST['noproj'] : 'NULL';
                                        
                    $db = mysqli_init();
                    mysqli_real_connect($db,'localhost','root','','afpatest');
                    
                    // on insère les nouvelles données
                    $rs =  "insert into employes values ($noemp, '$nom','$prenom','$emploi','$embauche',$sal,$comm,$sup,$noserv,$noproj)" ;
                                        
                    $tab =mysqli_query($db, $rs);
                    
            }
                    
        } 

        // SUPPRIMER
        elseif ($_GET["action"]=="delete" && 
                    isset($_GET['noemp'])){

                    $noempG = $_GET['noemp'];
                    

                    $db = mysqli_init();
                    mysqli_real_connect($db,'localhost','root','','afpatest');
                    
                    // on supprime les données
                    $rs =  "delete from employes where noemp= '$noempG'" ;
                                        
                    $tab =mysqli_query($db, $rs);
        }

        // MODIFIER
        elseif (isset($_GET["action"]) && $_GET["action"]=="modifier" && 
                isset($_POST['noemp']) && !empty($_POST['noemp'])){

                        $noemp=$_GET['noemp'];                                         
                        $nom= $_POST['nom']? "'".$_POST['nom']."'": 'NULL';
                        $prenom = $_POST['prenom']? "'".$_POST['prenom']."'": 'NULL';
                        $emploi = $_POST['emploi']? "'".$_POST['emploi']."'": 'NULL';
                        $embauche = $_POST['embauche']? "'".$_POST['embauche']."'": 'NULL';
                        $sal = $_POST['sal']? $_POST['sal'] : "NULL";
                        $comm = $_POST['comm']? $_POST['comm'] : "NULL";
                        $sup = $_POST['sup']? $_POST['sup'] : "NULL";
                        $noserv = $_POST['noserv']? $_POST['noserv'] : "NULL";
                        $noproj = $_POST['noproj']? $_POST['noproj'] : "NULL";


                        $db = mysqli_init();
                        mysqli_real_connect($db,'localhost','root','','afpatest');
                        
                        // MISE A JOUR DES DONNEES
                        $sql =  " update employes set nom=$nom, prenom=$prenom, emploi=$emploi, sal=$sal, comm=$comm, sup=$sup, noserv=$noserv, noproj=$noproj where noemp=$noemp";
                        
                        $tab =mysqli_query($db, $sql);
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

        if ($_GET['action']!= "consulter" | empty($_GET)){
            $db = mysqli_init();
            mysqli_real_connect($db,'localhost','root','','afpatest');
            $rs = mysqli_query ($db, 'select * from employes');
            $data = mysqli_fetch_all ($rs, MYSQLI_ASSOC);
            mysqli_free_result($rs);
            mysqli_close($db);
        
                foreach ($data as $key => $value) {
                echo"<tr>";
                
                    foreach ($value as $k=> $v) {
                        echo "<td>$v</td>";
                    }
                
                    ?>
                    <td>
                        
                        <a href='employes.php?action=delete&amp;noemp=<?php echo $value['noemp']?>'>
                        <button class='btn btn-outline-danger' value='Remove'>Supprimer</button>
                        </a>
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
        elseif (isset ($_GET["action"]) && $_GET["action"]=="consulter" && 
                    isset($_GET['noemp']) && !empty($_GET['noemp'])){

                        $noemp=$_GET['noemp'];

                        $db = mysqli_init();
                        mysqli_real_connect($db,'localhost','root','','afpatest');
                        $rs = mysqli_query ($db, "select * from employes where noemp='$noemp'");
                        $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
                        mysqli_free_result($rs);
                        mysqli_close($db);
                        
                        foreach ($data as $key => $n){
                            echo "<td>$n</td>";
                        }
        }
        ?>
    </tbody>
</table>

</body>
</html>