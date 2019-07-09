<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TacheRepository")
 */
class Tache
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\colaborateur", inversedBy="taches", cascade={"persist","remove"})
     */
    private $colaborateurs;

    public function __construct()
    {
        $this->colaborateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return Collection|colaborateur[]
     */
    public function getColaborateurs(): Collection
    {
        return $this->colaborateurs;
    }

    public function addColaborateur(colaborateur $colaborateur): self
    {
        if (!$this->colaborateurs->contains($colaborateur)) {
            $this->colaborateurs[] = $colaborateur;
        }

        return $this;
    }

    public function removeColaborateur(colaborateur $colaborateur): self
    {
        if ($this->colaborateurs->contains($colaborateur)) {
            $this->colaborateurs->removeElement($colaborateur);
        }

        return $this;
    }
}
