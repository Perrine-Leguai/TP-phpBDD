<?php



include_once(__DIR__ .'/../controler/userControler.php');

 
if (!isset($_SESSION['mailUser'])){
    header('Location: connexion.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link 
        rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <title>Connexion réussie</title>


</head>
<body>

   
        <div class="container">
            <div class="alert alert-success col-6 offset-3 mt-2 mb-2" role="alert">
                    <p class="text-center p-0 m-0">WELCOME BACK <?php print_r($_SESSION['mailUser']); ?> </p>
            </div>

            <div class="boutons col-4 offset-4 mt-5 row">
                <div class="  col-6">
                    <a href="tableaux/employes.php" ><button name="connexion" type="submit"  class="btn btn-primary "> Les employés </button></a>
                </div>
                <div class=" col-6">
                    <a href="tableaux/cc-services.php" ><button name="connexion" type="submit"  class="btn btn-primary "> Les services </button></a>
                </div>
            </div>
        </div>


</body>
</html>
