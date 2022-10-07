<?php

namespace App\Entity;
use App\Entity\Utilisateurs;
use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvisRepository::class)
 */
class Avis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $avs_commentaire;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $avs_date;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateurs::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $avs_utl_num;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avs_prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avs_nom;


    public function getID(): ?int
    {
        return $this->id;
    }

    public function getAvsCommentaire(): ?string
    {
        return $this->avs_commentaire;
    }

    public function setAvsCommentaire(string $avs_commentaire): self
    {
        $this->avs_commentaire = $avs_commentaire;

        return $this;
    }

    public function getAvsDate(): ?\DateTimeInterface
    {
        return $this->avs_date;
    }

    public function setAvsDate(\DateTime $avs_date): self
    {
        $this->avs_date = $avs_date;

        return $this;
    }

    public function getAvsUtlNum(): ?utilisateurs
    {
        return $this->avs_utl_num;
    }

    public function setAvsUtlNum(?utilisateurs $avs_utl_num): self
    {
        $this->avs_utl_num = $avs_utl_num;

        return $this;
    }

    public function getAvsPrenom(): ?string
    {
        return $this->avs_prenom;
    }

    public function setAvsPrenom(?string $avs_prenom): self
    {
        $this->avs_prenom = $avs_prenom;

        return $this;
    }

    public function getAvsNom(): ?string
    {
        return $this->avs_nom;
    }

    public function setAvsNom(?string $avs_nom): self
    {
        $this->avs_nom = $avs_nom;

        return $this;
    }


}
