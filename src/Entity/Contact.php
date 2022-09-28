<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
    private $ctc_nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ctc_prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ctc_email;

    /**
     * @ORM\Column(type="text")
     */
    private $ctc_message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCtcNom(): ?string
    {
        return $this->ctc_nom;
    }

    public function setCtcNom(string $ctc_nom): self
    {
        $this->ctc_nom = $ctc_nom;

        return $this;
    }

    public function getCtcPrenom(): ?string
    {
        return $this->ctc_prenom;
    }

    public function setCtcPrenom(string $ctc_prenom): self
    {
        $this->ctc_prenom = $ctc_prenom;

        return $this;
    }

    public function getCtcEmail(): ?string
    {
        return $this->ctc_email;
    }

    public function setCtcEmail(string $ctc_email): self
    {
        $this->ctc_email = $ctc_email;

        return $this;
    }

    public function getCtcMessage(): ?string
    {
        return $this->ctc_message;
    }

    public function setCtcMessage(string $ctc_message): self
    {
        $this->ctc_message = $ctc_message;

        return $this;
    }
}
