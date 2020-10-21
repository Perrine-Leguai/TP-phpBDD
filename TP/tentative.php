<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php


                        $db = mysqli_init();
                        mysqli_real_connect($db,'localhost','root','','afpatest');
                        $rs = mysqli_query ($db, 'select * from employes where noemp=1600');
                        $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
                        
                        mysqli_free_result($rs);
                        mysqli_close($db);

                        print_r ($data);
                         echo $data['noemp'];
                        
                            ?>
</body>
</html>