<?php

class Employe {

    private $noemp;
    private $nom;
    private $prenom;
    private $emploi;
    private $sup;
    private $embauche;
    private $sal;
    private $comm;
    private $noserv;
    



    public function getNoemp():int{
        return $this ->noemp;
    }

    public function setNoemp(int $newNoemp) :self{
        $this->noemp = $newNoemp;
        return $this;
    }

    public function getNom() : ?string{
        return $this->nom;
    }

    public function setNom(?string $newNom): self{
        $this->nom = $newNom;
        return $this;
    }
    public function getPrenom() : ?string{
        return $this->prenom;
    }

    public function setPrenom(?string $newPrenom): self{
        $this->prenom = $newPrenom;
        return $this;
    }
    public function getEmploi() : ?string{
        return $this->emploi;
    }

    public function setEmploi(?string $newEmploi): self{
        $this->emploi = $newEmploi;
        return $this;
    }
    public function getEmbauche() : ?string{
        return $this->embauche;
    }

    public function setEmbauche(?string $newEmbauche): self{
        $this->embauche = $newEmbauche;
        return $this;
    }
    public function getSal() : ?float {
        return $this->sal;
    }

    public function setSal(?float $newSal): self{
        $this->sal = $newSal;
        return $this;
    }
    public function getComm() : ?float{
        return $this->comm;
    }

    public function setComm(?float $newComm): self{
        $this->comm = $newComm;
        return $this;
    }
    public function getNoserv() : int{
        return $this->noserv;
    }

    public function setNoserv(int $newNoserv): self{
        $this->noserv = $newNoserv;
        return $this;
    }
    public function getSup() : ?int{
        return $this->sup;
    }

    public function setSup(?int $newSup): self{
        $this->sup= $newSup;
        return $this;
    }
    public function __toString() :string
    {
        return " [noemp] :" . $this->noemp . 
        " [nom] :" . $this->nom . " [prenom] :" . $this->prenom . " [emploi] :" . $this->emploi
        . " [embauche] :" . $this->embauche. " [sal] :" . $this->sal. " [comm] :" . $this->comm
        . " [noserv] :" . $this->noserv . " [noSup] :" . $this->noSup;
    }
}