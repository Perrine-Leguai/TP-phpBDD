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
<body>
     
            <div class="boutons col-10 offset-1 mt-3 mb-3 row">
            <?php  ?>
                
                <?php if ($_SESSION['profil']=="administrateur"){ ?>
                    <div class="  col-3 mb-1">
                        <a href="formulaire.php"><button type="button" class="btn btn-outline-primary " >Ajouter un employé  +</button></a>
                    </div>
                <?php } ?>
                
                <div class=" <?php if(isset($_SESSION) && $_SESSION['profil']=="administrateur"){ echo"col-6 mb-1";} else {echo "col-9 mb-1";} ?>">
                    <a href="cc-services.php" ><button name="employes" type="submit"  class="btn btn-primary "> SERVICES </button></a>
                </div>
                <div class=" col-3 mb-1">
                    <a href="../traitement.php?p=deco" ><button name="connexion" type="submit"  class="btn btn-outline-secondary "> Se déconnecter  X </button></a>
                </div>
            </div>


    <?php 

        include 'crudE.php';

        $noemp=$_POST['noemp'];
        $nom="'".$_POST['nom']."'";
        $nom=$nom? $nom : NULL;
        $prenom="'".$_POST['prenom']."'";
        $prenom=$prenom? $prenom : NULL;
        $emploi="'".$_POST['emploi']."'";
        $emploi=$emploi? $emploi : NULL;
        $sup=$_POST['sup'];
        echo $sup;
        $sup=$sup? $sup : NULL;
        $embauche="'".$_POST['embauche']."'";
        $embauche=$embauche? $embauche : NULL;
        $sal=$_POST['sal'];
        $sal=$sal? $sal : NULL;
        $comm=$_POST['comm'];
        $comm=$comm? $comm : NULL;
        $noserv=$_POST['noserv'];
        $noserv=$noserv? $noserv : NULL;

         // AJOUTER
        if (isset($_GET['action']) && $_GET['action']=="ajout" &&
            isset($_POST['noemp']) && !empty($_POST['noemp'])){ 
                    
                $emp= new Employe();
                $emp->setNoemp($noemp)->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoServ($noserv);
                $rs=add($emp);
                var_dump($rs);
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

                    delete($_GET['noemp']);
        }

        // MODIFIER
        elseif (isset($_GET["action"]) && $_GET["action"]=="modifier" && 
                isset($_POST['noemp']) && !empty($_POST['noemp'])){

                $emp= new Employe();    
                $emp->setNoemp($_GET['noemp'])->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoServ($noserv);
                
                edit($emp);
                
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
            <th> Commission </th>
            <?php } ?>
            <th> N° Service </th>
            <?php if ($_SESSION['profil']=="administrateur"){ ?>
            <th> Supprimer </th>
            <th> Modifier </th>
            <?php } ?>
            <th> Consulter </th>
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
            <th> Commission </th>
            <?php } ?>
            
            <th> N° Service </th>
            
            <?php if ($_SESSION['profil']=="administrateur"){ ?>
            <th> Supprimer </th>
            <th> Modifier </th>
            <?php } ?>
            <th> Consulter </th>
        </tr>
    </tfoot>
    <tbody>
    <!-- LECTURE DE LA BDD -->
        <?php
            
        
                if (isset ($_GET["action"]) && $_GET["action"]=="consulter" && 
                    isset($_GET['noemp']) && !empty($_GET['noemp'])){

                       //CONSULTATION
                       $data=researchNE($_GET['noemp']);
                        
                        foreach ($data as $key => $n){
                            if($_SESSION['profil']=='utilisateur' && !($key=='sal' || $key=='comm')){
                                echo "<td>$n</td>";
                            }elseif($_SESSION['profil']=='administrateur'){
                                echo "<td>$n</td>";
                            }
                        }
                }
                else {
             
                    $data=research();
            
            
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

</body>
</html>