
<?php 

$db = mysqli_init();
mysqli_real_connect ($db, 'localhost', 'root', '', 'afpatest');

$rs=mysqli_query ($db, 'select * from employes');
$data=mysqli_fetch_row ($rs);



// Ne marche qu'avec fetch_all
// foreach ($data as $key => $value) {
//     foreach ($value as $k => $v) {
//         echo "$k => $v<hr>";
//     }
// }

echo '<pre>';
    print_r($data);
echo '</pre>';

mysqli_free_result($rs);
MYSQLI_close ($db);

?>

<!-- array
retourne 1 ligne de résultats sous forme d'un tableau 
faire des boucles pour avoir tous les résulats
mm chose : fgets($file)
on peut faire avec un feof($file=)-->

<!-- assoc
récupère une ligne de résultats sous forme de tableau associatif
PAS BESOIN DE MYSQLI_ASSOC -->

<!-- field 
info d'un champ pour toute la colonne
pas besoin de MYSQLI_ASSOC -->

<!-- fetch_assoc 
récupère une ligne
pas besoin de mettre MYSQLI_ASSOC -->

<!-- fetch-row
retourne résultat sous forme de tableau indexé 
PAS BESOIN DE MYSQLI_ASSOC -->

<!--  num_fields
retourne le nombre de champs
PAS BESOIN DE MYSQLI_ASSOC -->

<!-- num_rows
retourne le nombre de lignes 
PAS BESOIN DE MYSQLI_ASSOC -->