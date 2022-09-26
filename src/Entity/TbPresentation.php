<?php

namespace App\Entity;

use App\Repository\TbPresentationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TbPresentationRepository::class)
 */
class TbPresentation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $pst_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pst_adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pst_image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPstId(): ?int
    {
        return $this->pst_id;
    }

    public function setPstId(int $pst_id): self
    {
        $this->pst_id = $pst_id;

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

    public function getPstImage(): ?string
    {
        return $this->pst_image;
    }

    public function setPstImage(string $pst_image): self
    {
        $this->pst_image = $pst_image;

        return $this;
    }
}
