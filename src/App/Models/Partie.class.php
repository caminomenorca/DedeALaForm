<?php

namespace App\Models;

use DateTime;

class Partie
{
    // Attribut 
    public DateTime $dateHeure;
    private int $score;
    private bool $gagnant;
    public Joueur $Joueur;
    public JeuBateau $JeuBateau;
    // Constructor 
    public function __construct($dateHeure, $score, $gagnant)
    {
        $this->dateHeure = $dateHeure;
        $this->score     = $score;
        $this->gagnant   = $gagnant;
    }

    // Accesseur
    /**
     * @return DateTime
     */
    public function getDateHeure(): DateTime
    {
        return $this->dateHeure;
    }

    /**
     * @param DateTime $dateHeure 
     * @return self
     */
    public function setDateHeure(DateTime $dateHeure): self
    {
        $this->dateHeure = $dateHeure;
        return $this;
    }

    /**
     * @return bool
     */
    public function getGagnant(): bool
    {
        return $this->gagnant;
    }

    /**
     * @param bool $gagnant 
     * @return self
     */
    public function setGagnant(bool $gagnant): self
    {
        $this->gagnant = $gagnant;
        return $this;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score 
     * @return self
     */
    public function setScore(int $score): self
    {
        $this->score = $score;
        return $this;
    }
}
