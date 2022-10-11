<?php

namespace App\Entity;

use App\Repository\PrestationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestationsRepository::class)
 */
class Prestations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prs_image;

    /**
     * @ORM\Column(type="float")
     */
    private $prs_prix;

    /**
     * @ORM\Column(type="time")
     */
    private $prs_duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prs_libelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrsImage(): ?string
    {
        return $this->prs_image;
    }

    public function setPrsImage(string $prs_image): self
    {
        $this->prs_image = $prs_image;

        return $this;
    }

    public function getPrsPrix(): ?float
    {
        return $this->prs_prix;
    }

    public function setPrsPrix(float $prs_prix): self
    {
        $this->prs_prix = $prs_prix;

        return $this;
    }

    public function getPrsDuree(): ?\DateTimeInterface
    {
        return $this->prs_duree;
    }

    public function setPrsDuree(\DateTimeInterface $prs_duree): self
    {
        $this->prs_duree = $prs_duree;

        return $this;
    }

    public function getPrsLibelle(): ?string
    {
        return $this->prs_libelle;
    }

    public function setPrsLibelle(string $prs_libelle): self
    {
        $this->prs_libelle = $prs_libelle;

        return $this;
    }
}
