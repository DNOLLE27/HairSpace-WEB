<?php

namespace App\Entity;

use App\Repository\Test2Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Test2Repository::class)
 */
class Test2
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
    private $libelleTest2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Niveau")
     * @ORM\JoinColumn(name="niveau_id", referencedColumnName="id")
     */
    private $niveau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTest2(): ?string
    {
        return $this->libelleTest2;
    }

    public function setLibelleTest2(string $libelleTest2): self
    {
        $this->libelleTest2 = $libelleTest2;

        return $this;
    }
}
