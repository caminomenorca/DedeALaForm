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
		return $this->capitain;
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
		return $this->equipage;
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
		return $this->bateau;
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
}
