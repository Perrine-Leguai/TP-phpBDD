<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
    <a href="formS.php"><button type="button" class="btn btn-primary btn-lg" >Remplir le questionnaire</button></a>
    <?php 

            
               

            // ajouter
            if ($_GET["action"]=="ajout" && !empty($_POST)){
                if  (isset($_POST['noserv']) && !empty($_POST['noserv'])){
                    
                    $noserv=$_POST['noserv'];
                    $serv= $_POST['serv']? "'".$_POST['serv']."'" : 'NULL';
                    $ville = $_POST['ville']? "'".$_POST['ville']."'": 'NULL';

                    $db = mysqli_init();
                        mysqli_real_connect($db,'localhost','root','','afpatest');
                        
                        // on insère les nouvelles données
                        $rs =  "insert into services values ($noserv, $serv,$ville)" ;
                                        

                        $tab =mysqli_query($db, $rs);

                    }
            } 
            
            // supprimer
            elseif ($_GET["action"]=="delete" && 
                        isset($_GET['noserv'])){

                            $noserv= $_GET['noserv'];

                            $db = mysqli_init();
                            mysqli_real_connect($db,'localhost','root','','afpatest');
                            
                            // on supprime les données
                            $rs =  "delete from services where noserv= '$noserv'" ;
                                                
                            $tab =mysqli_query($db, $rs);
            }
        
            
            //modifier
            elseif (isset($_GET["action"]) && $_GET["action"]=="modifier" && 
                    isset($_POST['noserv']) && !empty($_POST['noserv'])){

                        $noserv=$_GET['noserv'];
                        $serv= $_POST['serv']? "'".$_POST['serv']."'": 'NULL';
                        $ville = $_POST['ville']? "'".$_POST['ville']."'": 'NULL';

                        $db = mysqli_init();
                        mysqli_real_connect($db,'localhost','root','','afpatest');
                        
                        // MISE A JOUR DES DONNEES
                        $rs =  " update services set serv=$serv, ville=$ville where noserv=$noserv";
                        
                                        

                        $tab =mysqli_query($db, $rs);
                        
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
            if ($_GET['action']!= "consulter" | empty($_GET)){
                $db = mysqli_init();
                mysqli_real_connect($db,'localhost','root','','afpatest');
                $rs = mysqli_query ($db, 'select * from services');
                $data = mysqli_fetch_all ($rs, MYSQLI_ASSOC);
                mysqli_free_result($rs);
                mysqli_close($db);

                foreach ($data as $key => $value) {
                    echo"<tr>";
                    foreach ($value as $k => $v) {
                        echo "<td>$v</td>";
                    }
        ?>
                    <td>
                        <a href='services.php?action=delete&amp;noserv=<?php echo $value['noserv']; ?>'
                        >
                            <button class='btn btn-outline-danger' value='Remove'>Supprimer</button>
                            </a>
                    </td>
                    <td>
                        <a href='formS.php?action=modifier&amp;noserv=<?php echo $value['noserv']?>'> 
                            <button class='btn btn-outline-success' value='Modify'>Modifier</button>
                            </a> 
                    </td>
                    <td>
                            <a href='services.php?action=consulter&amp;noserv=<?php echo $value['noserv'] ?>'>
                            <button class='btn btn-outline-info' value='Modify'>Consulter</button>
                            </a> 
                        </td>
                    </tr>
                <?php
                }

            }

            elseif (isset ($_GET["action"]) && $_GET["action"]=="consulter" && 
                    isset($_GET['noserv']) && !empty($_GET['noserv'])){

                        $noserv=$_GET['noserv'];

                        $db = mysqli_init();
                        mysqli_real_connect($db,'localhost','root','','afpatest');
                        $rs = mysqli_query ($db, "select * from services where noserv='$noserv'");
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