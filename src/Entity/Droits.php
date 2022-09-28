<?php

namespace App\Entity;

use App\Repository\DroitsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DroitsRepository::class)
 */
class Droits
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
    private $drt_libelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDrtLibelle(): ?string
    {
        return $this->drt_libelle;
    }

    public function setDrtLibelle(string $drt_libelle): self
    {
        $this->drt_libelle = $drt_libelle;

        return $this;
    }
}
