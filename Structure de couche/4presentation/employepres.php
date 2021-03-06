<?php
session_start();
if (!$_SESSION){
    header('Location: ../3controler/indexControler.php');
}

include_once(__DIR__ .'/../1dao/EmployesMysqliDao.php');

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
function boutons($get, $session, $nbrAjout=null){ ?>

    <body>  
        <div class="container col-12">
            <div class="boutons col-12 mt-3 mb-3 row">
                <?php 
                    if (isset($get['action']) && $get['action']='consulter'){ ?>
                        <div class="  col-1 text-left">
                            <a href="../3controler/employeControler.php"><img src="../img/fleche.png" ></button></a>
                        </div>
                        <?php
                    }

                    if ($session=="administrateur"){ ?>
                        <div class="  col-3 mb-1">
                            <div>
                                <a href="../3controler/formEmpControler.php"><button type="button" class="btn btn-outline-primary " >Ajouter un.e employé.e  +</button></a>
                                <div class="row"><p id="nbAdd" ><?php echo $nbrAjout." employés ajoutés aujourd'hui "?></p>
                            </div>
                        </div>
                <?php } ?>
                    
                    <div class=" <?php if(isset($session) && $session=="administrateur"){ echo"col-4 mb-1 ";} else {echo "col-7 mb-1 ";} ?>">
                        
                        <a href="../3controler/serviceControler.php" ><button name="employes" type="submit"  class="btn btn-primary "> SERVICES </button></a>
                    </div>
                    <div class=" col-3 mb-1">
                        <a href="../3controler/userControler.php?p=deco" ><button name="deconnexion" type="submit"  class="btn btn-outline-secondary "> Se déconnecter  X </button></a>
                    </div>
            </div>
<?php
}

//AFFICHAGE DES CHAMPS DE RECHERCHE
function champsRecherche(){ ?>
    <div class="col-12 mt-2 mb-2 row">
        <div class="col2 mr-2"><p>Champs de recherches : </p></div>
        <div class="col2 mr-2"><input id="triNom" type="text" placeholder="DUTRONC" name="triNom" value=""> </div>
        <div class="col2 mr-2"><input id="triPrenom" type="text" placeholder="Jacques" name="triPrenom" value=""></div>
        <div class="col2 mr-2"><input id="triEmploi" type="text" placeholder="Serrurier" name="triEmploi" value=""></div>
        <div class="col2 mr-2"><input id="triService" type="text" placeholder="Informatique" name="triService" value=""></div>
    </div>

<?php }

//AFFICHAGE TABLEAU
function affichagetb($session, $get){ ?>
    
    <table class="table stripped table-hover">
        <thead class="thead-light table-bordered" >
            <tr>
                    <th> N° Employé </th>
                    <th> Nom </th>
                    <th> Prénom </th>
                    <th> Emploi </th>
                    <th> Supérieur </th>
                    <th> Embauche </th>
                <?php if ($session=="administrateur"){ ?>
                    <th> Salaire </th>
                    <th> Commission</th>
                   
                <?php } ?>
                    <th> N° Service </th>
                <?php if ($session=="administrateur" || (!empty($get) || (isset($get['action']) && $get['action']!='consulter'))){ ?>
                    <th> Supprimer </th>
                    <th> Modifier </th>
                <?php } ?>
                <?php if (empty($get) || (isset($get['action']) && $get['action']!='consulter')){ ?>
                    <th> Consulter </th>
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
                    <?php if ($session=="administrateur"){ ?>
                        <th> Salaire </th>
                        <th> Commission</th>
                    <?php } ?>
                        <th> N° Service </th>
                    <?php if ($session=="administrateur" || (!empty($get) || (isset($get['action']) && $get['action']!='consulter'))){ ?>
                        <th> Supprimer </th>
                        <th> Modifier </th>
                    <?php } ?>
                    <?php if (empty($get) || (isset($get['action']) && $get['action']!='consulter')){ ?>
                        <th> Consulter </th>
                    <?php }?>
                </tr>
            </tfoot>
        <tbody>
        <?php
}

        
function consultation($objet, $session){
    $data= $objet->rendreVisible();
    foreach ($data as $key => $n){
        if($session=='utilisateur' && !($key=='sal' || $key=='comm')){
            echo "<td>$n</td>";
        }elseif($session=='administrateur'){
            echo "<td>$n</td>";
        }
    }

}


function affichageGlobal($data, $session, $donnees, $nomValue, $taille){        
                
    foreach ($data as $emp) {
        echo"<tr>";        

        echo"<td>".$emp->getNoemp()."</td>" , "<td>".$emp->getNom()."</td>" , "<td>".$emp->getPrenom()."</td>";
        echo"<td>".$emp->getEmploi()."</td>", "<td>".$emp->getSup()."</td>", "<td>".$emp->getEmbauche()."</td>";
        if($session=='administrateur'){
        echo"<td>".$emp->getSal()."</td>", "<td>".$emp->getComm()."</td>";
        }
        echo"<td>".$emp->getNoserv()."</td>";
    

        if ($session=="administrateur"){
                echo "<td>";                

                $flag=false;
                    $get= "get".ucfirst($nomValue) ;
                for ($i=0; $i<$taille; $i++) {
                    if ($emp->$get() == $donnees[$i][$nomValue]){
                        
                        $flag=true;
                        break;
                    } 
                }
                
                    if(!$flag){  
                ?>
                            <a href='../3controler/employeControler.php?action=delete&amp;noemp=<?php echo $emp->getNoemp()?>'>
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
                            <a href='../3controler/formEmpControler.php?action=modifier&amp;noemp=<?php echo $emp->getNoemp()?>'> 
                                <button class='btn btn-outline-success' value='Modify'>Modifier</button>
                                </a> 
                        </td>
                    <?php } ?>
                        <td>
                            <a href='../3controler/employeControler.php?action=consulter&amp;noemp=<?php echo $emp->getNoemp() ?>'>
                            <button class='btn btn-outline-info' value='Consult'>Consulter</button>
                            </a> 
                        </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    </body>
    <script src="../jquery-3.5.1.min.js"></script>
    <script src="../main.js" tye="text/javascript"></script>
</html>
<?php }
function afficherMessage($errorCode){
    echo $errorCode ;
    if($errorCode && $errorCode == 1062){?>
        <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
            <p class="text-center p-0 m-0"> Employé déjà existant </p>
        </div>
<?php }
}

function afficherMess($rs,$info){
    
   
   
    if ($rs){ ?>
        <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
            <p class="text-center p-0 m-0"> L'employé.e n° <?php echo($info) ?> a bien été ajouté.e . </p>
        </div>
    <?php ;} else { ?>
        <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
            <p class="text-center p-0 m-0"> Echec de l'ajout </p>
        </div>
    <?php
        }
}

function afficherMessDel($rs=null, $info=null, $errorCode=null){ 
    if($errorCode){
        echo($errorCode);?>
        <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
            <p class="text-center p-0 m-0"> Suppression impossible </p>
        </div>
    <?php
    ;}
    if(!$errorCode){ ?>
       <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
    <p class="text-center p-0 m-0"> L'employé.e n° <?php echo($info) ?> a bien été supprimé.e . </p>
    </div> 
    <?php }
    
}

function afficherMessModif($rs,$errorCode=null){
    if($errorCode){  
        echo($errorCode);?>
        <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
            <p class="text-center p-0 m-0"> Echec des modifications </p>
        </div>
    <?php }
    if ($rs){ ?>
        <div class="alert alert-success col-6 offset-3 mt-2 m3-2" role="alert">
            <p class="text-center p-0 m-0">  Les modifications ont bien été enregistrées . </p>
        </div>
    <?php 
    }
}