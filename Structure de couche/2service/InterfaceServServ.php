<?php

interface InterfaceServService {
    public  function addService(int $id, ?string $serv, ?string $ville);
    public  function modifServ(?int $id, ?string $serv, ?string $ville);
}
?>