<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VersementRepository")
 */
class Versement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numVersement;

    /**
     * @ORM\Column(type="integer")
     */
    private $numCheque;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_compte;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumVersement(): ?int
    {
        return $this->numVersement;
    }

    public function setNumVersement(int $numVersement): self
    {
        $this->numVersement = $numVersement;

        return $this;
    }

    public function getNumCheque(): ?int
    {
        return $this->numCheque;
    }

    public function setNumCheque(int $numCheque): self
    {
        $this->numCheque = $numCheque;

        return $this;
    }

    public function getNumCompte(): ?int
    {
        return $this->num_compte;
    }

    public function setNumCompte(int $num_compte): self
    {
        $this->num_compte = $num_compte;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }
}
