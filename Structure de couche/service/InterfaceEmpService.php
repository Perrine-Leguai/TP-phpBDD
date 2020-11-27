<?php

interface InterfaceEmpService {
    public  function addEmp(int $id, ?string $nom, ?string $prenom, ?string $emploi, ?int $sup, ?string $embauche, ?float $sal, ?float $comm, int $noserv);
    public  function modifEmp(int $id, ?string $nom, ?string $prenom, ?string $emploi, ?int $sup, ?string $embauche, ?float $sal, ?float $comm, int $noserv);
}
?>