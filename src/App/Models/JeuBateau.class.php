<?php

namespace App\Models;

use DateTime;
use App\Models\Partie;

class JeuBateau extends JeuDeDes
{
	// Attribut 
	private bool $capitain;
	private bool $equipage;
	private bool $bateau;
	private bool $equipageComplet;
	private $partie;

	// Constructor
	public function __construct(
		$capitain,
		$equipage,
		$bateau,
		$equipageComplet

	) {
		$this->capitain = $capitain;
		$this->equipage = $equipage;
		$this->bateau = $bateau;
		$this->equipageComplet = $equipageComplet;
		parent::__construct(5, 3, array());
		$this->partie = new Partie(new DateTime(), 0, false);
	}

	// Accesseur  
	/**
	 * @return bool
	 */
	public function getCapitain(): bool
	{
		return (bool)  $this->capitain;
	}

	/**
	 * @param bool $capitain 
	 * @return self
	 */
	public function setCapitain(bool $capitain): self
	{
		$this->capitain = $capitain;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getEquipage(): bool
	{
		return (bool) $this->equipage;
	}

	/**
	 * @param bool $equipage 
	 * @return self
	 */
	public function setEquipage(bool $equipage): self
	{
		$this->equipage = $equipage;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getBateau(): bool
	{
		return (bool)  $this->bateau;
	}

	/**
	 * @param bool $bateau 
	 * @return self
	 */
	public function setBateau(bool $bateau): self
	{
		$this->bateau = $bateau;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getEquipageComplet(): bool
	{
		return $this->equipageComplet;
	}

	/**
	 * @param bool $equipageComplet 
	 * @return self
	 */
	public function setEquipageComplet(bool $equipageComplet): self
	{
		$this->equipageComplet = $equipageComplet;
		return $this;
	}
	//Methodes
	private function estPresentDansLeTableau($valeur)
	{
		$index = count($this->tableDeLances) - 1;
		if (in_array($valeur, $this->tableDeLances[$index])) {
			echo ("found $valeur in array n°" . ($index + 1));
			return in_array($valeur, $this->tableDeLances[$index]);
		};
	}
	private function retirerValeurMembre($valeur)
{
    $bonArray = &$this->tableDeLances[count($this->tableDeLances) - 1];
    $key = array_search($valeur, $bonArray);
    if($key !== false)
    {
        unset($bonArray[$key]);
    }
}


	private function verifierCapitaine()
	{

		if ($this->capitain == false && $this->estPresentDansLeTableau(6)) {
			$this->retirerValeurMembre(6);
			echo "<br> Got Capitain ";
			$this->capitain = true;
			$this->nbDes--;
		}
	}
	private function verifierBateau()
	{
		if ($this->capitain == true && $this->bateau == false  && $this->estPresentDansLeTableau(5)) {
			$this->retirerValeurMembre(5);
			echo "<br> Got Bateau ";
			$this->bateau = true;
			$this->nbDes--;
		}
	}
	private function verifierEquipage()
	{
		if ($this->bateau == true && $this->equipage == false  && $this->estPresentDansLeTableau(4)) {
			$this->retirerValeurMembre(4);
			echo "<br> Got Equipage ";
			$this->equipage = true;
			$this->nbDes--;
		}
	}

	private function verifierEquipageComplet()
	{
		if ($this->equipageComplet == false && $this->bateau == true && $this->capitain == true && $this->equipage == true) {
			$this->equipageComplet = true;
			echo "<br> Vous avez votre équipage!";
		}
	}
	private function faireMiles()
	{
		$bonArray = $this->tableDeLances[count($this->tableDeLances) - 1];
		$milesTour = array_sum($bonArray);
		$this->partie->setScore(($this->partie->getScore()) + $milesTour);
		echo "<br> the score is " . $this->partie->getScore();
	}
	public function traitementLancer()
	{
		$this->verifierCapitaine();
		$this->verifierBateau();
		$this->verifierEquipage();
		$this->verifierEquipageComplet();
		if ($this->equipageComplet ==true){
			$this->faireMiles();
		}
		;
		if($this->equipageComplet == false && $this->nbLancerDes==1){
			echo "PERDUUUU BOOOOOOOO!!!!";
		}
		
	}
}
