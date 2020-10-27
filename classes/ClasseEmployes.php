<?php

class classeEmployes {
    private $noemp;
    private $nom;
    private $prenom;
    private $emploi;
    private $embauche;
    private $sal;
    private $comm;
    private $noserv;
    private $sup;
    private $noproj;

    public function presentation() : string {
        return "L'employé n° " . $this->noemp . " est " . $this->nom ." " . $this->prenom . " embauché.e le " . $this->embauche . " en tant que " . $this->emploi . " avec un salaire de " . $this->sal . " et " . $this->comm . " de commission. \n 
        Il fait parti du service n° " . $this->noserv . " sur le projet n° " . $this->noproj . " et a donc comme supérieur le salarié n° " . $this->sup . ".";
    }

    public function getNoemp() : int{
        return $this->noemp;
    }

    public function setNoemp(int $newNoemp) :self{
        $this->noemp = $newNoemp;
        return $this;
    }

    public function getNom() : string{
        return $this->nom;
    }

    public function setNom(string $newNom): self{
        $this->nom = $newNom;
        return $this;
    }

    public function getPrenom() : string{
        return $this->prenom;
    }

    public function setPrenom(string $newPrenom) :self{
        $this->prenom = $newPrenom;
        return $this;
    }

    public function getEmploi() : string{
        return $this->emploi;
    }

    public function setEmploi(string $newEmploi) :self{
        $this->emploi = $newEmploi;
        return $this;
    }

    public function getEmbauche() : string{
        return $this->embauche;
    }

    public function setEmbauche(string $newEmbauche): self{
        $this->embauche = $newEmbauche;
        return $this;
    }

    public function getSal() : float{
        return $this->sal;
    }

    public function setSal(float $newSal) :self{
        $this->sal = $newSal;
        return $this;
    }

    public function getComm() : float{
        return $this->sal;
    }

    public function setComm(float $newComm) :self{
        $this->comm = $newComm;
        return $this;
    }

    public function getSup() : int{
        return $this->sup;
    }

    public function setSup(string $newSup) :self{
        $this->sup = $newSup;
        return $this;
    }

    public function getNoserv() : int{
        return $this->noserv;
    }

    public function setNoserv(int $newNoserv) :self{
        $this->noserv = $newNoserv;
        return $this;
    }

    public function getNoproj() : int{
        return $this->noproj;
    }

    public function setNoproj(string $newNoproj) :self{
        $this->noproj = $newNoproj;
        return $this;
    }

    public function __toString() :string
    {
        return "[N° employé] : " . $this->noemp . "\n[Nom] : " . $this->nom . "\n[Prenom] : " . $this->prenom . "\n[Emploi] : " . $this->emploi . "\n[Embauche] : " . $this->embauche . "\n[Salaire] : " . $this->sal . "\n[Commission] : " . $this->comm . "\n[Supérieur] : " . $this->sup . "\n[N° de service] : " . $this->noserv . "\n[N° de projet] : " . $this->noproj;
    }
}

?>