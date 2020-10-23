<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<!-- CATEGORIE EMPLOYES -->
<div class="employes column col-5 container-fluid ">
    <div class="text-center m-2"><h3>Employes</h3><br></div>


        <!-- AJOUTER QUELQU'UN -->
        <?php
            if (empty($_GET)){
        ?>
            
            <form action="employes.php?action=ajout" method="post" >
                <div class="d-flex justify-content-center ">
                        <div class="p-1"><label for="noemp"> N° employé : </label></div>
                        <div><input type="number" name="noemp" id="noemp" placeholder="ex : 1023" requirred></div>
                </div>

                <div class="d-flex justify-content-center m-2 ">
                    <div class=" row mr-2">
                        <div class="p-1"><label for="nom"> Nom : </label></div>
                        <div><input type="text" name="nom" id="nom" placeholder="ex: Dupont" ></div>
                    </div>
                    <div class=" row ml-2">
                        <div class="p-1"><label for="prenom"> Prénom : </label></div>
                        <div><input type="text" name="prenom" id="prenom" placeholder="ex : Valérie" ></div>
                    </div>
                </div>

                <div class="d-flex justify-content-center m-2 ">
                    <div class=" row mr-2">
                        <div class="p-1"><label for="emploi"> Emploi :</label></div>
                        <div><input type="text" name="emploi" id="emploi" placeholder="ex : Secrétaire"></div>
                    </div>
                    <div class=" row ml-2">
                        <div class="p-1"><label for="embauche"> Embauche :</label></div>
                        <div><input type="text" name="embauche" id="embauche" placeholder="ex : 1988-12-15"></div>
                    </div>
                </div>
                <div class="d-flex justify-content-center m-2 ">
                    <div class=" row mr-2">
                        <div class="p-1"><label for="sal"> Salaire :</label></div>
                        <div><input type="number" name="sal" id="sal" placeholder="ex : 12345.26"></div>
                    </div>
                    <div class=" row ml-2">    
                        <div class="p-1"><label for="comm"> Commission :</label></div>
                        <div><input type="number" name="comm" id="comm" placeholder="ex : 78910.26"></div>
                    </div>
                </div>
                <div class="d-flex justify-content-center m-2 ">        
                        <label for="sup"> Supérieur :</label>
                        <input type="number" name="sup" id="sup" placeholder="ex : 1023">
                </div>
                <div class="d-flex justify-content-center m-2 ">        
                        <div clas="p-1"><label for="noserv"> N° service : </label></div>
                        <div><input type="number" name="noserv" id ="noserv" placeholder="ex : 4" requirred></div>
                </div>
                <div class="d-flex justify-content-center m-2 ">        
                        <div clas="p-1"><label for="noproj"> N° projet : </label></div>
                        <div><input type="number" name="noproj" id="noproj" placeholder="ex : 104"></div>
                </div>
                    <button type="submit"  class="btn btn-primary"> Ajouter</button>
                </div>
            </form>    
        
        <?php
            }
            
            // MODIFIER LES DONNÉES
            elseif ($_GET['action']=='modifier' && 
                    isset($_GET['noemp']) && !empty($_GET['noemp'])){

                        $noemp=$_GET['noemp'];
                        $db = mysqli_init();
                        mysqli_real_connect($db,'localhost','root','','afpatest');
                        $rs = mysqli_query ($db, "select * from employes where noemp='$noemp'");
                        $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
                        
                        mysqli_free_result($rs);
                        mysqli_close($db);
 
            
        ?>
        
            <form action="employes.php?action=modifier&noemp=<?php echo $_GET['noemp'];?>" method="post">
                <label for="noemp"> N° employé: </label>
                <input type="number" name="noemp" id="noemp" value="<?php echo $data['noemp']?>" requirred>
                <label for="nom"> nom :</label>
                <input type="text" name="nom" id="nom" value="<?php echo $data['nom']?>">
                <label for="prenom"> Prénom :</label>
                <input type="text" name="prenom" id="prenom" value="<?php echo $data['prenom']?>">
                <label for="emploi"> Emploi : </label>
                <input type="text" name="emploi" id="emploi" value="<?php echo $data['emploi']?>">
                <label for="embauche"> Embauche: </label>
                <input type="text" name="embauche" id="embauche" value=<?php echo $data['embauche']?>">
                <label for="sal"> Salaire :</label>
                <input type="number" name="sal" id="sal" value="<?php echo $data['sal']?>">
                <label for="comm"> commission :</label>
                <input type="number" name="comm" id="comm" value="<?php echo $data['comm']?>">
                <label for="sup"> supérieur :</label>
                <input type="number" name="sup" id="sup" value="<?php echo $data['sup']?>">
                <label for="noserv"> N° service :</label>
                <input type="number" name="noserv" id ="noserv" value="<?php echo $data['noserv']?>" requirred>
                <label for="noproj"> N° projet :</label>
                <input type="number" name="noproj" id="noproj" value="<?php echo $data['noproj']?>">
                <button type="submit"  class="btn btn-primary"> Modifier</button>
            </form>
            <?php } ?>
        </div>    
    </div>

</body>
</html>