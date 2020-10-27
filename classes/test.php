<?php
include_once('ClasseEmployes.php');
include_once('ClasseServices.php');


// SERVICE


$service = new ClasseServices();
$service->setNoserv(8)->setServ('Catering')->setVille('Pau');

$service1 = new ClasseServices();
$service1->setNoserv(9)->setServ('Parking')->setVille('Amiens');



echo $service->presentation() . "\n";
echo $service . "\n";
echo $service1;
 


// EMPLOYE


$employe = new ClasseEmployes();
$employe->setNoemp(1850)->setNom('Lemaire')->setPrenom('Nicolas')->setEmploi('boucher')->setEmbauche('2015-07-05')->setSal(54213.12)->setSup(1800)->setNoserv($service->getNoserv());

$employe1 = new ClasseEmployes();
$employe1->setNoemp(1870)->setNom('Quentin')->setPrenom('Cloé')->setEmploi('patissière')->setEmbauche('2015-07-05')->setSal(54213.12)->setSup(1800)->setNoserv($service->getNoserv());

$employe2 = new ClasseEmployes();
$employe2->setNoemp(1900)->setNom('Franc')->setPrenom('Juliette')->setEmploi('responsable')->setEmbauche('2016-07-05')->setSal(54213.12)->setNoserv($service1->getNoserv());

$employe3 = new ClasseEmployes();
$employe3->setNoemp(1910)->setNom('Bonsergent')->setPrenom('Pierre-Olivier')->setEmploi('gardien')->setEmbauche('2015-07-05')->setSal(10234.12)->setSup(1900)->setNoserv($service1->getNoserv());



echo "#1 \n" . $employe . "\n";
echo "\n" . $employe->presentation() . "\n";
echo "\n #2 \n" .$employe1 . "\n";
echo "\n" . $employe1->presentation() . "\n";
echo "\n #3 \n" .$employe2 . "\n";
echo "\n" . $employe2->presentation() . "\n";
echo "\n #4 \n" .$employe3 . "\n";
echo "\n" . $employe3->presentation() . "\n";



?>