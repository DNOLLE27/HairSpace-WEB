<?php

namespace App\Entity;

use App\Repository\PresentationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresentationRepository::class)
 */
class Presentation
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
    private $pst_image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pst_adresse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPstImage(): ?string
    {
        return $this->pst_image;
    }

    public function setPstImage(string $pst_image): self
    {
        $this->pst_image = $pst_image;

        return $this;
    }

    public function getPstAdresse(): ?string
    {
        return $this->pst_adresse;
    }

    public function setPstAdresse(string $pst_adresse): self
    {
        $this->pst_adresse = $pst_adresse;

        return $this;
    }
}
