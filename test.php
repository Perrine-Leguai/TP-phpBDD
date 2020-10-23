
<html lang=fr>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <?php 
                        // MODIFIER
            if (isset($_GET["action"]) && $_GET["action"] == "modify" && isset($_GET['no_employe']) ) {
                $no_employe=$_GET['no_employe'];
                $db=mysqli_init();
                mysqli_real_connect($db,'localhost','samir','samsgbd','employes_service');
                $rs=mysqli_query($db,"SELECT * FROM employes WHERE no_employe= $no_employe " );
                $data=mysqli_fetch_array($rs,MYSQLI_ASSOC);
                $rm=mysqli_query($db,"UPDATE * FROM employes WHERE no_employe= $no_employe " );
                mysqli_close($db);
                $action="modify";
                //ajout
            }elseif(empty($_GET)){
                $action="ajout";
            }
            ?>
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                    <form action="<?php  if( $action == "modify"){ ?>modif_employes.php?action=modify<?php }elseif($action=="ajout"){?>modif_employes.php?action=ajout<?php } ?>&no_employe=<?php if( $action== "modify"){echo $data['no_employe']; }?>" method="POST">  
                        <!-- no_employes  -->
                        <div class="form-group">
                            <label>numéro d'employé :</label>
                            <input name="no_employe" type="text" value="<?php if( $action == "modify"){echo $data['no_employe'];}?>" class="form-control">
                        </div>
                        <!-- prénom -->
                        <div class="form-group">
                            <label>Prenom :</label>
                            <input name="prenom" type="text" value="<?php if( $action == "modify"){ echo $data['prenom'];}?>" class="form-control">
                        </div>
                        <!-- nom -->
                        <div class="form-group">
                            <label>Nom :</label>
                            <input name="nom" type="text" value="<?php if( $action == "modify") {echo $data['nom'];}?>" class="form-control">
                        </div>
                        <!-- emploi -->    
                        <div class="form-group">
                            <label>emploi :</label>
                            <input name="emploi" type="text" value="<?php if( $action == "modify") {echo $data['emploi'];}?>" class="form-control">
                        </div>
                        <!-- embauche -->
                        <div class="form-group">
                            <label>date d'embauche :</label>
                            <input name="embauche" type="text" value="<?php if( $action == "modify") {echo $data['embauche'];}?>" class="form-control">
                        </div>
                        <!-- salaire -->
                        <div class="form-group">
                            <label>salaire :</label>
                            <input name="salaire" type="text" value="<?php if( $action == "modify") {echo $data['salaire'];}?>" class="form-control">
                        </div>
                        <!-- commission -->
                        <div class="form-group">
                            <label>Commission :</label>
                            <input name="commission" type="text" value="<?php if( $action == "modify") {echo $data['commission'];}?>" class="form-control">
                        </div>
                        <!-- no_serv -->
                        <div class="form-group">
                            <label>Numéro de service :</label>
                            <input name="no_serv" type="text" min="1" max="7" value="<?php if( $action == "modify") {echo $data['no_serv'];}?>" class="form-control">
                        </div>
                        <!-- no_sup -->
                        <div class="form-group">
                            <label>Numéro de supérieur :</label>
                            <input name="no_sup" type="text" value="<?php if( $action == "modify") {echo $data['no_sup'];}?>" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Ajouter"/>
                    </form>
                </div>
</html>