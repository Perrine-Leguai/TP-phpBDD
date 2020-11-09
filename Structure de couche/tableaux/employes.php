<?php
session_start();

include_once('../class/Employe.php');

if (!$_SESSION){
    header('Location: ../connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body class="col-12">
    <div class="container-fluid">

    <div class="boutons mt-3 mb-3 row">
        <?php 
        if (isset($_GET['action']) && $_GET['action']='consulter'){ ?>
            <div class="  col-1 text-left">
                <a href="employes.php"><img src="../img/fleche.png" ></button></a>
            </div>
            <?php
        }
        
        if ($_SESSION['profil']=="administrateur"){ ?>
            <div class="  col-3 mb-1">
                <a href="formulaire.php"><button type="button" class="btn btn-outline-primary " >Ajouter un employé  +</button></a>
            </div>
        <?php } ?>
        
        <div class=" <?php if(isset($_SESSION) && $_SESSION['profil']=="administrateur"){ echo"col-5 mb-1";} else {echo "col-8 mb-1";} ?>">
            <a href="cc-services.php" ><button name="employes" type="submit"  class="btn btn-primary "> SERVICES </button></a>
        </div>
        <div class=" col-3 mb-1 text-right">
            <a href="../service/traitementService.php?p=deco" ><button name="connexion" type="submit"  class="btn btn-outline-secondary "> Se déconnecter  X </button></a>
        </div>

    </div>


    <?php 

        include_once '../dao/EmployesMysqliDao.php';

            // AJOUTER
             

                    
                        

                    

                    if ($rs){ ?>
                        <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
                            <p class="text-center p-0 m-0"> L'employé.e n° <?php echo($_POST['noemp']) ?> a bien été ajouté.e </p>
                        </div>
                    <?php }else { ?>
                        <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
                            <p class="text-center p-0 m-0"> Echec de l'ajout </p>
                        </div>
                    <?php }
            } 

            // SUPPRIMER
            elseif (isset($_GET["action"]) && $_GET["action"]=="delete" && 
                    isset($_GET['noemp'])){                 

                        EmployesMysqliDao :: delete($_GET['noemp']); ?>

                        <!-- message de succès -->
                        <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
                            <p class="text-center p-0 m-0"> L'employé.e n° <?php echo($_GET['noemp']) ?> a bien été supprimé.e </p>
                        </div>
            <?php
            }

            // MODIFIER
            elseif (isset($_GET["action"]) && $_GET["action"]=="modifier" && 
                    isset($_POST['noemp']) && !empty($_POST['noemp'])){

                    $noemp=$_POST['noemp'];
                    $nom=$_POST['nom']? $_POST['nom'] : NULL;
                    $prenom=$_POST['prenom']? $_POST['prenom'] : NULL;
                    $emploi=$_POST['emploi']? $_POST['emploi'] : NULL;
                    $sup=$_POST['sup']? $_POST['sup'] : NULL;
                    $embauche=$_POST['embauche']? $_POST['embauche'] : NULL;
                    $sal=$_POST['sal']? $$_POST['sal'] : NULL;
                    $comm=$_POST['comm']? $_POST['comm'] : NULL;
                    $noserv=$_POST['noserv']? $_POST['noserv'] : NULL;

                    $emp= new Employe();    
                    $emp->setNoemp($_GET['noemp'])->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoServ($noserv);
                    $rs= EmployesMysqliDao ::  edit($emp);
                    
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
    ?>
    <!-- afficher tableau -->
    
        <table class="table stripped table-hover">
            <thead class="thead-light table-bordered" >
                <tr>
                    <th> N° Employé </th>
                    <th> Nom </th>
                    <th> Prénom </th>
                    <th> Emploi </th>
                    <th> Supérieur </th>
                    <th> Embauche </th>
                    <?php if ($_SESSION['profil']=="administrateur"){ ?>
                    <th> Salaire </th>
                    <th> Commission</th>
                    <?php } ?>
                    <th> N° Service </th>
                    <?php if ($_SESSION['profil']=="administrateur"){ ?>
                    <th> Supprimer </th>
                    <th> Modifier </th>
                    <?php } ?>
                    <?php if (empty($_GET) || (isset($_GET['action']) && $_GET['action']!='consulter')){ ?>
                    <th> Consulter</th>
                    <?php }?>
                </tr>
            </thead>
            <tfoot class="thead-light table-bordered" >
                <tr>
                    <th> N° Employé </th>
                    <th> Nom </th>
                    <th> Prénom </th>
                    <th> Emploi </th>
                    <th> Supérieur </th>
                    <th> Embauche </th>
                    <?php if ($_SESSION['profil']=="administrateur"){ ?>
                    <th> Salaire </th>
                    <th> Commission</th>
                    <?php } ?>
                    
                    <th> N° Service </th>
                    
                    <?php if ($_SESSION['profil']=="administrateur"){ ?>
                    <th> Supprimer </th>
                    <th> Modifier </th>
                    <?php } ?>
                    <?php if (empty($_GET) || (isset($_GET['action']) && $_GET['action']!='consulter')){ ?>
                    <th> Consulter </th>
                    <?php }?>
                </tr>
            </tfoot>
            <tbody>
            <!-- LECTURE DE LA BDD -->
                <?php
                    
                
                        if (isset ($_GET["action"]) && $_GET["action"]=="consulter" && 
                            isset($_GET['noemp']) && !empty($_GET['noemp'])){

                            //CONSULTATION
                            $data= EmployesMysqliDao :: researchNE($_GET['noemp']);
                                
                                foreach ($data as $key => $n){
                                    if($_SESSION['profil']=='utilisateur' && !($key=='sal' || $key=='comm')){
                                        echo "<td>$n</td>";
                                    }elseif($_SESSION['profil']=='administrateur'){
                                        echo "<td>$n</td>";
                                    }
                                }
                        }
                        else {
                    
                            $data= EmployesMysqliDao :: research();
                    
                    
                            foreach ($data as $key => $value) {
                                echo"<tr>";
                            
                            foreach ($value as $k=> $v) {
                                if($_SESSION['profil']=='utilisateur' && !($k=='sal' || $k=='comm')){
                                    echo "<td>$v</td>";
                                }elseif($_SESSION['profil']=='administrateur'){
                                    echo "<td>$v</td>";
                                }
                            }

                            if ($_SESSION['profil']=="administrateur"){
                                echo "<td>";
                                
                                // fontion qui recense les personnes ayant des subalternes (liste de noemp dans un tableau)
                                $donnees= EmployesMysqliDao ::  tridelete();
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
                                ?>      <p> Ne peut être supprimé.e </p> 
                                <?php
                                    }   
                                    ?>
                                    </td>
                                    <td>
                                        <a href='formulaire.php?action=modifier&amp;noemp=<?php echo $value['noemp'] ?>'>
                                        <button class='btn btn-outline-success' value='Modify'>Modifier</button>
                                        </a> 
                                    </td>
                            <?php } ?>
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
    </div>
</body>
</html>