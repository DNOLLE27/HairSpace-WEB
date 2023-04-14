<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
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
    private $libelleTest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTest(): ?string
    {
        return $this->libelleTest;
    }

    public function setLibelleTest(string $libelleTest): self
    {
        $this->libelleTest = $libelleTest;

        return $this;
    }
}
