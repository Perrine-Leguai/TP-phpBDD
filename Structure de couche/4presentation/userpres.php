<?php
if (!$_SESSION){
    header('Location: ../3controler/indexControler.php');
}



//HTML
function html(){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Connexion réussie</title>
    </head>
<?php }

//LIENS SERVICES OU EMPLOYES
function lienSE($mailsession){ ?> 
    <body>
        <div class="container">
            <div class="alert alert-success col-6 offset-3 mt-2 mb-2" role="alert">
                    <p class="text-center p-0 m-0">WELCOME BACK <?php print_r($mailsession); ?> </p>
            </div>

            <div class="boutons col-4 offset-4 mt-5 row">
                <div class="  col-6">
                    <a href="../3controler/employeControler.php" ><button name="connexion" type="submit"  class="btn btn-primary "> Les employés </button></a>
                </div>
                <div class=" col-6">
                    <a href="../3controler/serviceControler.php" ><button name="connexion" type="submit"  class="btn btn-primary "> Les services </button></a>
                </div>
            </div>
        </div>
    </body>
    </html>
<?php } 

function afficherMessage($getCode=null){
    if ($getCode && $getCode == 2002){
        echo "accès à la base de donnée impossible";
    }
}

?>