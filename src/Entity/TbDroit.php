<?php

namespace App\Entity;

use App\Repository\TbDroitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TbDroitRepository::class)
 */
class TbDroit
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

    /**
     * @ORM\OneToMany(targetEntity=TbUtilisateurs::class, mappedBy="utl_drt_id")
     */
    private $drt_id;

    public function __construct()
    {
        $this->drt_id = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, TbUtilisateurs>
     */
    public function getDrtId(): Collection
    {
        return $this->drt_id;
    }

    public function addDrtId(TbUtilisateurs $drtId): self
    {
        if (!$this->drt_id->contains($drtId)) {
            $this->drt_id[] = $drtId;
            $drtId->setUtlDrtId($this);
        }

        return $this;
    }

    public function removeDrtId(TbUtilisateurs $drtId): self
    {
        if ($this->drt_id->removeElement($drtId)) {
            // set the owning side to null (unless already changed)
            if ($drtId->getUtlDrtId() === $this) {
                $drtId->setUtlDrtId(null);
            }
        }

        return $this;
    }
}
