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
       
                                    
              

        <!-- CATEGORIE -->
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="employes col-6 offset-3  m-2  ">
                    <div class="row justify-content-md-center m-4">
                        <h3 class="mdp col-4   ">Email & MDP</h3>
                    </div>
                    <div class="row">
                    
                        <!-- FORMULAIRES D AJOUT -->
                        <div class="col-12">
                            <div >
                                <form action="traitement.php?action=ajout"  method="POST">
                                    
                                        <div class="row justify-content-md-center">
                                           
                                            <!-- NOM & PRENOM -->
                                            
                                                <div class="  row justify-content-md-center m-2 ">
                                                    <div class=" row mr-2">
                                                        <div class="p-1"><label for="nom"> Nom : </label></div>
                                                        <div><input type="text" name="nom" id="nom" placeholder="ex: Dupont "  ></div>
                                                    </div>
                                                    <div class=" row justify-content-md-center ml-2">
                                                        <div class="p-1"><label for="prenom"> Prénom : </label></div>
                                                        <div><input type="text" name="prenom" id="prenom" placeholder="ex: Valérie " ></div>
                                                    </div>
                                                </div>
                                            

                                            

                                            

                                            <!-- BOUTON -->
                                            <div class=" row justify-content-md-center col-4 m-4">
                                                <button type="submit"  class="btn btn-primary "> Ajouter </button>
                                            </div>

                                        </div>
                                </form> 
                            </div>
                        </div> 
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>