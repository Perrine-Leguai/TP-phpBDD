<!-- contient la fonction addEmploye -->
<?php
function add ($a, $b, $c){
    $aa=$a;
    $bb=$b? "'".$b."'" : 'NULL';
    $cc=$c? "'".$c."'": 'NULL';
    $db = mysqli_init();
    mysqli_real_connect($db,'localhost','root','','afpatest');
    
    // on insère les nouvelles données
    $rs =  "insert into services values ($aa, $bb,$cc)" ;
                    
    $tab =mysqli_query($db, $rs);
    return $tab;
}

function delete($a){
    $aa=$a;
    $db = mysqli_init();
    mysqli_real_connect($db,'localhost','root','','afpatest');
    
    // on supprime les données
    $rs =  "delete from services where noserv= '$aa'" ;
                        
    $tab =mysqli_query($db, $rs);
    return $tab;
}


function edit($a, $b, $c){
    $aa=$a;
    $bb=$b ? "'".$b."'" : 'NULL';
    $cc=$c? "'".$c."'": 'NULL';
    $db = mysqli_init();
    mysqli_real_connect($db,'localhost','root','','afpatest');
    
    // MISE A JOUR DES DONNEES
    $rs =  " update services set serv=$bb, ville=$cc where noserv=$aa";                  

    $tab =mysqli_query($db, $rs);
    return $tab;
}

function research(){
    
    $db = mysqli_init();
    mysqli_real_connect($db,'localhost','root','','afpatest');
    $rs = mysqli_query ($db, 'select * from services');
    $data = mysqli_fetch_all ($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    mysqli_close($db);

    return $data;

}
    

function consult($a){
    $aa=$a;
    $db = mysqli_init();
    mysqli_real_connect($db,'localhost','root','','afpatest');
    $rs = mysqli_query ($db, "select * from services where noserv='$aa'");
    $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    mysqli_close($db);

    return $data;
    
}

?>