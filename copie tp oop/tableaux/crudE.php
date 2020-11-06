<!-- contient la fonction addEmploye -->
<?php
include 'connection.php';

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
    
    $db=connect();
    
    // on insère les nouvelles données
    $rs =  "insert into emp values ($a, $bb,$cc, $dd, $ee, $ff, $gg, $hh, $ii, $jj)" ;                
    $tab =mysqli_query($db, $rs);

    return $tab;
}

function delete($a){
    $aa=$a;

    $db=connect();
    
    // on supprime les données
    $rs =  "delete from emp where noemp= '$aa'" ;
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

    $db=connect();
    
    // MISE A JOUR DES DONNEES
    $rs =  " update emp set nom=$bb, prenom=$cc, emploi=$dd, embauche=$ee ,sal=$ff, comm=$gg, sup=$hh, noserv=$ii, noproj=$jj where noemp=$a";                  
    $tab =mysqli_query($db, $rs);
    
    return $tab;
}

function research(){
    
    $db= connect();
    $rs = mysqli_query ($db, 'select * from emp');
    $data = mysqli_fetch_all ($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
   
    return $data;
}
    

function researchNE($a){
    $aa=$a;
    $db= connect();
    $rs = mysqli_query ($db, "select * from emp where noemp='$aa'");
    $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    
    return $data;

}


function tridelete(){
     $db= connect();
     $rs= mysqli_query ($db, "select noemp from emp where noemp in(select distinct sup from emp)");
     $donnees=mysqli_fetch_all($rs, MYSQLI_ASSOC);
     
     return $donnees;
}
?>