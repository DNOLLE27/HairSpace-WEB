<?php

namespace App\Entity;

use App\Repository\TbUtilisateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TbUtilisateursRepository::class)
 */
class TbUtilisateurs
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
    private $utl_mdp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $utl_email;

    /**
     * @ORM\ManyToOne(targetEntity=Tbdroit::class, inversedBy="drt_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utl_drt_id;

    /**
     * @ORM\OneToMany(targetEntity=tbavis::class, mappedBy="avs_utl_num")
     */
    private $utl_num;

    public function __construct()
    {
        $this->utl_num = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtlIdentifiant(): ?string
    {
        return $this->utl_identifiant;
    }

    public function setUtlIdentifiant(string $utl_identifiant): self
    {
        $this->utl_identifiant = $utl_identifiant;

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

    public function getUtlEmail(): ?string
    {
        return $this->utl_email;
    }

    public function setUtlEmail(string $utl_email): self
    {
        $this->utl_email = $utl_email;

        return $this;
    }

    public function getUtlDrtId(): ?Tbdroit
    {
        return $this->utl_drt_id;
    }

    public function setUtlDrtId(?Tbdroit $utl_drt_id): self
    {
        $this->utl_drt_id = $utl_drt_id;

        return $this;
    }

    /**
     * @return Collection<int, tbavis>
     */
    public function getUtlNum(): Collection
    {
        return $this->utl_num;
    }

    public function addUtlNum(tbavis $utlNum): self
    {
        if (!$this->utl_num->contains($utlNum)) {
            $this->utl_num[] = $utlNum;
            $utlNum->setAvsUtlNum($this);
        }

        return $this;
    }

    public function removeUtlNum(tbavis $utlNum): self
    {
        if ($this->utl_num->removeElement($utlNum)) {
            // set the owning side to null (unless already changed)
            if ($utlNum->getAvsUtlNum() === $this) {
                $utlNum->setAvsUtlNum(null);
            }
        }

        return $this;
    }
}
