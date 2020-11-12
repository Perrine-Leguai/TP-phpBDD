<?php
session_start();
if (!$_SESSION) {
    header('location: ../controler/indexControler.php');
}


function html(){ ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulaire d'employé.e.s</title>
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        </head>
        <body>
        <!-- CATEGORIE -->
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="employes col-6 offset-3  m-2  ">
                    <div class="row justify-content-md-center m-4">
                        <h3 class="employes col-4   ">Employes</h3>
                    </div>
                    <div class="row">
                    
                        <!-- FORMULAIRES D AJOUT -->
                        <div class="col-12">
                            <div >
<?php }

function formulaire($action, $data){ ?>
    
                                <form action="<?php  if( $action == "modifier"){ echo "../controler/employeControler.php?action=modifier"; }else{ echo "../controler/employeControler.php?action=ajout" ; } ?>&amp;noemp=<?php if( $action== "modifier"){echo $_GET['noemp']; }?>" method="POST">
                                    
                                        <div class="row justify-content-md-center">
                                            <!-- NOEMP -->
                                            <div class="col-12 row justify-content-md-center">
                                                <div class="p-1"><label for="noemp"> N° employé : </label></div>
                                                <div><input type="number" name="noemp" id="noemp" placeholder="ex : 1023" value="<?php if ($action =='modifier'){ echo $data['noemp'];}?>" requirred></div>
                                            </div>
                                            <!-- NOM & PRENOM -->
                                            
                                                <div class="  row justify-content-md-center m-2 ">
                                                    <div class=" row mr-2">
                                                        <div class="p-1"><label for="nom"> Nom : </label></div>
                                                        <div><input type="text" name="nom" id="nom" placeholder="ex: Dupont " value="<?php if( $action =='modifier'){ echo $data['nom']; }?>" ></div>
                                                    </div>
                                                    <div class=" row justify-content-md-center ml-2">
                                                        <div class="p-1"><label for="prenom"> Prénom : </label></div>
                                                        <div><input type="text" name="prenom" id="prenom" placeholder="ex: Valérie " value="<?php if ($action =='modifier'){ echo $data['prenom']; }?>"></div>
                                                    </div>
                                                </div>
                                            
                                            <!-- EMPLOI & EMBAUCHE -->
                                            <div class=" row justify-content-md-center m-2 ">
                                                <div class=" row mr-2">
                                                    <div class="p-1"><label for="emploi"> Emploi :</label></div>
                                                    <div><input type="text" name="emploi" id="emploi" placeholder="ex: Infirmière " value="<?php if ($action =='modifier'){ echo $data['emploi']; }?>"></div>
                                                </div>
                                                <div class=" row ml-2">
                                                    <div class="p-1"><label for="embauche"> Embauche :</label></div>
                                                    <div><input type="text" name="embauche" id="embauche" placeholder="ex: 1988-12-15 " value="<?php if ($action=='modifier'){ echo $data['embauche']; }?>"></div>
                                                </div>
                                            </div>

                                            <!-- SALAIRE & COMMISSION -->
                                            <div class=" row justify-content-md-center m-2 ">
                                                <div class=" row mr-2">
                                                    <div class="p-1"><label for="sal"> Salaire :</label></div>
                                                    <div><input type="number" name="sal" id="sal" placeholder="ex: 12345.6 " value="<?php if ($action =='modifier'){ echo $data['sal']; }?>"></div>
                                                </div>
                                                <div class=" row ml-2">    
                                                    <div class="p-1"><label for="comm"> Commission :</label></div>
                                                    <div><input type="number" name="comm" id="comm" placeholder="ex: 78910.26 " value="<?php if ($action =='modifier'){ echo $data['comm']; }?>"></div>
                                                </div>
                                            </div>

                                            <!-- SUPERIEUR -->
                                            <div class=" row justify-content-md-center col-12 m-2 ">        
                                                <div clas="p-1"><label for="sup"> Supérieur :</label></div>
                                                <div ><input type="number" name="sup" id="sup" placeholder="ex: 1054" value="<?php if ($action =='modifier'){ echo $data['sup']; }?>"></div>
                                            </div>

                                            <!-- N° SERVICE -->
                                            <div class=" row justify-content-md-center col-12 m-2 ">        
                                                <div clas="p-1"><label for="noserv"> N° service : </label></div>
                                                <div><input type="number" name="noserv" id ="noserv" placeholder="ex: 4 " value="<?php if ($action =='modifier'){ echo $data['noserv']; }?>"></div>
                                            </div>

                                            
                                            <!-- BOUTON -->
                                            <div class=" row justify-content-md-center col-4 m-4">
                                                <button type="submit"  class="btn btn-primary "> <?php if ($action == "modifier"){ echo ("Modifier") ;} else{ echo "Ajouter" ;}?></button>
                                            </div>

                                        </div>
                                </form> 
<?php }

function finhtml(){ ?>
                            </div>
                        </div> 
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>
<?php } ?>