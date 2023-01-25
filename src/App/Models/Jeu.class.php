<?php
namespace App\Models;
abstract class Jeu{
    // Attribut 
    public string $regle;
     // Constructor
    public function __construct($regle    )
    {
        $this->regle = $regle;
    }
     // Methodes
    public function afficherClassement(){}
    public function top3(){}
}
?>