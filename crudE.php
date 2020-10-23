<!-- contient la fonction addEmploye -->
<?php
function add ($a, $b, $c, $d, $e, $f, $g, $h, $i, $j){
    
    $bb= $b? "'".$b."'" : 'NULL';
    $cc = $c? "'".$c."'": 'NULL';
    $dd= $d? "'".$d."'" : 'NULL';
    $ee= $e ? "'".$e."'": 'NULL';
    $ff=$f? "'".$f."'": 'NULL';
    $gg=$g? "'".$g."'" : 'NULL';
    $hh= $h? "'".$h."'" : 'NULL';
    $ii=$i? "'".$i."'" : 'NULL';
    $jj=$j? "'".$j."'" : 'NULL';
    $db = mysqli_init();
    mysqli_real_connect($db,'localhost','root','','afpatest');
    
    // on insère les nouvelles données
    $rs =  "insert into employes values ($a, $bb,$cc, $dd, $ee, $ff, $gg, $hh, $ii, $jj)" ;
                    
    $tab =mysqli_query($db, $rs);
    return $tab;
}

function delete($a){
    $aa=$a;
    $db = mysqli_init();
    mysqli_real_connect($db,'localhost','root','','afpatest');
    
    // on supprime les données
    $rs =  "delete from employes where noemp= '$aa'" ;
                        
    $tab =mysqli_query($db, $rs);
    return $tab;
}


function edit($a, $b, $c, $d, $e, $f, $g, $h, $i, $j){

    $bb= $b? "'".$b."'" : 'NULL';
    $cc = $c? "'".$c."'": 'NULL';
    $dd= $d? "'".$d."'" : 'NULL';
    $ee= $e? "'".$e."'": 'NULL';
    $ff=$f? $f: 'NULL';
    $gg=$g? $g : 'NULL';
    $hh= $h? $h : 'NULL';
    $ii=$i? $i : 'NULL';
    $jj=$j? $j : 'NULL';

    $db = mysqli_init();
    mysqli_real_connect($db,'localhost','root','','afpatest');
    
    // MISE A JOUR DES DONNEES
    $rs =  " update employes set nom=$bb, prenom=$cc, emploi=$dd, embauche=$ee ,sal=$ff, comm=$gg, sup=$hh, noserv=$ii, noproj=$jj where noemp=$a";                  

    $tab =mysqli_query($db, $rs);
    return $tab;
}

function research(){
    
    $db = mysqli_init();
    mysqli_real_connect($db,'localhost','root','','afpatest');
    $rs = mysqli_query ($db, 'select * from employes');
    $data = mysqli_fetch_all ($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    mysqli_close($db);

    return $data;

}
    

function researchNE($a){
    $aa=$a;
    $db = mysqli_init();
    mysqli_real_connect($db,'localhost','root','','afpatest');
    $rs = mysqli_query ($db, "select * from employes where noemp='$aa'");
    $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    mysqli_close($db);

    return $data;

}

?>