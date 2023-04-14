<?php

namespace App\Entity;

use App\Repository\IdentiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IdentiteRepository::class)
 */
class Identite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomIdentite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $proprietaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $responsable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $concepteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $animateur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hebergeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomIdentite(): ?string
    {
        return $this->nomIdentite;
    }

    public function setNomIdentite(?string $nomIdentite): self
    {
        $this->nomIdentite = $nomIdentite;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?string $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getConcepteur(): ?string
    {
        return $this->concepteur;
    }

    public function setConcepteur(?string $concepteur): self
    {
        $this->concepteur = $concepteur;

        return $this;
    }

    public function getAnimateur(): ?string
    {
        return $this->animateur;
    }

    public function setAnimateur(string $animateur): self
    {
        $this->animateur = $animateur;

        return $this;
    }

    public function getHebergeur(): ?string
    {
        return $this->hebergeur;
    }

    public function setHebergeur(?string $hebergeur): self
    {
        $this->hebergeur = $hebergeur;

        return $this;
    }
}
