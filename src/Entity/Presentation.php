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
     * @ORM\Column(type="text")
     */
    private $pst_text;

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

    public function getPstText(): ?string
    {
        return $this->pst_text;
    }

    public function setPstText(string $pst_text): self
    {
        $this->pst_text = $pst_text;

        return $this;
    }
}