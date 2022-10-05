<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateursRepository::class)
 */
class Utilisateurs implements UserInterface
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
    private $utl_identifiant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $utl_email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $utl_mdp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $utl_drt_id;

    public function getUtlIdentifiant(): ?string
    {
        return $this->utl_identifiant;
    }

    public function setUtlIdentifiant(string $utl_identifiant): self
    {
        $this->utl_identifiant = $utl_identifiant;

        return $this;
    }

    public function getUtlEmail(): ?string
    {
        return $this->utl_email;
    }

    public function setUtlEmail(string $utl_email): self
    {
        $this->utl_email = $utl_email;

        return $this;
    }

    public function getUtlMdp(): ?string
    {
        return $this->utl_mdp;
    }

    public function setUtlMdp(string $utl_mdp): self
    {
        $this->utl_mdp = $utl_mdp;

        return $this;
    }

    public function isDroits(): ?bool
    {
        return $this->Droits;
    }

    public function setDroits(bool $Droits): self
    {
        $this->Droits = $Droits;

        return $this;
    }
    public function eraseCredentials()
    {
    }
    public function getSalt()
    {
    }
    public function getRoles()
    {
    }
    public function getPassword()
    {
    }
    public function getUsername()
    {
    }
}
