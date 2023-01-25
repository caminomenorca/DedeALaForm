<?php

namespace App\Models;

abstract class JeuDeDes extends Jeu
{

    // Attribut 
    protected int $nbDes;

    protected int $nbLancerDes;

    private array $tableDeLances;

    // Constructor
    public function __construct($nbDes, $nbLancerDes, $tableDeLances)
    {
        $this->nbDes = $nbDes;
        $this->nbLancerDes = $nbLancerDes;
        $this->tableDeLances = array();
    }
    // Accesseur      

    public function  getnbDes($nbDes)
    {
        return $this->nbDes;
    }

    public function  getnbLancerDes($nbLancerDes)
    {
        return $this->nbLancerDes;
    }
    public function  gettableDeLances($tableDeLances)
    {
        return $this->tableDeLances;
    }

    public function setnbDes($nbDes): self
    {
        $this->nbDes = $nbDes;
        return $this;
    }

    abstract protected function traitementLancer(); 
    // Methodes
    // on fait un lancé de dés (selon le nombre de dés en jeu)

    public function lancerDes()
    {

        $iteratorDe = 0;
        $arrayLance = array();
        do {
            array_push($arrayLance, rand(1, 6));

            $iteratorDe++;
        } while ($iteratorDe < $this->nbDes);
       
        array_push($this->tableDeLances, $arrayLance);
    }
    //Compteur de lancé de Dés
    public function jouerTour()
    {
        while ($this->nbLancerDes > 0) {
            $this->lancerDes();
            $this->traitementLancer();
            $this->nbLancerDes--;
        }
    }


 
}
