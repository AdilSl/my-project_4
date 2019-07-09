<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CouleurRepository")
 */
class Couleur
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
    private $couleur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Chaussure", mappedBy="couleurs")
     */
    private $Chaussure;

    public function __construct()
    {
        $this->Chaussure = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * @return Collection|Chaussure[]
     */
    public function getChaussure(): Collection
    {
        return $this->Chaussure;
    }

    public function addChaussure(Chaussure $chaussure): self
    {
        if (!$this->Chaussure->contains($chaussure)) {
            $this->Chaussure[] = $chaussure;
        }

        return $this;
    }

    public function removeChaussure(Chaussure $chaussure): self
    {
        if ($this->Chaussure->contains($chaussure)) {
            $this->Chaussure->removeElement($chaussure);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getCouleur();
    }
}
