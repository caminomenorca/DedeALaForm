<?php

namespace App\Models;

class JeuBateau extends JeuDeDes
{
    // Attribut 
    private bool $capitain;
    private bool $equipage;
    private bool $bateau;
    private bool $equipageComplet;
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
    }

    // Accesseur  
	/**
	 * @return bool
	 */
	public function getCapitain(): bool {
		return (bool)  $this->capitain;
	}

	/**
	 * @param bool $capitain 
	 * @return self
	 */
	public function setCapitain(bool $capitain): self {
		$this->capitain = $capitain;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getEquipage(): bool {
		return (bool) $this->equipage;
	}

	/**
	 * @param bool $equipage 
	 * @return self
	 */
	public function setEquipage(bool $equipage): self {
		$this->equipage = $equipage;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getBateau(): bool {
		return (bool)  $this->bateau;
	}
	
	/**
	 * @param bool $bateau 
	 * @return self
	 */
	public function setBateau(bool $bateau): self {
		$this->bateau = $bateau;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getEquipageComplet(): bool {
		return $this->equipageComplet;
	}
	
	/**
	 * @param bool $equipageComplet 
	 * @return self
	 */
	public function setEquipageComplet(bool $equipageComplet): self {
		$this->equipageComplet = $equipageComplet;
		return $this;
	}

	private function estPresentDansLeTableau($valeur) {
		return array_Search($valeur,$this->tableDeLances[count($this->tableDeLances)-1]);
	}

	//Methodes
	private function VerifierCapitaine(){
		var_dump("je vérifie capitaine", $this->capitain);
		if(!$this->capitain & $this->estPresentDansLeTableau(6)){
			echo "je lai trouvé";
				$this->setCapitain(true);
				$this->nbDes--;
		}
	}
	private function VerifierBateau(){
		if($this->capitain & !$this->bateau  & $this->estPresentDansLeTableau(5)){
				$this->setBateau(true);
				$this->nbDes--;
		}
	}
	private function VerifierEquipage(){
		if($this->bateau & !$this->equipage  & $this->estPresentDansLeTableau(4)){
				$this->setEquipage(true);
				$this->nbDes--;
		}
	}

	private function verifierEquipageComplet(){
		if ($this->bateau& $this->capitain& $this->equipage) {
			$this->setEquipageComplet(true);
			echo "Vous avez votre équipage!";
		}
		
		
	}
	public function traitementLancer(){
		
			$this->VerifierCapitaine();
			$this->VerifierBateau();
			$this->VerifierEquipage();
			$this->verifierEquipageComplet();

	}
}