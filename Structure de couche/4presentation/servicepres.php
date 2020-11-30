<?php
session_start();
if (!$_SESSION){
    header('Location: ../4presentation/connexion.php');
}


include_once(__DIR__ .'/../1dao/ServicesMysqliDao.php');

//HTML
function html(){ ?>

    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<?php
}

//BOUTONS
function boutons($get, $session ){ ?>

    <body>  
        <div class="container col-12">
            <div class="boutons col-12 mt-3 mb-3 row">
                <?php 
                    if (isset($get['action']) && $get['action']='consulter'){ ?>
                        <div class="  col-1 text-left">
                            <a href="../3controler/serviceControler.php"><img src="../img/fleche.png" ></button></a>
                        </div>
                        <?php
                    }

                    if ($session=="administrateur"){ ?>
                        <div class="  col-3 mb-1">
                            <a href="../3controler/formSerControler.php"><button type="button" class="btn btn-outline-primary " >Ajouter un service  +</button></a>
                        </div>
                <?php } ?>
                    
                    <div class=" <?php if(isset($session) && $session=="administrateur"){ echo"col-5 mb-1";} else {echo "col-8 mb-1";} ?>">
                        <a href="../3controler/employeControler.php" ><button name="employes" type="submit"  class="btn btn-primary "> EMPLOYES </button></a>
                    </div>
                    <div class=" col-3 mb-1">
                        <a href="../3controler/userControler.php?p=deco" ><button name="deconnexion" type="submit"  class="btn btn-outline-secondary "> Se déconnecter  X </button></a>
                    </div>
            </div>
<?php
}

//AFFICHAGE TABLEAU
function affichagetb($session, $get){ ?>
    
    <table class="table stripped table-hover">
        <thead class="thead-light table-bordered" >
            <tr>
                <th> N° service </th>
                <th> service</th>
                <th> ville </th>
                <?php if ($session=="administrateur" || (!empty($get) || (isset($get['action']) && $get['action']!='consulter'))){ ?>
                <th> Supprimer </th>
                <th> Modifier </th>
                <?php } ?>
                <?php if (empty($get) || (isset($get['action']) && $get['action']!='consulter')){ ?>
                <th> Consulter </th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
        <?php
}

        
function consultation($data){
    foreach ($data as $key => $n){
        echo "<td>$n</td>";
        }

}


function affichageGlobal($data, $session, $donnees, $nomValue, $taille){        
                
        foreach ($data as $key => $value) {
            echo"<tr>";

            foreach ($value as $k => $v) {
                echo "<td>$v</td>";
            }
                if ($session=="administrateur"){
                    echo "<td>";                

                    $flag=false;
                        
                    for ($i=0; $i<$taille; $i++) {
                            
                        if ($value[$nomValue] == $donnees[$i][$nomValue]){
                            $flag=true;
                            break;
                        } 
                    }
                    
                        if(!$flag){  
                    ?>
                            <a href='../3controler/serviceControler.php?action=delete&amp;noserv=<?php echo $value[$nomValue]?>'>
                            <button class='btn btn-outline-danger' value='Remove'>Supprimer</button>
                            </a>  
                    <?php
                        } 
                        else {
                    ?>      <p> Ne peut être supprimé </p> <?php
                        }
                    ?>
                        
                        </td>
                        <td>
                            <a href='../3controler/formSerControler.php?action=modifier&amp;noserv=<?php echo $value[$nomValue]?>'> 
                                <button class='btn btn-outline-success' value='Modify'>Modifier</button>
                                </a> 
                        </td>
                    <?php } ?>
                    <td>
                            <a href='../3controler/serviceControler.php?action=consulter&amp;noserv=<?php echo $value[$nomValue] ?>'>
                            <button class='btn btn-outline-info' value='Consult'>Consulter</button>
                            </a> 
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php }

function afficherMess($rs,$info){
if ($rs){ ?>
    <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
        <p class="text-center p-0 m-0"> Le service n° <?php echo($info) ?> a bien été ajouté . </p>
    </div>
<?php ;} else { ?>
    <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
        <p class="text-center p-0 m-0"> Echec de l'ajout </p>
    </div>
   <?php
    }
}

function afficherMessDel($rs, $info){ ?>
    <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
    <p class="text-center p-0 m-0"> Le service n° <?php echo($info) ?> a bien été supprimé . </p>
    </div>
    <?php
}

function afficherMessModif($rs){
    if ($rs){ ?>
        <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
            <p class="text-center p-0 m-0">  Les modifications ont bien été enregistrées . </p>
        </div>
    <?php ; }else { ?>
        <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
            <p class="text-center p-0 m-0"> Echec des modifications </p>
        </div>
    <?php }
}