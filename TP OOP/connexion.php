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
                        <h3 class="mdp col-4   ">CONNEXION</h3>
                    </div>
                    <div class="row">
                    
                        <!-- FORMULAIRES D AJOUT -->
                        <div class="col-12">
                            <div >
                                <?php if(isset($_GET['p']) && $_GET['p']=='nomail') { ?>
                                    <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
                                        <p class="text-center p-0 m-0"> Mail invalide ou non lié à un compte </p>
                                    </div>
                                <?php } ?>
                                <?php if(isset($_GET['p']) && $_GET['p']=='nomdp') { ?>
                                    <div class="alert alert-danger col-6 offset-3 mt-2 m3-2" role="alert">
                                        <p class="text-center p-0 m-0"> Mot de passe invalide </p>
                                    </div>
                                <?php } ?>
                                <form action="traitement.php?action=connect"  method="POST">
                                        <div class="row justify-content-md-center">
                                           
                                            <!-- MAIL & PASSWORD-->
                                            <div >
                            
                                                <div class="  row justify-content-md-center m-2 ">
                                                    <div class=" row mr-2">
                                                        <div class="p-1"><label for="email"> Email : </label></div>
                                                        <div><input type="text" name="email" id="email" placeholder="blabla@gmail.com"  ></div>
                                                    </div>
                                                    <div class=" row justify-content-md-center ml-2">
                                                        <div class="p-1"><label for="mdp"> Mot de passe : </label></div>
                                                        <div><input type="password" name="mdp" id="mdp" placeholder="********" ></div>
                                                    </div>  
                                                </div>
                                            <!-- BOUTON -->
                                            <div class=" text-center col-12 mt-4 mb-5">
                                                <button type="submit" name="connexion" id="connexion" class="btn btn-primary " >Connection</button>  
                                            </div>
                                            <div class="  justify-content-md-center col-12 offset-1 mt-5">
                                                <p class="text-primary "> Vous n'avez pas encore de compte et vous souhaitez <a href="inscription.php"> <span class="badge badge-pill badge-primary">inscrire</span></a>  ? </p> 
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