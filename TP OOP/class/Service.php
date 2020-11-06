<?php

class Service {

    private $noerv;
    private $serv;
    private $ville;


    public function getNoserv() : int{
        return $this->noserv;
    }

    public function setNoserv(int $newNoserv): self{
        $this->noserv = $newNoserv;
        return $this;
    }
    public function getVille() : string{
        return $this->ville;
    }

    public function setVille(string $newVille): self{
        $this->ville= $newVille;
        return $this;
    }
    public function getServ() : string{
        return $this->serv;
    }

    public function setServ(string $newServ): self{
        $this->serv= $newServ;
        return $this;
    }
    public function __toString() :string
    {
        return " [noserv] :" . $this->noserv . 
        " [serv] :" . $this->serv . " [ville] :" . $this->ville;
    }
}