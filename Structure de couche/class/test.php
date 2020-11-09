<?php

include_once('Service.php');
include_once('Employe.php');

$service = new Service();
$service->setNoServ(9)->setVille("Nantes")->setService("dév");

$service1 = new Service();
$service1->setNoServ(10)->setVille("Lens")->setService("dev");


echo $service;


$employe = new Employe();
$employe->setNoEmploye(1000)->setNom("Hanout")->setPrenom("Momo")->setEmploi("dév")->setEmbauche(1995)->setSalaire(1995)->setCommission(1995)->setNoServ($service->getNoServ())->setNoSup(15);

$employe1 = new Employe();
$employe1->setNoEmploye(1200)->setNom("Santana")->setPrenom("Carlos")->setEmploi("dév")->setEmbauche(1995)->setSalaire(1995)->setCommission(1995)->setNoServ($service->getNoServ())->setNoSup(15);

$employe2 = new Employe();
$employe2->setNoEmploye(1300)->setNom("Benhamou")->setPrenom("Nordine")->setEmploi("dév")->setEmbauche(1995)->setSalaire(1995)->setCommission(1995)->setNoServ($service1->getNoServ())->setNoSup(15);

$employe3 = new Employe();
$employe3->setNoEmploye(1400)->setNom("kaiser")->setPrenom("Lucas")->setEmploi("dév")->setEmbauche(1995)->setSalaire(1995)->setCommission(1995)->setNoServ($service1->getNoServ())->setNoSup(15);

echo $employe;