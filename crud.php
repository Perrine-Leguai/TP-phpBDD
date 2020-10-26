<!-- contient la fonction addEmploye -->
<?php

include 'connexion.php';
function add ($a, $b, $c){
    $aa=$a;
    $bb=$b? "'".$b."'" : 'NULL';
    $cc=$c? "'".$c."'": 'NULL';
    
    $db =connect();
    
    // on insère les nouvelles données
    $rs =  "insert into services values ($aa, $bb,$cc)" ;
                    
    $tab =mysqli_query($db, $rs);
    return $tab;
}

function delete($a){
    $aa=$a;

    $db =connect();
    // on supprime les données
    $rs =  "delete from services where noserv=$aa " ;
                        
    $tab =mysqli_query($db, $rs);
    return $tab;
}


function edit($a, $b, $c){
    $aa=$a;
    $bb=$b ? "'".$b."'" : 'NULL';
    $cc=$c? "'".$c."'": 'NULL';
   
    $db =connect();
    
    // MISE A JOUR DES DONNEES
    $rs =  " update services set serv=$bb, ville=$cc where noserv=$aa";                  

    $tab =mysqli_query($db, $rs);
    return $tab;
}

function research(){
    
    $db =connect();

    $rs = mysqli_query ($db, 'select * from services');
    $data = mysqli_fetch_all ($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    mysqli_close($db);

    return $data;

}
    

function consult($a){
    $aa=$a;
    
    $db =connect();

    $rs = mysqli_query ($db, "select * from services where noserv='$aa'");
    $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    mysqli_close($db);

    return $data;
    
}


function tridelete(){
    
    $db=connect();
    $rs= mysqli_query ($db, "select distinct s.noserv from `services` as s
                                inner join `employes` as e 
                                on e.NoServ= S.NoServ
                                where e.noserv in (select distinct e.noserv from `employes` as e)");
    $donnees=mysqli_fetch_all($rs, MYSQLI_ASSOC);
  
    return $donnees;
    
}
?>