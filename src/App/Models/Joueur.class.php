<?php

namespace App\Models;

use DateTime;

class Joueur extends Utilisateur
{
  // Attribut
  private int $idUser;
  protected string $login;
  private string $mdp;
  private string $droit;
  private array $listePartie;
  public Partie $Partie;

  // Constructor
  public function __construct($idUser, $login, $mdp, $droit, $listePartie = array())
  {
    $this->idUser = $idUser;
    $this->login = $login;
    $this->mdp = $mdp;
    $this->droit = $droit;
    $this->listePartie = $listePartie;
  }
  //Accesseur

  /**
   * @return int
   */
  public function getIdUser(): int
  {
    return $this->idUser;
  }

  /**
   * @param int $idUser 
   * @return self
   */
  public function setIdUser(int $idUser): self
  {
    $this->idUser = $idUser;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getLogin():string
  {
    return $this->login;
  }

  /**
   * @param mixed $login 
   * @return self
   */
  public function setLogin($login): self
  {
    $this->login = $login;
    return $this;
  }

  /**
   * @return string
   */
  public function getMdp(): string
  {
    return $this->mdp;
  }

  /**
   * @param string $mdp 
   * @return self
   */
  public function setMdp(string $mdp): self
  {
    $this->mdp = $mdp;
    return $this;
  }

  /**
   * @return string
   */
  public function getDroit(): string
  {
    return $this->droit;
  }

  /**
   * @param string $droit 
   * @return self
   */
  public function setDroit(string $droit): self
  {
    $this->droit = $droit;
    return $this;
  }

  /**
   * @return array
   */
  public function getListePartie(): array
  {
    return $this->listePartie;
  }

  /**
   * @param array $listePartie 
   * @return self
   */
  public function setListePartie(array $listePartie): self
  {
    $this->listePartie = $listePartie;
    return $this;
  }

  //Methodes
  public function lancerPartie()
  {
    $partie = new Partie(new DateTime(), 0, false);
    echo "<pre> la partie <br> ";
    $this->listePartie[] = $partie;
  }
}
